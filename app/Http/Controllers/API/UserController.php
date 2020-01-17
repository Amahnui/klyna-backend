<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return UserCollection
     */
    public function index()
    {
        return  new UserCollection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->referrer_id = $request->referrer_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->avatar = $request->avatar;
        $user->primary_language = $request->primary_language;
        $user->credit_score = $request->credit_score;
        $user->last_login_at = $request->last_login_at;
        $user->last_login_ip = $request->last_login_ip;
        $user->device = $request->device;

        $user->save();

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return  new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return UserResource
     */
    public function update(Request $request, User $user)
    {

        $user->update($request->only([
            'first_name',
            'last_name',
            'phone_number',
            'referrer_id',
            'email',
            'password',
            'role',
            'avatar',
            'primary_language',
            'credit_score',
            'last_login_at',
            'last_login_ip',
            'device'
        ]));

        return  new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, User $user)
    {
        if( $request->user()->role != 'admin'){
            return Response()->json(['You are not allowed to perform this action', 403]);
        }

        $user->delete();

        return response()->json(null, 204);
    }
}
