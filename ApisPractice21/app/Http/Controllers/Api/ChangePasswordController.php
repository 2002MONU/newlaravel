<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ChangePasswordController extends Controller
{
     
    public function login(Request $request){
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if($validateUser->fails()){
                return response()->json([
                    'status' => 'invalid',
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()->first()
                ]);
            }
    
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => 'Invalid',
                    'message' => 'Email & Password does not match with our record.',
                ]);
            }
    
            $user = User::where('email', $request->email)->first();
           
            return response()->json([
                'status' => 'Valid',
                // Change this to your desired route
                // Change this to your desired route
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);
           
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    //  user chnage password
    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'old_password' => 'required|min:6', // Use string instead of integer
            'new_password' => 'required|min:6|same:confirm_password',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'Please check all details',
                'error' => $validator->errors()->first()
            ]);
        }
        
        // Find the user by ID from the request
        $user = User::find($request->id); // Directly find the user by ID
        
        if ($user && Hash::check($request->old_password, $user->password)) {
            // Ensure the new password is not the same as the old one
            if ($request->old_password !== $request->new_password) {
                // Update the user's password
                $user->password = Hash::make($request->new_password);
                $user->save();
                $token = $user->createToken('your-app-token')->plainTextToken; // Optional token generation
        
                return response()->json([
                    'status' => 'valid',
                    'message' => 'Password changed successfully',
                    'token' => $token // Optional: return token if needed
                ]);
            } 
        
            return response()->json([
                'status' => 'invalid',
                'message' => 'New password and old password must not be the same'
            ]);
        }
        
        return response()->json([
            'status' => 'invalid',
            'message' => 'Invalid current password or user not found'
        ]);
        
           }

   
}
