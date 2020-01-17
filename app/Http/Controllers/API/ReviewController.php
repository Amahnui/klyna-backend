<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Refund\RefundCollection;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return ReviewCollection
     */
    public function index()
    {
        return new ReviewCollection(Review::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ReviewResource
     */
    public function store(Request $request)
    {
        $review = new Review;
        $review->service_id = $request->service_id;
        $review->rating = $request->rating;
        $review->body = $request->body;
        $review->customer_id = $request->user()->id;
        $review->verified = false;

        $review->save();

        return new ReviewResource($review);

    }

    /**
     * Display the specified resource.
     *
     * @param Review $review
     * @return ReviewResource
     */
    public function show(Review $review)
    {
        return  new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Review $review
     * @return ReviewResource
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->only([
            'service',
            'rating',
            'body',
            'body'
        ]));

        return new ReviewResource($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Review $review
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Review $review)
    {

        if($request->user()->role != 'admin' || $request->user()->id != $review->customer_id  ){
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $review->delete();
        return response()->json(null, 204);
    }
}
