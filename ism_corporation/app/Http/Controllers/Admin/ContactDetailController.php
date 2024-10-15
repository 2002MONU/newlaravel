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
            'address' => 'required|string',
            'mobile_no' => 'required|string',
            'hotline_no' => 'required|string',
            'email' => 'required|string|email',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'google' => 'nullable|url',
            'instagram' => 'nullable|url',
            'behance' => 'nullable|url',
            'map_link' => 'required|url',
        ]);

        $contact = ContactDetail::find($id);
        $contact->address = $request->address;
        $contact->mobile_no = $request->mobile_no;
        $contact->hotline_no = $request->hotline_no;
        $contact->email = $request->email;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->google = $request->google;
        $contact->instagram = $request->instagram;
        $contact->behance = $request->behance;
        $contact->map_link = $request->map_link;
        $contact->save();
        return redirect()->route('contactdetails.index')->with('success','Contact details edit successfully');
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
