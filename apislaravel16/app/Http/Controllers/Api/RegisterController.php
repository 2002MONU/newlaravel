<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        try {
        $validator = Validator::make($request->all(),[
             'full_name' => 'required|string',    
             'email' => 'required|email|unique:users,email',    
             'password' => 'required|string|same:confirm_password|min:6',  
                 'checkbox' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }
           
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("Api Token ")->plainTextToken
        ]);
    
                } catch (\Throwable $th) {
                    return response()->json([
                        'status' => false,
                        'message' => $th->getMessage()
                    ], 500);
                }
    
}


public function loginUser(Request $request)
{
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
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ]);
        }

        $user = User::where('email', $request->email)->first();
        $redirectUrl =  '/user';
        return response()->json([
            'status' => true,
            'redirect' => $redirectUrl , // Change this to your desired route
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

public function updateUser(Request $request ,$id){
    try {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',    
            'email' => 'required|email|unique:users,email,' . $request->user()->id, // Exclude the current user's email from the unique validation
            'password' => 'required|string|confirmed|min:6',  // Use 'confirmed' instead of 'same'
            // 'checkbox' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 401);
        }
    
        $user = $request->user(); // Get the currently authenticated user
    
        $user->update([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return response()->json([
            'status' => true,
            'message' => 'User updated successfully',
            'token' => $user->createToken("Api Token")->plainTextToken
        ]);
    
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
    
}

}
