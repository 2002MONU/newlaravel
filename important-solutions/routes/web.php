<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\BlogDetailsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OurVisionController;
use App\Http\Controllers\Admin\SeosettingController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Website\BlogPageController;
use App\Http\Controllers\Website\ContactPageController;
use App\Http\Controllers\Website\IndexPageController;
use App\Http\Controllers\Website\ServicesPageController;


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

 // website route
 Route::get('/',[IndexPageController::class,'indexPage'])->name('home.index');
 Route::get('/about-us',[IndexPageController::class,'aboutPage'])->name('home.about-us');
 Route::get('services',[ServicesPageController::class,'servicePage'])->name('home.services');
//  Route::get('services-details',[ServicesPageController::class,'servicePageDetails'])->name('home.services-details');
 Route::get('/blog',[BlogPageController::class,'blogPage'])->name('home.blog');
 Route::get('/blog-details/{slug}',[BlogPageController::class,'blogPageDetails'])->name('home.blog-details');
 Route::get('contacts',[ContactPageController::class,'ContactPage'])->name('home.contact');

 Route::post('contact-submit',[ContactPageController::class,'ContactForm'])->name('home.contact-submit');

 // admin route
 Route::group(['prefix'=>'admin'],function(){
   Route::get('login',[LoginController::class,'adminLogin'])->name('admin.login');
   Route::post('post-login',[LoginController::class,'postLogin'])->name('admin.post-login'); 
  
   // admin authenciate
    Route::group(['middleware'=>'is_admin'],function(){
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
        Route::get('logout',[LoginController::class,'adminLogout'])->name('admin.logout'); 
        Route::get('change-password',[LoginController::class,'changePassword'])->name('admin.change-password'); 
        Route::post('change-password',[LoginController::class,'change_Password_Post'])->name('admin.change-password-post'); 
        Route::resource('/homepages',HomePageController::class);
        Route::resource('abouts',AboutAdminController::class);
        Route::resource('services',ServicesController::class);
        Route::resource('blogdetails',BlogDetailsController::class);
        Route::resource('ourvisions',OurVisionController::class);
        Route::resource('contacts',ContactController::class);
        Route::resource('seosettings',SeosettingController::class);
        Route::resource('sociallinks',SocialLinkController::class);
        Route::resource('sitesettings',SiteSettingController::class);
        Route::get('contact-enquiry',[ContactPageController::class,'ContactFormenquiry'])->name('admin.contact-enquiry');
        Route::get('contact-delete/{id}',[ContactPageController::class,'ContactEnquiryDelete'])->name('admin.enquiry-delete');
        Route::get('admin-logs',[LoginController::class,'adminLogs'])->name('admin.logs');
        Route::get('admin-logs-delete/{id}',[LoginController::class,'adminLogsDelete'])->name('admin.logs-delete');
         });
 });