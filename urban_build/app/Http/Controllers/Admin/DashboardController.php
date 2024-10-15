<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\ProjectDetail;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
            $slider = Slider::where('status',1)->count('id');
            $ongoing = ProjectDetail::where('status',1)->where('project_id',1)->count('id');
            $completed = ProjectDetail::where('status',1)->where('project_id',2)->count('id');
            $contactMessage = \App\Models\ContactForm::count('id');
            $enquiryMessage = \App\Models\EnquiryMessage::count('id');
            $contactEnquiry = ContactEnquiry::count('id');
             return view('admin.dashboard',compact('slider','ongoing','completed','contactMessage','enquiryMessage','contactEnquiry'));
        }else{
            return redirect()->route('admin.login')->with('error','Do login first');
        }
    }
}
