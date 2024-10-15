<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UserLoginController;
use App\Http\Controllers\Admin\UserOtpController;
use App\Http\Controllers\Admin\UserRegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix'=> 'user'],function(){
    Route::get('user-login',[UserLoginController::class,'userLogin'])->name('user.login');// user login
    Route::post('user-login-post',[UserLoginController::class,'userLoginPost'])->name('user-login-post');
    Route::post('login/request-otp', [UserLoginController::class, 'requestOtp'])->name('login.requestOtp');
    Route::post('login/verify-otp', [UserLoginController::class, 'verifyOtp'])->name('login.verifyOtp');
    Route::get('login/verify-otp', [UserLoginController::class, 'showOtpForm'])->name('login.showOtpForm');
    Route::get('user-register',[UserRegisterController::class,'userRegister']); //  user regsiter
    Route::post('user-register-post',[UserRegisterController::class,'userRegisterPost'])->name('user-register-post');
    Route::get('/verify-otp/{user}', [UserOtpController::class, 'showVerifyForm'])->name('verifyOtp');
    Route::post('/verify-otp/{user}', [UserOtpController::class, 'verify'])->name('verifyOtp.post');


    
Route::group(['middleware'=>'auth'],function(){
        Route::get('/user-dashboard',[DashboardController::class,'UserDashboard'])->name('admin.UserDashboard');
    
    });
});


