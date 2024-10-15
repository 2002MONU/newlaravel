<?php

use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

  Route::get('register',[UserRegisterController::class,'userRegister'])->name('register');
  Route::post('user-register',[UserRegisterController::class,'userPostRegister'])->name('user-register');

//   Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[UserRegisterController::class,'userProfile'])->name('user-profile');
//   });

Route::get('user-comment/{id}',[UserRegisterController::class,'userComment'])->name('user-comment');
Route::post('submitFeedback/{id}',[UserRegisterController::class,'submitFeedback'])->name('submitFeedback');