<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['msg' => 'Contacts shown successfully', 'data' => Contact::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return response()->json(['msg' => 'Contact added successfully', 'data' => $contact]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json(['msg' => 'Contact with id: ' .$id . ' shown successfully', 'data' => Contact::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return JsonResponse
     */
    public function update(Request $request, Contact $contact): JsonResponse
    {
//        $contact = Contact::find($id);
//        $editedContact = $request->all();
//        $contact->update($editedContact);
        $contact->update($request->all());
        return response()->json(['Contact with id: ' .$contact->id . ' updated successfully', 'data' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return JsonResponse
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();
        return response()->json(['Contact with id: ' .$contact->id . ' deleted successfully']);
    }
}
