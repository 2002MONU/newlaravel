<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\HowItWorkController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ServicePageController;
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


    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //dashboard
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Site settings
    Route::resource('sitesettings', SiteSettingController::class);
    
    // Services
    Route::resource('services', ServiceController::class);
    // About
    Route::resource('abouts', AboutController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('whychooses',WhyChooseController::class);
    Route::resource('branches',BranchController::class);
    Route::resource('testimonials',TestimonialController::class);
    Route::resource('howitworks',HowItWorkController::class);
    Route::resource('achievements',AchievementController::class);
    //logs
    Route::get('/log', [LoginController::class, 'index'])->name('admin.log.index');
    Route::delete('/log/delete/{id}', [LoginController::class, 'delete'])->name('admin.log.delete');
   // seo
    Route::get('/seo', [SeoController::class, 'index'])->name('admin.seo.index');
    Route::get('/seo/{id}', [SeoController::class, 'edit'])->name('admin.seo.edit');
    Route::post('/seo/{id}', [SeoController::class, 'update'])->name('admin.seo.update');
    //change password
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
    Route::delete('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
});

Route::get('/',[HomePageController::class,'index'])->name('frontend.index');
Route::get('/contact', [ContactPageController::class, 'index'])->name('frontend.contact');
Route::post('/contact/store', [ContactPageController::class, 'store'])->name('contact.store');
// Admin login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::get('/our-services',[ServicePageController::class,'index'])->name('frontend.service');
Route::get('/about-us',[AboutPageController::class,'index'])->name('frontend.about');
