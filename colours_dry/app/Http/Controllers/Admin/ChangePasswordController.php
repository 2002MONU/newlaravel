<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|same:confirm_password',
            'confirm_password'=>'required|min:8',
        ]);
  //dd($request->current_password);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //$user = Auth::User();
           $user = User::find(Auth::id());
           if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match']);
            }
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
     User::find(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);
    Session::flush();
    Auth::logout();
    return redirect('admin/login')->with('success','Password changed successfully!');

        
    }
}
