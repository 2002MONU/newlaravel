<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use App\Models\ContactForm;
use App\Models\Service;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ContactPageController extends Controller
{
    //  contact page view 
    public function conactpage(){
        $contact = ContactDetail::find(1);
        $services = Service::where('status',1)->latest()->get();
        $site_setting = \App\Models\SiteSetting::find(1);
        return view('website.contact',compact('contact','services','site_setting'));
    }

    // contact form submit 
    public function conactSubmit(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:40',
            'email' => 'required|email|max:40',
            'phone_no' => 'required|integer|digits:10',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);
        $contact = new ContactForm();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->service = $request->service;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success','Contact Submitted successfully');
    }

    // contact  message  details in admin panels
    public function enuiryMessage(){
        $enqueries = ContactForm::latest()->get();
        return view('admin.contact-message',compact('enqueries'));
    }
       // contact message delete from admin panel
      public function messageDelete($id){
        $enqueries = \App\Models\ContactForm::find($id)->delete();
         return redirect()->back()->with('success', 'Contact Message Delete Successfully');
    }
    
    // enquiry submit 
    public function enquirySubmit(Request $request ){
       // return $request;
        $request->validate([
            'full_name' => 'required|string|max:40',
            'email' => 'required|email',
            'phone_no' => 'required|integer|digits:10',
            'time' => 'required',
            'date' => 'required',
            'message' => 'required|string',
            'service' => 'required|string',
        ]);
       
            $enquiry = new \App\Models\Enquiry();
             $enquiry->fullname = $request->full_name;
             $enquiry->email = $request->email;
             $enquiry->phone_no = $request->phone_no;

             $time = $request->time; // e.g., '15:30'
             $timeWithAmPm = date("h:i A", strtotime($time)); // Converts to '03:30 PM'
             $enquiry->time = $timeWithAmPm; // Assign the converted time

             $enquiry->date = $request->date;
             $enquiry->message = $request->message;
             $enquiry->service = $request->service;

             $enquiry->save();

             return redirect()->back()->with('success', 'Enquiry Submitted Successfully');

    }
      // enquiry message show in admin panel
     public function enuiryDetails(){
        $enqueries = \App\Models\Enquiry::latest()->get();
        return view('admin.enquiry-details',compact('enqueries'));
    }
    
    public function enuiryDelete($id){
        $enqueries = \App\Models\Enquiry::find($id)->delete();
         return redirect()->back()->with('success', 'Enquiry Message Delete Successfully');
    }
}
