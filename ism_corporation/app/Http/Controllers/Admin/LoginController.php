<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AdminLoginIp;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //  login page form 
    public function login(){
        $site_setting = SiteSetting::find(1);
        return view('admin.account.login',compact('site_setting'));
    }

    // admin login 
    public function loginPost(Request $request){
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


    // admin logout 
    public function logout(){
        if(auth()->guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('admin.login')->with('success','You are Logout successfully');
    }


    public function adminLogs(){
        $admin_logs = AdminLoginIp::latest()->get();
        return view('admin.logs-details',compact('admin_logs'));
    }
}
