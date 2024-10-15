<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ApplyForm;
use App\Models\Career;
use App\Models\ContactForm;
use App\Models\Enquiry;
use App\Models\NewPage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    //  website news page 
    public function newsPage(){
        $news_details = NewPage::where('status',1)->orderBy('priority','asc')->paginate(6);
        $site_setting = SiteSetting::find(1);
        return view('website.news',compact('news_details','site_setting'));
    }

    public function newsPageDetails($slug){
        $news = NewPage::where('slug',$slug)->first();
        $news_details = NewPage::where('status',1)->latest()->get();
        $site_setting = SiteSetting::find(1);
        return view('website.news-details',compact('news','news_details','site_setting'));
    }

    // website careers page 
    public function careers(){
        $careers = Career::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.careers',compact('careers','site_setting'));
    }

    // careersEnquiry
    public function careersEnquiry(Request $request){
       $request->validate([
    'full_name' => 'required|string|max:40|regex:/^[a-zA-Z\s]+$/', // Allows only alphabets and spaces
    'email' => 'required|email|max:50', // Email validation is handled by 'email'
    'mobile_no' => 'required|regex:/^[0-9]{10}$/', // Ensures exactly 10 digits
    'subject' => 'required|string|regex:/^[a-zA-Z\s]+$/', // Allows only alphabets and spaces
    'message' => 'required|string|regex:/^[a-zA-Z0-9\s\.\,\!\?]+$/', // Allows alphanumeric characters, spaces, and punctuation
    'resume' => 'required|file|mimes:pdf,doc,docx', // File types: PDF, DOC, DOCX
]);


          $career = new ApplyForm();
          if($request->hasFile('resume')){
            $filename = $request->file('resume')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('resume')->move(public_path('assets/dynamics/resume'),$name);
            $career->resume = $name;
        }

        $career->full_name = $request->full_name;
        $career->email = $request->email;
        $career->mobile_no = $request->mobile_no;
        $career->subject = $request->subject;
        $career->message = $request->message;
        $career->save();
          return redirect()->back()->with('success','Your Form Applied Successfully');
    }

    public function contactEnquiryDetails(){
        $contact_message = ContactForm::latest()->get();
        return view('admin.enquiry.contact-enquiry',compact('contact_message'));
    }

    public function serviceEnquiryDetails(){
        $service_message = Enquiry::latest()->get();
        return view('admin.enquiry.service-enquiry',compact('service_message'));
    }

    public function applyEnquiryDetails(){
        $apply_message = ApplyForm::latest()->get();
        return view('admin.enquiry.apply-enquiry',compact('apply_message'));
    }



    public function contactEnquiryDelete($id){
        ContactForm::find($id)->delete();
         return redirect()->back()->with('success','Message delete successfully');
    }

    public function serviceEnquiryDelete($id){
        Enquiry::find($id)->delete();
         return redirect()->back()->with('success','Message delete successfully');
    }

    public function applyEnquiryDelete($id){
        $apply = ApplyForm::where('id',$id)->first();
        if($apply){
            $oldImagePath2 = public_path('assets/dynamics/resume/' . $apply->resume);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $apply->delete();
            return redirect()->back()->with('success','Message delete successfully');
        }else{
            return redirect()->back()->with('error',' Image does not found successfully');
        }
                 
    }
}
