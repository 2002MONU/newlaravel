<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutVisionController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Website\DownloadsPageController;
use App\Http\Controllers\Website\IndexPageController;
use App\Http\Controllers\Website\NewsPageController;
use App\Http\Controllers\Website\ProductPageController;
use App\Models\ContactDetails;


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
  Route::get('/',[IndexPageController::class,'indexPage'])->name('home.index');
  Route::get('about-us',[IndexPageController::class,'aboutUs'])->name('home.about');
  Route::get('products',[ProductPageController::class,'product'])->name('home.product');
  Route::get('products/{slug}',[ProductPageController::class,'productDetails'])->name('home.product-details');
  Route::get('services',[ProductPageController::class,'services'])->name('home.services');
  Route::get('services/{slug}',[ProductPageController::class,'servicesDetails'])->name('home.services-details');
  Route::get('news',[NewsPageController::class,'newsPage'])->name('home.news');
  Route::get('news/{slug}',[NewsPageController::class,'newsPageDetails'])->name('home.news-details');
  Route::get('careers',[NewsPageController::class,'careers'])->name('home.careers');
  Route::get('downloads',[DownloadsPageController::class,'downloads'])->name('home.downloads');
  Route::get('contact-us',[DownloadsPageController::class,'contactPage'])->name('home.contact');
 // contact form submit
 Route::post('contact-post',[DownloadsPageController::class,'contactPageForm'])->name('home.contact-submit');
 Route::post('enquiry-Form',[DownloadsPageController::class,'enquiryForm'])->name('home.enquiryForm');
 Route::post('careers-enquiry',[NewsPageController::class,'careersEnquiry'])->name('home.careers-enquiry');


  Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login-post', [LoginController::class, 'loginPost'])->name('admin.post-login');
    Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
      Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
      Route::get('change-passoword', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');
      Route::post('change-passoword-post', [ChangePasswordController::class, 'changePasswordPost'])->name('admin.change-password-post');
       
      Route::resource('sliders',SliderController::class);
      Route::resource('abouts',AboutController::class);
      Route::resource('services',ServiceController::class);
      Route::resource('newpages',NewController::class);
      Route::resource('testimonials',TestimonialController::class);
      Route::resource('products',ProductController::class);
      Route::resource('whychooses',WhyChooseController::class);
      Route::resource('achievements',AchievementController::class);
      Route::resource('aboutvisions',AboutVisionController::class);
      Route::resource('careers',CareerController::class);
      Route::resource('downloads',DownloadController::class);
      Route::resource('contactdetails',ContactController::class);
      Route::resource('sociallinks', SocialLinkController::class);
      Route::resource('sitesettings',SiteSettingController::class);
      Route::resource('metatags',MetaTagController::class);
      Route::resource('certificates',CertificateController::class);
      Route::resource('seosettings',SeoSettingController::class);
      Route::get('contact-enquiry',[NewsPageController::class,'contactEnquiryDetails'])->name('admin.contact-enquiry');
      Route::get('services-enquiry',[NewsPageController::class,'serviceEnquiryDetails'])->name('admin.services-enquiry');
      Route::get('apply-enquiry',[NewsPageController::class,'applyEnquiryDetails'])->name('admin.apply-enquiry');
      Route::get('contact-enquiry-delete/{id}',[NewsPageController::class,'contactEnquiryDelete'])->name('admin.contact-enquiry-delete');
      Route::get('services-enquiry-delete/{id}',[NewsPageController::class,'serviceEnquiryDelete'])->name('admin.services-enquiry-delete');
      Route::get('apply-enquiry-delete/{id}',[NewsPageController::class,'applyEnquiryDelete'])->name('admin.apply-enquiry-delete');
      Route::get('admin-logs', [LoginController::class, 'adminLogs'])->name('admin.logs-details');
    });
});