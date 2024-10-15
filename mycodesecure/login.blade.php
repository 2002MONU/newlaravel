<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site_setting;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(){
        $site_setting = Site_setting::find(1);
        return view('admin.account.login', compact('site_setting'));
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // request email and password form admin table
        $credentials = $request->only('email', 'password');
        
        if (auth()->guard('admin')->attempt($credentials)) {
            $user = auth()->guard('admin')->user();
            return redirect()->route('admin.dashboard')->with('success', 'You are logged in successfully.');
        } else {
            // Check if the email exists in the database
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
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
          }
          return redirect()->route('admin.login')->with('success','Admin Logout Succcessfully');
    }

    // admin change password
    public function change_Password(){
        if(auth()->guard('admin')){
            return view('admin.account.change-password');
            }
        return redirect()->route('admin.login')->with('error','Please login first');
    }

    public function change_Password_Post(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if(!Hash::check($request->old_password, auth()->guard('admin')->user()->password)){
            return back()->with('error',"Current Password is invalid");
         }

         //return $request;
         if(strcmp($request->get('old_password'), $request->get('new_password')) == 0)
            {
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }
         Admin::find(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('admin.dashboard')->with('success','change password successfully');
    }
}
