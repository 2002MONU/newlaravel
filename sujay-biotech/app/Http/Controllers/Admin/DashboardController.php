<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Testimonial;
use App\Contact;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
       
          $banner = Banner::count();
        $testimonial = Testimonial::count();
        $product = Product::count();
        $enquiry = Contact::count();
        
        return view('admin.home',compact('banner','testimonial','product','enquiry'));
       
        
    }
    public function logout()
    {    Session::flush();
        Auth::logout();
        return redirect('admin/login')->with('success','Logout Successfully');
    }
}
