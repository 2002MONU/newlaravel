<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Otp;
class UserOtpController extends Controller
{
    public function showVerifyForm(User $user)
    {
        return view('admin.verifyOtp', compact('user'));
    }

    public function verify(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);
    
        $otp = Otp::where('user_id', $user->id)
                    ->where('otp', $request->otp)
                    ->where('expires_at', '>', Carbon::now())
                    ->first();
    
        if ($otp) {
            // OTP is valid, proceed with registration
            $user->update(['is_verified' => true]);
            return redirect()->route('admin.UserDashboard')->with('success', 'Your account has been verified!');
        }
    
        return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
