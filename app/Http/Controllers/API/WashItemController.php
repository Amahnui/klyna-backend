<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WashItemCollection;
use App\WashItem;
use Illuminate\Http\Request;

class WashItemController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return WashItemCollection
     */
    public function index()
    {
        return new WashItemCollection(WashItem::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return WashItemCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'point_equivalence' => 'required'
        ]);

        $washItem = new WashItem;

        $washItem->name = $request->name;
        $washItem->image = $request->image;
        $washItem->category = $request->category;
        $washItem->point_equivalence = $request->point_equivalence;
        $washItem->price = $request->price;

        $washItem->save();

        return  new WashItemCollection($washItem);
    }

    /**
     * Display the specified resource.
     *
     * @param WashItem $washItem
     * @return WashItemCollection
     */
    public function show(WashItem $washItem)
    {
        return  new WashItemCollection($washItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param WashItem $washItem
     * @return WashItemCollection
     */
    public function update(Request $request, WashItem $washItem)
    {


        $washItem->update($request->only([
            'name',
            'image',
            'category',
            'point_equivalence',
            'price'
        ]));

        return  new  WashItemCollection($washItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param WashItem $washItem
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy( Request $request, WashItem $washItem)
    {
        if($request->user()->role != 'admin'){
            return  response()->json(['you are not allowed to perform this action'], 403);
        }

        $washItem->delete();

        return  response()->json(null, 204);

    }
}
