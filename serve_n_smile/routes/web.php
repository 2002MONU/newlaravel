<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\HomeExtraController;
use App\Http\Controllers\Admin\HowItWorkController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\SEOSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TermConditionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TogetherController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Website\AboutPageController;
use App\Http\Controllers\Website\BlogPageController;
use App\Http\Controllers\Website\ContactPageController;
use App\Http\Controllers\Website\IndexPageController;
use App\Http\Controllers\Website\ServicePageController;
use App\Models\ContactDetail;
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


 // website route start 
 Route::get('/',[IndexPageController::class,'indexpage'])->name('home.index');
 Route::get('/about',[AboutPageController::class,'aboutpage'])->name('home.about');
 Route::get('/services',[ServicePageController::class,'servicespage'])->name('home.services');
 Route::get('/services-details/{slug}',[ServicePageController::class,'servicesDetails'])->name('home.services-details');
 Route::get('/blog',[BlogPageController::class,'blogpage'])->name('home.blog');
 Route::get('/blog-details/{slug}',[BlogPageController::class,'blogpageDetails'])->name('home.blog-details');
 Route::get('/contact',[ContactPageController::class,'conactpage'])->name('home.contact');
 // contact form submit request route
 Route::post('/contact-post',[ContactPageController::class,'conactSubmit'])->name('home.contact-post');
 
 Route::get('term-condition',[TermConditionController::class,'termCondition'])->name('home.term-condition');
 Route::get('privacy-policy',[PrivacyController::class,'privacyPolicy'])->name('home.privacy-policy');
  // enquiry message request route
 Route::post('submit-enquiry',[ContactPageController::class,'enquirySubmit'])->name('home.submit-enquiry');
 // admin route start 
 Route::group(['prefix'=>'admin'],function(){ // prefix means  all route take automatics admin after domain name and before url name 
    Route::get('login',[LoginController::class,'login'])->name('admin.login');
    Route::post('login-post',[LoginController::class,'adminLogin'])->name('admin.login-post');

    // route authenciate without login dosen't open 
    Route::group(['middleware'=>'is_admin'],function(){
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/logout',[LogoutController::class,'logout'])->name('admin.logout');
    Route::get('admin-logs',[LoginController::class,'adminLogs'])->name('admin.admin-logs');
    Route::get('change-password',[ChangePasswordController::class,'changePassword'])->name('admin.change-password');
    Route::post('change-password-post',[ChangePasswordController::class,'changePasswordPost'])->name('change-password-post');
    Route::resource('sliders',SliderController::class);  
    Route::resource('homeabouts',HomeAboutController::class);  
    Route::resource('howitworks',HowItWorkController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('blogs',BlogController::class);
    Route::resource('testimonials',TestimonialController::class);
    Route::resource('achievements',AchievementController::class);
    Route::resource('abouts',AboutController::class);
    Route::resource('togethers',TogetherController::class);
    Route::resource('homeextras',HomeExtraController::class);
    Route::resource('seosettings',SEOSettingController::class);
    Route::resource('sociallinks',SocialLinkController::class);
    Route::resource('contactdetails',ContactDetailController::class);
    Route::resource('sitesettings',SiteSettingController::class);
    Route::resource('faqs',FaqController::class);
    Route::resource('whychooses',WhyChooseController::class);
   Route::resource('metatags', App\Http\Controllers\Admin\MetaTagController::class);
    // term and condition and privacy policy
    Route::get('edit-term-condition/{id}',[TermConditionController::class,'termConditionEdit'])->name('admin.edit-term-condition');
    Route::post('edit-term-condition-post/{id}',[TermConditionController::class,'termConditionEditPost'])->name('admin.edit-term-condition-post');
    Route::get('edit-privacy-policy/{id}',[PrivacyController::class,'termPrivacyPolicyEdit'])->name('admin.edit-privacy-policy');
    Route::post('edit-privacy-policy-post/{id}',[PrivacyController::class,'termPrivacyPolicyEditPost'])->name('admin.edit-privacy-policy-post');
    // contact  form message
    Route::get('enquiry-message',[ContactPageController::class,'enuiryMessage'])->name('admin.enuiry-message');
    Route::get('message-delete/{id}',[ContactPageController::class,'messageDelete'])->name('admin.message-delete');
    // enquiry messase details 
    Route::get('enquiry-details',[ContactPageController::class,'enuiryDetails'])->name('admin.enuiry-details');
    Route::get('enquiry-delete/{id}',[ContactPageController::class,'enuiryDelete'])->name('admin.enquiry-delete');
   });
 });