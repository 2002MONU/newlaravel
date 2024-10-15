<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use App\Models\ContactEnquiry;
use App\Models\ContactForm;
use App\Models\EnquiryMessage;
use App\Models\SiteSetting;
use App\Models\Package;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    //
    public function contactPage(){
        $contact = ContactDetail::find(1);
        $site_setting = SiteSetting::find(1);
        $packages = Package::where('status',1)->get();
        return view('website.contact',compact('contact','site_setting','packages'));
    }

    // enquiry form 
    public function enquiryForm(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:40',
            'email' => 'required|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
            'subject' => 'required|string|max:60',
            'message' => 'required|string',
        ]);

        $enquiry = new EnquiryMessage();
        $enquiry->full_name = $request->full_name;
        $enquiry->email = $request->email;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;
        $enquiry->save();
        return redirect()->back()->with('success','Enquiry Form Submitted successfully');
    }

    // enquiry form details 
    public function enquiryDetails(){
        $enqueries  = EnquiryMessage::latest()->get();
        return view('admin.enquiry-details',compact('enqueries'));
    }

    public function enquiryDelete($id){
        EnquiryMessage::find($id)->delete();
        return redirect()->back()->with('success','Enquiry message delete successfully');
    }

    // contact page conact 
    public  function contactForm(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:40',
            'email'          =>'required|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
            'package' => 'required',
            'message' => 'required'
        ]);

        $contact = new ContactForm();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->package = $request->package;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success','Contact form submitted successfully');
    }

  // index page contact enquiry 
    public function contactFormEnquiry(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:40',
            'email'          =>'required|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new ContactEnquiry();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success','Contact Enquiry submitted successfully');
    }


    // contact message 
    public function contactDetails(){
        $enqueries = ContactForm::latest()->get();
       return view('admin.contact-message',compact('enqueries'));
    }
  // contact enquiry index page form 
    public function contactEnquiryDetails(){
        $enqueries = ContactEnquiry::latest()->get();
        return view('admin.contact-enquiry',compact('enqueries'));
    }

    // contact formm  
    public function contactDelete($id){
       ContactForm::find($id)->delete();
       return redirect()->back()->with('success','Contact enquiry message delete successfully');
    }

     // contact enquiry form 
    public function contactEnquiryDelete($id){
        ContactEnquiry::find($id)->delete();
        return redirect()->back()->with('success','Contact enquiry message delete successfully');
    }
}
