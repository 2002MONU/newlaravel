<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
                'mobile' => 'required|integer|digits:10',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'Invalid',
                    'message' => 'Please check all field',
                    'error' => $validator->errors()->first()
                ]);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,

            ]);

            if ($user) {
                return response()->json([
                    'status' => 'Valid',
                    'message' => 'Form submitted successfully',
                    'token' => $user->createToken("Api Token ")->plainTextToken
                ]);
            }
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $th->getMessage()
            ]);
        }
    }

    // show all records 
    public function showData()
    {
        $user = User::all();
        return response()->json([
            $user
        ]);
    }

    // update data without pass id in url 
    // request id from user table
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id', // check if id exists in the table
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|unique:users,email,' . $request->id, // unique email except for the current user
                'password' => 'nullable|min:6|same:confirm_password', // password is nullable (optional for update)
                'mobile' => 'required|digits:10', // ensure mobile is 10 digits
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'Invalid',
                    'message' => 'Please check all fields',
                    'error' => $validator->errors()->first()
                ]);
            }

            // Find the user by ID
            $user = User::find($request->id);
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;

                // Only update the password if provided
                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password); // hash the password
                }

                $user->mobile = $request->mobile;
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
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'Error',
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'Please check id',
                'error' => $validator->errors()->first()
            ]);
        }

        $user = User::find($request->id);
        if (!$user) {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'User records not found',
            ]);
        }
        $user->delete();
        return response()->json([
            'status' => "Valid",
            'message' => 'User Delete successfully',
        ]);
    }


    public function  show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'Please check id',
                'error' => $validator->errors()->first()
            ]);
        }
        $user = User::find($request->id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User records not found',
            ]);
        }
        return response()->json([
            $user
        ]);
    }


    
}
