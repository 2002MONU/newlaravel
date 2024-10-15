<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChangePasswordController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductOfferContoller;
use App\Http\Controllers\Api\ProductWarrantyContoller;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserEmailController;
use App\Models\Product;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[RegisterController::class,'register']);
Route::get('show-data',[RegisterController::class,'showData']);

Route::post('update',[RegisterController::class,'update']);
Route::post('delete',[RegisterController::class,'delete']);

Route::post('show',[RegisterController::class,'show']);
 
Route::post('login',[ChangePasswordController::class,'login'])->name('login');
Route::post('change-password',[ChangePasswordController::class,'changePassword']);

Route::post('category',[CategoryController::class,'category']);
Route::post('product',[ProductController::class,'product']);

Route::post('show-product',[ProductController::class,'productData']);
Route::post('single-product',[ProductController::class,'productSingle']);

Route::post('send-email',[UserEmailController::class,'userEmail']);
Route::post('verifyOtp',[UserEmailController::class,'verifyOtp']);

Route::post('product-specification',[ProductController::class,'productSpecification']);

Route::post('product-details',[ProductController::class,'productDetails']);

Route::post('product-delete',[ProductController::class,'productDelete']);

Route::post('product-offers',[ProductOfferContoller::class,'productOffers']);

Route::post('product-warranty',[ProductWarrantyContoller::class,'productWarranty']);

Route::post('product-all-details',[ProductWarrantyContoller::class,'productAllDetails']);
