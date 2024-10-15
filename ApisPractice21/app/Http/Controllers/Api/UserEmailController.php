<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserEmailSend;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserEmailController extends Controller
{
    // send to mail user
    public function userEmail(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]);
        }

        $otp = rand(100000,999999);

        $user = UserEmail::create([
            'email' => $request->email,
            'otp' => $otp,
           // 'created_at' => now()
        ]);
 


        $details = [
            'otp' => $otp,  // Send the generated OTP
        ];
        
        // Send the OTP via the custom Mailable class
        Mail::to($request->email)->send(new UserEmailSend($details));
        
        // Return success response
        return response()->json([
            'status' => 'Success',
            'message' => 'OTP sent to your email.'
        ]);
        
    } 


    public function verifyOtp(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ]);
    
        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->first(),
            ], 422);
        }
    
        // Retrieve OTP from the database
        $record = DB::table('user_emails')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();
    
        // Check if OTP is valid and not expired
        if (!$record || now()->diffInMinutes($record->created_at) > 15) {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
    
        // Update user's password
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update(['password' => bcrypt($request->password)]);
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }
    
        // Delete the OTP record after successful password reset
        DB::table('user_emails')->where('email', $request->email)->delete();
    
        return response()->json(['message' => 'Password reset successfully.']);
    }
}
