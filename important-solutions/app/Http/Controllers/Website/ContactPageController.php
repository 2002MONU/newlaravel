<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactEnquiry;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ContactPageController extends Controller
{
    // website contact page 
    public function ContactPage(){
        $contact = Contact::find(1);
        $site_setting = SiteSetting::find(1);
        $services = Service::where('status',1)->latest()->get();
        return view('website.contact',compact('contact','site_setting','services'));
    }
   
    // submit enquiry form 
    public function ContactForm(Request $request)
    {
      // return $request;
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|integer|digits:10',
            'service' => 'required|string|exists:services,service_name',
            'message' => 'required|string|max:1000',
        ]);
    
        $enquiry =new  ContactEnquiry();
        $enquiry->full_name = $request->full_name;
        $enquiry->email = $request->email;
        $enquiry->phone_no = $request->phone_no;
        $enquiry->service = $request->service;
        $enquiry->message = $request->message;
        $enquiry->save();
        return redirect()->back()->with('success','Enquiry submit successfully');
    }
    
  // enquiry form details 
    public function ContactFormenquiry() {
        $enqueries = ContactEnquiry::latest()->get();
        return view('admin.enquiry-details',compact('enqueries'));
    }

    
     // delete enquiry message
     public function  ContactEnquiryDelete($id) {
         ContactEnquiry::find($id)->delete();
         return redirect()->back()->with('success','Enquiry message delete successfully');
     }
}
