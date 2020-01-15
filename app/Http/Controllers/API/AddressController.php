<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth::api');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $user)
    {
        return AddressResource::collection($user->address);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $address = new Address($request-> all());
        $user->address()->save($address);

        return response([
            'data' => new AddressResource($address)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Address $address
     * @return AddressResource
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Address $address
     * @return AddressResource
     */
    public function update(Request $request, Address $address)
    {
        if( $request->user()->id !== $address->user_id){
            return response()->json(['error' => 'You can only edit your own address'], 403);
        }

        $address->update($request->only([
            'region',
            'division',
            'sub_division',
            'city',
            'municipality',
            'quarter',
            'address',
            'backup_telephone_number']));

        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Address $address
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Address $address)
    {
        if($request->user() -> id != $address->user_id){
            return response()->json(['error' => 'You can only delete your own address'], 403);
        }

        $address->delete();
        return  response()->json(null, 204);
    }
}
