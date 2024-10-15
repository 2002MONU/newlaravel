<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('admin.account.login');
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
        $admin_logs = AdminLog::latest()->get();
        return view('admin.logs-details',compact('admin_logs'));
    }
}
