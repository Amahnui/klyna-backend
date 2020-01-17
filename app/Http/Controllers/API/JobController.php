<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Job\JobCollection;
use App\Http\Resources\JobResource;
use App\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JobCollection
     */
    public function index()
    {
        if(Auth::user()->role != 'admin') {

            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }
        return new JobCollection(Job::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JobResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate( $request, [
           'position' => 'required',
           'department'=> 'required',
           'role_summary' => 'required',
           'responsibilities' => 'required',
            'qualifications' => 'required',
            'is_open' => 'required'

        ]);

        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $Job = new Job;
        $Job->position = $request->postion;
        $Job->department = $request->department;
        $Job->role_summary = $request->role_summary;
        $Job->responsibilities = $request->responsibilites;
        $Job->qualifications = $request->qualifications;
        $Job->is_open = $request->is_open;

        $Job->save();

        return new JobResource($Job);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JobResource
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Job $job
     * @return JobResource
     */
    public function update(Request $request, Job $job)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $job->update($request->only([
            'position',
            'department',
            'role_summary',
            'responsibilities',
            'qualifications',
            'is_open'
        ]));

        return new JobResource($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Job $job
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Job $job)
    {
        if($request->user()->role != 'admin') {
            return response()->json(['error' => 'you are not allowed to perform this operation'], 403);
        }

        $job->delete();
        return response()->json(null, 204);
    }
}
