<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pickup\PickupCollection;
use App\Http\Resources\PickupRequestResource;
use App\PickupRequest;
use Illuminate\Http\Request;

class PickupRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PickupCollection
     */
    public function index()
    {
        return new PickupCollection(PickupRequest::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PickupRequestResource
     */
    public function store(Request $request)
    {
        $pickup = new PickupRequest;

        $pickup->user_id = $request->user()->id;
        $pickup->attended_to = false;

        $pickup->save();

        return new PickupRequestResource($pickup);
    }


    /**
     * Display the specified resource.
     *
     * @param PickupRequest $pickupRequest
     * @return PickupRequestResource
     */
    public function show(PickupRequest $pickupRequest)
    {
        return  new PickupRequestResource($pickupRequest);
    }


    /**
     * Display the specified resource.
     *
     * @param PickupRequest $pickupRequest
     * @return PickupRequestResource
     */
    public function attended(PickupRequest $pickupRequest)
    {
        $pickupRequest->attended_to = true;

        $pickupRequest->save();

        return  new PickupRequestResource($pickupRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PickupRequest $pickupRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(PickupRequest $pickupRequest)
    {
        $pickupRequest->delete();

        return response()->json(null, 204);
    }
}
