<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Page Section
    function RegistrationPage(){
        return view('pages.auth.registration');
    }

    function LoginPage(){
        return view('pages.auth.login');
    }

    function SendOtpPage(){
        return view('pages.auth.send-otp');
    }

    function VerifyOtpPage(){
        return view('pages.auth.verify-otp');
    }

    function ResetPasswordPage(){
        return view('pages.auth.reset-password');
    }

    function DashboardPage(){
        return view('pages.dashboard.index');
    }

    // BackEnd Section
    function UserRegistration(Request $request){
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],201);

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                'message' => 'User Registration Failed',
                // 'message' => $e->getMessage()
            ]);

        }
    }

    function UserLogin(Request $request){
        $count = User::where('email', '=', $request->input('email'))
                ->where('password', '=', $request->input('password'))
                ->count();

        if($count === 1){
            // JWT Token Issue
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successfully'
            ],200)->cookie('token',$token,60,'/');
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Incorrect login credential'
            ]);
        }
    }

    function SendOTPCode(Request $request){
        $email = $request->input('email');
        $otp = rand(100000,999999);
        $count = User::where('email', '=', $request->input('email'))->count();

        if($count === 1){
            // OTP Code Send
            Mail::to($email)->send(new OTPMail($otp));
            // OTP Code Update in database
            User::where('email','=',$email)->update(['otp' => $otp]);

            return response()->json([
                'status' => 'success',
                'message' => '6 digit OTP code has been sent to your email!'
            ],200);

        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized'
            ]);
        }
    }

    function VerifyOTP(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');

        $count = User::where('email', '=', $request->input('email'))
                        ->where('otp','=', $request->input('otp'))
                        ->count();

        if($count === 1){
            // OTP update in database
            User::where('email','=',$email)->update(['otp' => '0']);
            // JWT Token Issue For Reset Password
            $token = JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successfully',
            ],200)->cookie('token',$token,5,'/');
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ]);
        }
    }

    function ResetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password = $request->input('password');

            User::where('email','=', $email)->update(['password' => $password]);

            return response()->json([
                'status' => 'success',
                'message' => 'Password Reset Successfully'
            ],200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something Went Wrong!'
            ]);
        }
    }
}
