<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserRegisterController extends Controller
{
    //
    public function userRegister(){
        return view('account.register');
    }

  public function userPostRegister(Request $request){
       $request->validate([
        'full_name' => 'required|string',
        'email' => 'required|string',
        'mobile' => 'required|string|integer',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password',
       ]);

       $user = new User();
       $user->name = $request->full_name;
       $user->email = $request->email;
       $user->mobile = $request->mobile;
       $user->password = Hash::make($request->password);
       $user->save();
       return redirect()->route('user-profile')->with('success','You are registerd successfully');
  }





  public function userComment($id){
     $user = User::find($id);
     return view('account.feedback',compact('user'));
  }


   public function submitFeedback(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Store the feedback in the database
        Feedback::create([
            'user_id' => $id,            // The user ID the feedback is for
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }


   public function userProfile(){
        $user = User::find(1);
        return view('account.profile',compact('user'));
    }
}
