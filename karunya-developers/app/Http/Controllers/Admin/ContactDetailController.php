<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactDetail::find($id);
        return view('admin.contact.edit-contact-details',compact('contact'));
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
        $request->validate([
            'mobile_no' => 'required|integer|digits:10',
            'hour_operation' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
            'map_link' => 'required|url',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
            'linkedin' => 'required|url',
        ]);
        $contact = ContactDetail::find($id);
        $contact->mobile_no = $request->mobile_no;
        $contact->hour_operation = $request->hour_operation;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->map_link = $request->map_link;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->linkedin = $request->linkedin;
        $contact->save();
        return redirect()->back()->with('success','Contact Details edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
