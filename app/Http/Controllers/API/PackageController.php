<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Package\PackageCollection;
use App\Http\Resources\PackageResource;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return PackageCollection
     */
    public function index()
    {
        return new PackageCollection(Package::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PackageResource
     */
    public function store(Request $request)
    {
        $package = new Package;
        $package->type = $request->type;
        $package->description = $request->description;
        $package->cover_photo = $request->cover_photo;
        $package->background_photo = $request->background_photo;
        $package->price = $request->price;

        $package->save();

        return new PackageResource($package);
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return PackageResource
     */
    public function show(Package $package)
    {
        return new PackageResource($package);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PackageResource
     */
    public function update(Request $request, Package $package)
    {
        $package->update($request->only([
            'type',
            'description',
            'cover_photo',
            'background_photo',
            'price',
        ]));

        return  new PackageResource($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return  response()->json(null, 204);
    }
}
