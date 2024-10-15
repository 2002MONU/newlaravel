<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\FaqQuestionController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageDetailController;
use App\Http\Controllers\Admin\ProjectDetailController;
use App\Http\Controllers\Admin\SEOSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceDetailController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Website\AboutPageController;
use App\Http\Controllers\Website\ContactPageController;
use App\Http\Controllers\Website\IndexPageController;
use App\Http\Controllers\Website\PackagePageController;
use App\Http\Controllers\Website\ProjectPageController;
use App\Http\Controllers\Website\ServicePageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 // website all route 
  Route::get('/',[IndexPageController::class,'indexPage'])->name('website.index');
  Route::get('about-us',[AboutPageController::class,'aboutPage'])->name('website.about');
  Route::get('packages',[PackagePageController::class,'packages'])->name('website.packages');
  Route::get('services/{slug}',[ServicePageController::class,'servicePage'])->name('website.service');
  Route::get('project-details/{slug}',[ProjectPageController::class,'projectDetails'])->name('website.project-details');
  Route::get('contact',[ContactPageController::class,'contactPage'])->name('website.contact');
  
  // contact form submit 
  Route::post('enquiry-form',[ContactPageController::class,'enquiryForm'])->name('website.enquiry-form');
 Route::post('contact-form',[ContactPageController::class,'contactForm'])->name('contact-form-submit');
 Route::post('contact-enquiry',[ContactPageController::class,'contactFormEnquiry'])->name('contact-form-enquiry');

  // admin panel all route 
Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login-post', [LoginController::class, 'loginPost'])->name('admin.post-login');
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('change-passoword', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');
        Route::post('change-passoword-post', [ChangePasswordController::class, 'changePasswordPost'])->name('admin.change-password-post');
        Route::get('admin-logs', [LoginController::class, 'adminLogs'])->name('admin.logs-details');
        Route::resource('sliders',SliderController::class);
        Route::resource('abouts',AboutController::class);
        Route::resource('achievements',AchievementController::class);
        Route::resource('why-chooses',WhyChooseUsController::class);
        Route::resource('testimonials',TestimonialController::class);
        Route::resource('services',ServiceController::class);
        Route::resource('service-details',ServiceDetailController::class);
        Route::resource('project-details',ProjectDetailController::class);
        Route::resource('contact-details',ContactDetailController::class);
        Route::resource('faq-questions',FaqQuestionController::class);
        Route::resource('site-settings',SiteSettingController::class);
        Route::resource('seosettings',SEOSettingController::class);
        Route::resource('metatags',MetaTagController::class);
        
        // packages 
        Route::resource('packages',PackageController::class);
        Route::resource('package-details',PackageDetailController::class);
        // enquiry form 
        Route::get('enquiry-details',[ContactPageController::class,'enquiryDetails'])->name('admin.enquiry-details');
        Route::get('enquiry-delete/{id}',[ContactPageController::class,'enquiryDelete'])->name('admin.enquiry-delete');
   
       Route::get('contact-detail',[ContactPageController::class,'contactDetails'])->name('admin.contact-details');
       Route::get('contact-delete/{id}',[ContactPageController::class,'contactDelete'])->name('admin.message-delete');
       Route::get('contact-enquiry-detail',[ContactPageController::class,'contactEnquiryDetails'])->name('admin.contact-enquiry-details');
       Route::get('contact-enquiry-delete/{id}',[ContactPageController::class,'contactEnquiryDelete'])->name('admin.contact-enquiry-delete');
    });
});