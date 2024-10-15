<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyForm;
use App\Models\ContactForm;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
            $product = Product::where('status',1)->count('id');
            $service = Service::where('status',1)->count('id');
            $contact = ContactForm::count('id');
            $enquiry = Enquiry::count('id');
            $apply = ApplyForm::count('id');
            return view('admin.dashboard',compact('apply','enquiry','contact','service','product'));
        }else{
            return redirect()->route('admin.login')->with('error','Do login first');
        }
    }
}
