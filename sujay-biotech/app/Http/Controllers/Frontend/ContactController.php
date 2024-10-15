<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Breadcrumb;
use App\SiteSetting;
use App\Seo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(){
  
    $sitesetting = SiteSetting::find(1);
     $seo = Seo::where('page_name','contact')->first();
        $meta_title=$seo->meta_title;
        $meta_keywords=implode(",", json_decode($seo->meta_keywords));
        $meta_description= $seo->meta_description;
        $breadcrumb = Breadcrumb::where('page_name','contact')->first();
        
    return view('frontend.contact',compact('sitesetting','meta_title','meta_keywords','meta_description','breadcrumb'));
  }
  public function store(Request $request) {
    $request->validate([
        'name' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        'email' => ['required', 'email', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        'phone' => ['required', 'numeric', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        'subject' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        'message' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
       
    ]);

    $data = new Contact();
    $data->name = $request->input('name');
    $data->email = $request->input('email');
    $data->phone = $request->input('phone');
    $data->message = $request->input('message');

    
        $data->subject = $request->input('subject');


    


    $data->save();
    return redirect()->back()->with('success', 'Your message has been sent successfully');

  
}

}
