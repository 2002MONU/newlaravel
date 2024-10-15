<?php

use App\Http\Controllers\Admin\ApplicationAccessController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Frontend\DepartmentFrontendController;
use App\Http\Controllers\Frontend\ExentialFrontendController;
use App\Http\Controllers\Frontend\GalleryFrontendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
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
    Route::resource('application-access', ApplicationAccessController::class);

     // Site settings
     Route::resource('galleries', GalleryController::class);
    //logs
    Route::get('/log', [LoginController::class, 'index'])->name('admin.log.index');
    Route::delete('/log/delete/{id}', [LoginController::class, 'delete'])->name('admin.log.delete');
       
            // Enquiry
    // Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
    // Route::delete('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
 //slider
 Route::resource('sliders', SliderController::class);

    //change password
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');


});


// Admin login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::get('/',[HomeFrontendController::class,'index'])->name('frontend.index');
Route::get('/application-access',[ApplicationController::class,'applicationAccess'])->name('frontend.application-access');
Route::get('/application-access/kaka-login',[ApplicationController::class,'applicationKakaLogin'])->name('frontend.application-kaka-login');
Route::get('/application-access/outlook-webmail',[ApplicationController::class,'applicationWebMail'])->name('frontend.application-outlook-webmail');
Route::get('/application-access/visitor-management',[ApplicationController::class,'applicationVisitorManagement'])->name('frontend.application-visitor-managementl');

 Route::get('essetails',[ExentialFrontendController::class,'essentials'])->name('frontend.essentials');
 Route::get('essetails/department-heads',[ExentialFrontendController::class,'departmentHeads'])->name('frontend.department-heads');
 Route::get('essetails/telephonic-mail',[ExentialFrontendController::class,'telephonicMail'])->name('frontend.telephonic-mail');
 
 Route::get('departmental-information/hr-polices',[DepartmentFrontendController::class,'hrPolices'])->name('frontend.hr-polices');

 Route::get('gallery',[GalleryFrontendController::class,'gallery'])->name('frontend.gallery');
 Route::get('/gallery/{id}/images', [GalleryFrontendController::class, 'getImages']);
