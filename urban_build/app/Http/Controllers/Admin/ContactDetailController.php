<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = ContactDetail::find($id);
        return view('admin.contact.edit-contact-details',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'mobile_no' => 'required|integer|digits:10',
            'header_mobile_no' => 'required|integer|digits:10',
            'email' => 'required|email',
            'alter_email' => 'required|email',
            'address' => 'required|string',
            'map_link' => 'required|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);
        $contact = ContactDetail::find($id);
        $contact->mobile_no = $request->mobile_no;
        $contact->header_mobile_no = $request->header_mobile_no;
        $contact->email = $request->email;
        $contact->alter_email = $request->alter_email;
        $contact->address = $request->address;
        $contact->map_link = $request->map_link;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->youtube = $request->youtube;
        $contact->save();
        return redirect()->back()->with('success','Contact Details edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
