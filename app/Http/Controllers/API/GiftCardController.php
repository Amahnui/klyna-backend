<?php

namespace App\Http\Controllers\API;

use App\GiftCard;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Http\Resources\GiftCard\GiftCardCollection;
use App\Http\Resources\GiftCardResource;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return GiftCardCollection
     */
    public function index()
    {
        return  new GiftCardCollection(GiftCard::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CouponResource
     */
    public function store(Request $request)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $giftcard = new GiftCard;
        $giftcard->code = $request->code;
        $giftcard->service = $request->service;
        $giftcard->price = $request->price;
        $giftcard->expiration_date = $request->expiration_date;
        $giftcard->is_used = false;

        $giftcard->save();

        return new CouponResource($giftcard);
    }

    /**
     * Display the specified resource.
     *
     * @param GiftCard $giftCard
     * @return GiftCardResource
     */
    public function show(GiftCard $giftCard)
    {
        return new GiftCardResource($giftCard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return GiftCardResource
     */
    public function update(Request $request, GiftCard $giftCard)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $giftCard->update($request->only([
            'code',
            'service',
            'price',
            'expiration_date',
            'is_used',
        ]));

        return new GiftCardResource($giftCard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param GiftCard $giftCard
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, GiftCard $giftCard)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['error' => 'you are not allowed to perform this operation']);
        }

        $giftCard->delete();
        return response()->json(null, 204);
    }
}
