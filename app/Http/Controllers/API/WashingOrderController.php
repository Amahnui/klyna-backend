<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WashingOrder\WashingOrderCollection;
use App\Http\Resources\WashingOrder\WashingOrderResource;
use App\WashingOrder;
use Illuminate\Http\Request;

class WashingOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return WashingOrderCollection
     */
    public function index()
    {
        return  new WashingOrderCollection(WashingOrder::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return WashingOrderResource
     */
    public function store(Request $request)
    {
        $washingOrder = new WashingOrder;

        $washingOrder->order_number = $request->order_number;
        $washingOrder->customer = $request->customer;
        $washingOrder->coupon = $request->coupon;
        $washingOrder->order_status = 'pickup';
        $washingOrder->payment_status = $request->payment_status;
        $washingOrder->payment_method = $request->payment_method;
        $washingOrder->paid_amount = $request->paid_amount;
        $washingOrder->paid_date = $request->paid_date;
        $washingOrder->date_completed = $request->date_completed;
        $washingOrder->items = $request->items;
        $washingOrder->item_count = $request->item_count;
        $washingOrder->pickup_agent = $request->pickup_agent;
        $washingOrder->store_agent = $request->store_agent;
        $washingOrder->washing_agent = $request->washing_agent;
        $washingOrder->delivery_agent = $request->delivery;
        $washingOrder->delivery_status = $request->delivery_status;
        $washingOrder->delivery_date  = $request->delivery_date;


        $washingOrder->save();

        return  new WashingOrderResource($washingOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param WashingOrder $washingOrder
     * @return WashingOrderResource
     */
    public function show(WashingOrder $washingOrder)
    {
        return new WashingOrderResource($washingOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WashingOrder $washingOrder
     * @return WashingOrderResource
     */
    public function update(Request $request, WashingOrder $washingOrder)
    {
        $washingOrder->update($request->only([
            'order_number',
            'customer',
            'coupon',
            'shipping_address',
            'order_status',
            'payment_status',
            'payment_method',
            'paid_amount',
            'paid_date',
            'date_completed',
            'items',
            'item_count',
            'pickup_agent',
            'store_agent',
            'washing_agent',
            'delivery_agent',
            'delivery_status',
            'delivery_date'
        ]));

        return  new WashingOrderResource($washingOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WashingOrder $washingOrder
     * @return void
     * @throws \Exception
     */
    public function destroy(WashingOrder $washingOrder)
    {
        $washingOrder->delete();
    }
}
