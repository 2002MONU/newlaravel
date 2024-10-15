<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterLocaleAwareServicesPass;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

  Route::post('register',[RegisterController::class,'register']);
  Route::post('user-details',[RegisterController::class,'userDetails']);
  Route::post('single-user-details',[RegisterController::class,'singleUserDetail']);

  Route::post('update-user',[RegisterController::class,'updateUser']);

  Route::post('user-delete',[RegisterController::class,'userDelete']);