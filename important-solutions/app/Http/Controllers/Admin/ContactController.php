<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        $contact = Contact::find(1);
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
        $contact = Contact::find($id);
        return view('admin.contact.edit-contact',compact('contact'));
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
            'phone_no1' => 'required|integer|digits:10',
            'phone_no2' => 'required|integer|digits:10',
             'email' => 'required|email',
             'address' => 'required|string',
             'operation_hour' => 'required|string',
             'map_link' => 'required|url|string',
        ]);
        $contact = Contact::find($id);
        $contact->phone_no1 = $request->phone_no1;
        $contact->phone_no2 = $request->phone_no2;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->operation_hour = $request->operation_hour;
        $contact->map_link = $request->map_link;
        $contact->save();
        return redirect()->route('contacts.index')->with('success','Contact details update successfully');
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
