<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetails;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactDetails::find(1);
        return view('admin.contact.contact-details',compact('contact'));
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
        $contact = ContactDetails::find($id);
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
            'whattsapp' => 'required|integer|digits:10',
            'call_no' => 'required|integer|digits:10',
            'email' => 'required|email',
            'address' => 'required|string',
            'map_link' => 'required|url',
        ]);
        $contact = ContactDetails::find($id);
        $contact->mobile_no = $request->mobile_no;
        $contact->whattsapp = $request->whattsapp;
        $contact->call_no = $request->call_no;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->map_link = $request->map_link;
        $contact->save();
        return redirect()->route('contactdetails.index')->with('success','Contact Details edit successfully');
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
