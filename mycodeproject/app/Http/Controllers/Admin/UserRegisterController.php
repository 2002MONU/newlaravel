<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{ 
    // Register form
    public function userRegister(){
        return view('admin.user-register');
    }

    // Register request 
    public function userRegisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'mobile_no' => 'required|string|regex:/^[0-9]{10,15}$/',
            'password' => 'required|string|same:confirm_password|min:6',
            'confirm_password' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save();

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        Otp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => $expiresAt,
        ]);

        // Format the mobile number with the country code
        $mobile_no = $request->mobile_no;
        if (substr($mobile_no, 0, 1) != '+') {
            $mobile_no = '+91' . $mobile_no; // Assuming +91 is the country code for India
        }

        // Pass the formatted number to the sendOtp method
        $this->sendOtp($mobile_no, $otp);

        return redirect()->route('verifyOtp', ['user' => $user->id]);
    }

    private function sendOtp($mobile_no, $otp)
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from = config('services.twilio.from');

        $twilio = new Client($sid, $token);
        $twilio->messages->create($mobile_no, [
            'from' => $from,
            'body' => "Your OTP is $otp",
        ]);
    }
}
