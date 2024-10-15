<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact_form;
use App\Models\ContactDetail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //contactUs
    public function contactUs()
    {
        $contact = ContactDetail::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.contact-us',compact('contact','site_setting'));
    }

    // contact form submit 
    public function contactUsPost(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:20',
            'subject' => 'required|string',
            'mobile_no' => 'required|string|integer|digits:10',
            'email' => 'required|string|email|max:50',
            'message' => 'required|string',
        ]);
  
       $contact = New Contact_form();
       $contact->full_name = $request->full_name; 
       $contact->subject = $request->subject; 
       $contact->mobile_no = $request->mobile_no; 
       $contact->email = $request->email; 
       $contact->message = $request->message; 
       $contact->save();
       return redirect()->back()->with('success','Contact details submitted successfully'); 
    }

    // contact submit details show in admin panel 
    public function contactUsDetails(){
        $contact_form = Contact_form::latest()->get();
        return view('admin.contact-form-details',compact('contact_form'));
    }

    // contact form delete form admin panel 
    public function contactDelete($id){
        Contact_form::find($id)->delete();
        return redirect()->back()->with('success','Contact form details delete successfully');
    }
}
