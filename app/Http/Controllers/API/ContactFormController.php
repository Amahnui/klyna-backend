<?php

namespace App\Http\Controllers\API;

use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactForm\ContactFormCollection;
use App\Http\Resources\ContactFormResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactFormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ContactFormCollection::collection(ContactForm::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ContactFormResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contact =  ContactForm::create($request->all());

        return  new ContactFormResource($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param ContactForm $contactForm
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, ContactForm $contactForm)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['error' => 'You can only delete your own books.'], 403);
        }
        $contactForm ->delete();
        return response()->json(null,204);
    }
}
