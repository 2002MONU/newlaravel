<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
        $service = Service::count();
        $enquiry = Contact::count();
        $slider = Slider::count();
        $testimonial = Testimonial::count();
         return view('admin.home',compact('service','enquiry','slider','testimonial'));
         
     }

    public function logout()
    {    Session::flush();
        Auth::logout();
        return redirect('admin/login')->with('success','Logout Successfully');
    }
}
