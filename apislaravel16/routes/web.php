<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware('auth')->get('/user', function (Request $request) {
//   return view('account.profile');
  
// });
// Route::get('/',function(){
//     return view('account.register');
// });

// Route::get('/login',function(){
//   return view('account.login');
// });


Route::get('/qrcode', [QrCodeController::class, 'show']);
 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
