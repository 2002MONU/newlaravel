<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\SiteSetting;
use App\Models\Admin_Login_IP;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    // admin login form
    public function adminLogin(){
        $site_setting = SiteSetting::find(1);
        return view('admin.account.login',compact('site_setting'));
    }

    // admin login request
    public function postLogin(Request $request){
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
    public function adminLogout(){
        if(auth()->guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('admin.login')->with('success','You are Logout successfully');
    }

    // admin chnage password form
    public function changePassword(){
        if(auth()->guard('admin')){
            return view('admin.account.change-password');
        }
    }
     // admin chnage password request
    public function change_Password_Post(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return back()->with('error',"Current Password is invalid");
         }
         if(strcmp($request->get('old_password'), $request->get('new_password')) == 0)
         {
             return redirect()->back()->with("error", "New Password cannot be same as your current password.");
         }
      Admin::find(auth()->guard('admin')->user()->id)->update([
         'password' => Hash::make($request->new_password)
     ]);
     return redirect()->route('admin.dashboard')->with('success','change password successfully');
    }
    
    // admin logs 
    public function  adminLogs() {
        $admin_logs = Admin_Login_IP::latest()->get();
        return view('admin.admin-logs',compact('admin_logs'));
    }
    
    public function  adminLogsDelete($id) {
         Admin_Login_IP::find($id)->delete();
         return redirect()->back()->with('success','Admin Logs Delete Successfully');
    }
    
}
