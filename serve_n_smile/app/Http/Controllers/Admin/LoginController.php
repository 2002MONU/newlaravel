<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLog;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // login form view 
    public function login(){
         $site_setting = \App\Models\SiteSetting::find(1);
        return view('admin.account.login', compact('site_setting'));
    }

    // login form requets 
    public function adminLogin(Request $request){
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);
        // admin request eamil and password form admin table
        $credetials = $request->only('email','password');
        if(auth()->guard('admin')->attempt($credetials)){
          $user = auth()->guard('admin')->user();
          return redirect()->route('admin.dashboard')->with('success','You are logged in successfully');
        }else{
            $emailExists = Admin::where('email', $request->input('email'))->exists();
        
            if ($emailExists) {
                // Email is correct, so the password must be wrong
                return back()->withErrors(['password' => 'Invalid password.']);
            } else {
                // Email is wrong
                return back()->withErrors(['email' => 'Invalid email.']);
            }
        }
    }

    // admin logs details 
    public function adminLogs(){
        $admin_logs = AdminLog::latest()->get();
        return view('admin.logs-details',compact('admin_logs'));
    }
}
