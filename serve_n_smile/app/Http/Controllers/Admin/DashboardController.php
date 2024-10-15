<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactForm;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard view function
    public function dashboard(){
        if(auth()->guard('admin')){
            $slider = Slider::where('status',1)->count('id');
            $services = Service::where('status',1)->count('id');
            $blog = Blog::where('status',1)->count('id');
            $contact = ContactForm::count('id');
             return view('admin.dashboard',compact('slider','services','blog','contact'));
        }else{
            return redirect()->route('admin.login')->with('error','Please Login First');
        }
    }
}
