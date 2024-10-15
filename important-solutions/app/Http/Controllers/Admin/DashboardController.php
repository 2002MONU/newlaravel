<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Slider;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
          $slider = Slider::where('status',1)->count('id');
          $service = Service::where('status',1)->count('id');
          $blog = Blog::where('status',1)->count('id');
          $contact = ContactEnquiry::count('id');
            return view('admin.dashboard',compact('slider','service','blog','contact'));
        }else{
            return redirect()->route('admin.login')->with('error','Login First');
        }
    }
}
