<?php

namespace App\Http\Controllers\API;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Resources\Coupon\CouponCollection;
use App\Http\Resources\CouponResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return CouponCollection
     */
    public function index()
    {
        if(Auth::user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }
        return new CouponCollection(Coupon::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CouponCollection
     */
    public function store(Request $request)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->price = $request->price;
        $coupon->type = $request->type;
        $coupon->discount_type = $request->discount_type;
        $coupon->description = $request->description;
        $coupon->expiration_date = $request->expiration_date;
        $coupon->usage_count = $request->usage_count;
        $coupon->exclude_sale_items  = $request->exlude_sale_items;
        $coupon->individual_use = $request->individual_use;
        $coupon->service = $request->service;
        $coupon->usage_limit = $request->usage_limit;
        $coupon->minimum_limit = $request->minimum_limit;
        $coupon->maximum_limit = $request->maximum_limit;
        $coupon->usage_limit_per_user = $request->usage_limit_per_user;

        $coupon->save();

        return new CouponCollection($coupon);

    }

    /**
     * Display the specified resource.
     *
     * @param Coupon $coupon
     * @return CouponResource
     */
    public function show(Coupon $coupon)
    {
        return new CouponResource($coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Coupon $coupon
     * @return CouponResource
     */
    public function update(Request $request, Coupon $coupon)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $coupon->update($request->only([
            'code',
            'price',
            'type',
            'discount_type',
            'description',
            'expiration_date',
            'usage_count',
            'individual_use',
            'service',
            'excluded_services',
            'usage_limit',
            'minimum_limit',
            'maximum_limit',
            'usage_limit_per_user',
        ]));

        return  new CouponResource($coupon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Coupon $coupon
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Coupon $coupon)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $coupon->delete();
        return response()->json(null, 204);

    }
}
