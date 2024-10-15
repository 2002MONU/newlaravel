<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use App\Models\JoinWithUs;
use Illuminate\Http\Request;
use \App\Models\ContactForm;
class ContactPageContoller extends Controller
{
    //
    public function contact(){
        $contact = ContactDetail::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.contact',compact('contact','site_setting','sidevideo'));
    }


    public function joinWithUs(){
        $join_with_us = JoinWithUs::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = \App\Models\SiteSetting::find(1);
        $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.join-with-us',compact('join_with_us','site_setting','sidevideo'));
    }

   // contact form submit
    public function contactFormSubmit(Request $request) {
    $request->validate([
        'full_name' => 'required|string|max:40',
        'email' => 'required|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
        'subject' => 'required|string',
        'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
        'message' => 'required|string|max:300',
    ]);

    $contact = new ContactForm();
    $contact->full_name = $request->full_name;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->phone_no = $request->mobile_no;
    $contact->message = $request->message;
    $contact->save();

    return redirect()->back()->with('success', 'Form Submitted Successfully');
}
  // show contact details in admin panel
   public function  enuiryMessage(){
       $enqueries = ContactForm::latest()->get();
       return view('admin.contact-message',compact('enqueries'));
   }
   // conatct message delete
   public function messageDelete($id){
       ContactForm::find($id)->delete();
       return  redirect()->back()->with('success','Contact message delete successfully');
   }
   
   
   // apply form 
   public function applyFormSubmit(Request $request){
      $request->validate([
        'full_name' => 'required|string|max:40',
        'email' => 'required|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
        'location' => 'required|string',
        'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
        'resume' => 'required|mimes:pdf,doc,docx|file|max:5120',
        'experience' => 'required',
        'qualification' => 'required',
    ]);

    $contact = new \App\Models\ApplyForm();
     if ($request->hasFile('resume')) {
        $filename = $request->file('resume')->getClientOriginalExtension();
        $name = time().'.'.$filename;
        $filepath = $request->file('resume')->move(public_path('assets/dynamics'), $name);
        $contact->resume = $name;
    }
    $contact->full_name = $request->full_name;
    $contact->email = $request->email;
    $contact->mobile = $request->mobile_no;
    $contact->location = $request->location;
    $contact->experience = $request->experience;
    $contact->qualification = $request->qualification;
    $contact->save();

    return redirect()->back()->with('success', 'Form Submitted Successfully');
   }
   
      // join apply message in admin panel
   public  function applyMessage(){
       $applymessage = \App\Models\ApplyForm::latest()->get();
        return view('admin.apply-message',compact('applymessage'));
       
   }
   
            // join apply message delete form admin panel
           public function applyDelete($id){
               \App\Models\ApplyForm::find($id)->delete();
               return  redirect()->back()->with('success','Apply message delete successfully');
           }

            // edit side logo video from admin panel 
           public function  sideVideo($id) {
               $slider = \App\Models\SideVideo::find($id);
               return view('admin.side-video', compact('slider'));
           }
        // edit side logo video from admin panel 
           public function sideVideoPost(Request $request,$id){
                $request->validate([
                    'side_video' => 'required|mimes:mp4,mov,ogg,qt|max:25000', // max: 25 MB

                ]);

                $slider = \App\Models\SideVideo::find($id); 
                if($request->hasFile('side_video')){
                    $filename = $request->file('side_video')->getClientOriginalExtension();
                    $name = time().'.'.$filename;
                    $filepath = $request->file('side_video')->move(public_path('assets/dynamics'),$name);
                    $oldImagePath = public_path('assets/dynamics/' . $slider->video);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $slider->video = $name;
                }
                $slider->save();
                return redirect()->back()->with('success','Side video update successfully');
           }

       // home page desclaimer edit form admin panel 
        public  function editDesclaimer($id){
            $slider = \App\Models\Disclaimer::find($id);
            return view('admin.disclaimer.edit-disclaimer',compact('slider'));
        }
   
          
            // // home page desclaimer edit form admin panel 
            public function editDesclaimerPost(Request $request, $id){
                $request->validate([
                    'description'=> 'required|string',
                ]);

                $desc = \App\Models\Disclaimer::find($id);
                $desc->description = $request->description;
                $desc->save();
                return redirect()->back()->with('success','Desclainer edit successfully');
            }

}
