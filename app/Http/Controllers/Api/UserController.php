<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /** * user Registration. */
    public function createUser(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'dob' => 'required|date|before:-18 years',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['status' => 'error', 'error' => $errors]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'language' => $request->language,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'status' => "success",
                'message' => "successfylly saved"
            ]);

            
        }
    }

    /***login  */
    public function loginUser(Request $request)
    { 

        
                // Validate request data
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6',
                ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['status' => 'error', 'error' => $errors]);
        } 
         
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            setcookie('access_token', $token); 
            $user->pw = $token;
            return response()->json([
                'Status' => 'success',
                'url' => 'dashbord',
                'message' => $user,
            ]);
        }

        return response()->json([
            'Status' => 'False',
            'message' => 'You have entered an incorrect username or password.',
        ]);
    } 

    public function signout()
    {
        auth()->user()->tokens()->delete();
        auth()->guard('web')->logout();
        //Session::flush();
        session_unset();
        return Redirect('logoutscreen');
    }

}
