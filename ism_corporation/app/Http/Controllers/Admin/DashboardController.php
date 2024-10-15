<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_form;
use App\Models\Management;
use App\Models\ReachOutForm;
use App\Models\Slider;
use Illuminate\Http\Request;
use ReflectionFunctionAbstract;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
            $slider = Slider::where('status',1)->count('id');
            $team = Management::where('status',1)->count('id');
            $carrer = ReachOutForm::count('id');
            $enquiry = Contact_form::count('id');
            return view('admin.dashboard',compact('slider','team','carrer','enquiry'));
        }else{
            return redirect()->route('admin.login')->with('error','Do login first');
        }
    }
}
