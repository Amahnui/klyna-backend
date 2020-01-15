<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\ContactResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return ContactCollection
     */
    public function index()
    {
        return new  ContactCollection(Contact::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ContactResource
     */
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->user_id = $request->user()->id;
        $contact->message = $request->message;

        $contact->save();

        return  new ContactResource($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return ContactResource
     */
    public function show(Contact $contact)
    {
        return  new ContactResource($contact);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request, Contact $contact)
    {
        if($request->user()->role == 'admin' || $request->user()->id == $contact->user_id ){
            $contact->delete();
            return response()->json(null, 204);
        }
        else{
            return response()->json(['error' => 'You can only delete messages you created.'], 403);
        }
    }
}
