<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Http\Resources\Partnership\PartnershipCollection;
use App\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PartnershipCollection
     */
    public function index()
    {
        return new PartnershipCollection(Partnership::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return PartnershipCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'city' => 'required',
            'region' => 'required',
            'partnership_idea' => 'required'
        ]);

        $partnership = new Partnership;

        $partnership->first_name = $request->first_name;
        $partnership->last_name = $request->last_name;
        $partnership->phone_number = $request->last_name;
        $partnership->email = $request->email;
        $partnership->city = $request->city;
        $partnership->region = $request->region;
        $partnership->partnership_idea = $request->partnership_idea;


        $partnership->save();

        return new PartnershipCollection($partnership);
    }

    /**
     * Display the specified resource.
     *
     * @param Partnership $partnership
     * @return PartnershipCollection
     */
    public function show(Partnership $partnership)
    {
        return  new PartnershipCollection($partnership);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Partnership $partnership
     * @return PartnershipCollection
     */
    public function update(Request $request, Partnership $partnership)
    {
        $partnership->update($request->only([
            'first_name',
            'last_name',
            'phone_number',
            'email',
            'city',
            'region',
            'partnership_idea'
        ]));

        return new PartnershipCollection($partnership);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partnership $partnership
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Partnership $partnership)
    {
        $partnership->delete();

        return  response()->json(null, 403);
    }
}
