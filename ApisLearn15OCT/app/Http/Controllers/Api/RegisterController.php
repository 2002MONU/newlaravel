<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'mobile_no' => 'required|integer|digits:10',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'Invalid Details',
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_no' => $request->mobile_no,
            
        ]);
        if($user){
            return response()->json([
                'status' => true,
                'message' => 'User Register Successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Please check all details'
            ]);
        }
    }
 // all user details 
    public function userDetails(){
        $user = User::all();

        return response()->json([
            'status' => true,
             'message' => $user
        ]);
    }

    // single user details 

    public function singleUserDetail(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:users,id'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'Invalid detail',
                'message' => $validator->errors()->first()
            ]);
        }

       $user = User::find($request->id);
       if($user){
        return response()->json([
            'status' => true,
            'message' => $user
        ]);
       }else{
        return response()->json([
            'status' => false,
            'message' => 'Id does not exit'
        ]);
       }
    }

    // update user 
    public function updateUser(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password',
            'mobile_no' => 'required|integer|digits:10',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'Invalid Details',
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::find($request->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password); // hash the password
            }
            $user->mobile_no = $request->mobile_no;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Updated Successfully',
            ]);
        }
        return response()->json([
            'status' => 'Invalid',
            'message' => 'User not found',
        ]);
    }
}
