<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicePricingResource;
use App\ServicePricing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServicePricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return ServicePricingResource
     */
    public function index()
    {
        return  new ServicePricingResource(ServicePricing::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ServicePricingResource
     */
    public function store(Request $request)
    {
        $servicePricing = new ServicePricing;

        $servicePricing->name = $request->name;
        $servicePricing->category = $request->category;
        $servicePricing->start_price = $request->start_price;
        $servicePricing->sale_price = $request->sale_price;
        $servicePricing->start_sale = $request->start_sale;
        $servicePricing->end_sale = $request->end_sale;

        $servicePricing->save();

        return  new ServicePricingResource($servicePricing);
    }

    /**
     * Display the specified resource.
     *
     * @param ServicePricing $servicePricing
     * @return ServicePricingResource
     */
    public function show(ServicePricing $servicePricing)
    {
        return  new ServicePricingResource($servicePricing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServicePricing $servicePricing
     * @return ServicePricingResource
     */
    public function update(Request $request, ServicePricing $servicePricing)
    {
       $servicePricing->update($request->only([
           'name',
           'category',
           'start_price',
           'sale_price',
           'start_sale',
           'end_sale'
       ]));

       return new ServicePricingResource($servicePricing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServicePricing $servicePricing
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(ServicePricing $servicePricing)
    {
        $servicePricing->delete();

        return response()->json(null, 204);
    }
}
