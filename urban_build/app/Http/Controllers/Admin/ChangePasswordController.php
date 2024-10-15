<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLoged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
   // admin change password
   public function changePassword(){
    return view('admin.account.change-password');
}

// chnage password request
public function changePasswordPost(Request $request){
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
}
