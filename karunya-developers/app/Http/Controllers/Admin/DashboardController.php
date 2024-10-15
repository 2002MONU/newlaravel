<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
            $onGoingProject = ProjectDetail::where('status',1)->where('project_id',1)->count('id');
            $upComingProject = ProjectDetail::where('status',1)->where('project_id',2)->count('id');
            $CompletedProject = ProjectDetail::where('status',1)->where('project_id',3)->count('id');
            $contact = \App\Models\ContactForm::count('id');
            return view('admin.dashboard',compact('onGoingProject','upComingProject','CompletedProject','contact'));
        }else{
            return redirect()->route('admin.login')->with('error','Do login first');
        }
    }
}
