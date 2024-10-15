<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactDetails;
use App\Models\ContactForm;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class DownloadsPageController extends Controller
{
    //  website downloads page 
    public function downloads(){
        $downloads = Download::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.downloads',compact('downloads','site_setting'));
    }

    // website contact page 
    public function contactPage(){
        $contact = ContactDetails::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.contact-us',compact('contact','site_setting'));
    }

    public function contactPageForm(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'mobile_no' => 'required|integer|digits:10',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = new ContactForm();
        $contact->full_name = $request->full_name;
        $contact->mobile_no = $request->mobile_no;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success','Contact Submitted Successfully');
    }


    public function enquiryForm(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'mobile_no' => 'required|integer|digits:10',
            'email' => 'required|email',
            'subject' => 'required|string',
        ]);

        $contact = new Enquiry();
        $contact->full_name = $request->full_name;
        $contact->mobile_no = $request->mobile_no;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->save();
        return redirect()->back()->with('success','Contact Submitted Successfully');
    }
}
