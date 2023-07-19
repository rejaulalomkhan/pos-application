<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Web API Route
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])
        ->middleware([TokenVerificationMiddleware::class]);

// Page Route
Route::get('/registration',[UserController::class, 'RegistrationPage']);
Route::get('/login',[UserController::class, 'LoginPage']);
Route::get('/sendOTP',[UserController::class, 'SendOtpPage']);
Route::get('/verifyOTP',[UserController::class, 'VerifyOtpPage']);
Route::get('/resetPassword',[UserController::class, 'ResetPasswordPage']);

Route::get('/dashboard',[UserController::class, 'DashboardPage']);
