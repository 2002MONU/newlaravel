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
        $contact = ContactDetail::find(1);
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
            'phone_no' => 'required|integer|digits:10',
            'whatapps' => 'required|integer|digits:10',
            'alter_phone_no' => 'required|integer|digits:10',
            'email' => 'required|email',
            'alter_email' => 'required|email',
            'location' => 'required|string',
            'map_link' => 'required|url',
        ]);
        $contact = ContactDetail::find($id);
        $contact->phone_no = $request->phone_no;
        $contact->whatapps = $request->whatapps;
        $contact->alter_phone_no = $request->alter_phone_no;
        $contact->email = $request->email;
        $contact->alter_email = $request->alter_email;
        $contact->location = $request->location;
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
