<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WeatherController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/weather', function () {
    return view('weather.form');
})->name('weather.form');

Route::get('/weather/show', [WeatherController::class, 'show'])->name('weather.show');

Route::get('/currency-converter', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/currency-convert', [CurrencyController::class, 'convert'])->name('currency.convert');
