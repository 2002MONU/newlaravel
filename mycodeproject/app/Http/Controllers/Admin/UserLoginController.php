<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Otp;
use Twilio\Rest\Client;

class UserLoginController extends Controller
{
    public function userLogin()
    {
        return view('admin.user-login');
    }

    public function userLoginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'You are logged in!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|string|regex:/^[0-9]{10,15}$/',
        ]);

        $mobile_no = $request->mobile_no;
        $user = User::where('mobile_no', $mobile_no)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['mobile_no' => 'Mobile number not found.']);
        }

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        // Save or update OTP
        Otp::updateOrCreate(
            ['user_id' => $user->id],
            ['otp' => $otp, 'expires_at' => $expiresAt]
        );

        // Send OTP
        $this->sendOtpToPhone($mobile_no, $otp);

        // Redirect to OTP verification form
        return redirect()->route('login.showOtpForm', ['mobile_no' => $mobile_no]);
    }

    private function sendOtpToPhone($mobile_no, $otp)
    {
        // Format phone number with country code
        if (substr($mobile_no, 0, 1) != '+') {
            $mobile_no = '+91' . $mobile_no; // Adjust country code as needed
        }

        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from = config('services.twilio.from');

        $twilio = new Client($sid, $token);
        $twilio->messages->create($mobile_no, [
            'from' => $from,
            'body' => "Your OTP is $otp",
        ]);
    }

    public function showOtpForm(Request $request)
    {
        $mobile_no = $request->query('mobile_no');
        return view('admin.verify-otp', ['mobile_no' => $mobile_no]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|string|regex:/^[0-9]{10,15}$/',
            'otp' => 'required|digits:6',
        ]);

        $mobile_no = $request->mobile_no;
        $user = User::where('mobile_no', $mobile_no)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['mobile_no' => 'Mobile number not found.']);
        }

        // Retrieve OTP record
        $otpRecord = Otp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ($otpRecord) {
            auth()->login($user);
            return redirect()->route('admin.UserDashboard')->with('success', 'You are logged in!');
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
