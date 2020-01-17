<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Service\ServiceCollection;
use App\Http\Resources\Service\ServiceResource;
use App\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Collection;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return serviceCollection
     */
    public function index()
    {
        return  new ServiceCollection(ServiceController::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return serviceCollection
     */
    public function store(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;
        $service->description = $request->description;

        $service->save();

        return new ServiceCollection($service);

    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return serviceResource
     */
    public function show(Service $service)
    {
        return  new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return ServiceResource
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->only([
            'name',
            'description'
        ]));

        return new  ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Service $service
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Service $service)
    {
        if( $request->user()->role != 'admin'){
            return  response()->json(['error' , 'you are not allowed to perform this action'], 403);
        }

        $service->delete();
        return response()->json(null, 204);
    }
}
