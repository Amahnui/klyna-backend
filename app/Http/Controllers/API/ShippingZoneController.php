<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingZoneResource;
use App\Http\Resources\ShippingZones\ShippingZoneCollection;
use App\ShippingZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShippingZoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return ShippingZoneCollection
     */
    public function index()
    {
        return new ShippingZoneCollection(ShippingZone::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ShippingZoneResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'zone_name',
            'cost'
        ]);

        $shippingZone = new  ShippingZone;

        $shippingZone->zone_name = $request->zone_name;
        $shippingZone->cost = $request->cost;

        $shippingZone->save();

        return new ShippingZoneResource($shippingZone);
    }

    /**
     * Display the specified resource.
     *
     * @param ShippingZone $shippingZone
     * @return ShippingZoneResource
     */
    public function show(ShippingZone $shippingZone)
    {
        return new ShippingZoneResource($shippingZone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ShippingZone $shippingZone
     * @return void
     */
    public function update(Request $request, ShippingZone $shippingZone)
    {
        $shippingZone->update($request->only([
            'zone_name',
            'cost'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ShippingZone $shippingZone
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(ShippingZone $shippingZone)
    {
        $shippingZone->delete();

        return response()->json(null, 204);
    }
}
