<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CurrentJob;
use App\Models\ReachOutForm;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    //currentJob

    public function currentJob(){
        $currentjobs = CurrentJob::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.current-job',compact('currentjobs','site_setting'));

    }
   // reach out 
    public function reachOut(){
        $site_setting = SiteSetting::find(1);
        $current_jobs = CurrentJob::where('status',1)->get();
        return view('website.reach-out',compact('site_setting','current_jobs'));
    }

    public function reachOutPost(Request $request){
          $request->validate([
              'first_name' => 'required|string',
              'last_name' => 'required|string',
              'mobile_no' => 'required|string|integer|digits:10',
              'email' => 'required|string|email',
             'resume' => 'required|mimes:pdf,jpeg,jpg,png,docx|max:5120',
              'role' => 'required|string',
              'message' => 'required|string',
          ]);
    
       $reach = New ReachOutForm();
       if ($request->hasFile('resume')) {
        $filename = $request->file('resume')->getClientOriginalExtension();
        $name = time().'.'.$filename;
        $filepath = $request->file('resume')->move(public_path('assets/dynamics/resume'), $name);
        $reach->resume = $name;
    }

         $reach->first_name = $request->first_name; 
         $reach->last_name = $request->last_name; 
         $reach->mobile_no = $request->mobile_no; 
         $reach->email = $request->email; 
         $reach->role = $request->role; 
         $reach->message = $request->message; 
         $reach->save();
         return redirect()->back()->with('success','Contact details submitted successfully'); 

    }
  

    // reach out form details show in admin panel 

    public function reachOutPostDetails(){
       $reach_message = ReachOutForm::orderBy('created_at', 'desc')->get();
      // dd($reach_message);
        return view('admin.reach-out-details',compact('reach_message'));
    }

    // reach out form details delete from  admin panel 
    public function reachOutDelete($id){
        $reach = ReachOutForm::where('id', $id)->first();
        if ($reach) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/resume/' . $reach->resume);
            
         // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the  image
                unlink($imagePath1);
            }
          $reach->delete();
           return redirect()->back()->with('success', 'Resume and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
