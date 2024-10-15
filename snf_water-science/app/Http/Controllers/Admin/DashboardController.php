<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
      
      
        return view('admin.home');
    
       
        
    }
    public function logout()
    {    Session::flush();
        Auth::logout();
        return redirect('admin/login')->with('success','Logout Successfully');
    }
}
