<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\BeautifullCreationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\HomeThreePointController;
use App\Http\Controllers\Admin\HomeWhyChooseController;
use App\Http\Controllers\Admin\HowitWorkController;
use App\Http\Controllers\Admin\JoinWithController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\ProjectDetailController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SliderVideoController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsDetailController;
use App\Http\Controllers\Website\AboutPageContoller;
use App\Http\Controllers\Website\BlogPageContoller;
use App\Http\Controllers\Website\ContactPageContoller;
use App\Http\Controllers\Website\GalleryPageContoller;
use App\Http\Controllers\Website\IndexpageContoller;
use App\Http\Controllers\Website\ProjectPageContoller;

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

Route::get('/',[IndexpageContoller::class,'indexPage'])->name('website.index');
Route::get('about-us',[AboutPageContoller::class,'aboutUs'])->name('website.about');
Route::get('project',[ProjectPageContoller::class,'project'])->name('website.project');
Route::get('project-details/{slug}',[ProjectPageContoller::class,'projectDetails'])->name('website.project-details');
Route::get('upcoming-project',[ProjectPageContoller::class,'Upcomingproject'])->name('website.upcoming-project-details');
Route::get('completed-project',[ProjectPageContoller::class,'completedproject'])->name('website.completed-project-details');
Route::get('gallery',[GalleryPageContoller::class,'gallery'])->name('website.gallery');
Route::get('blog',[BlogPageContoller::class,'blog'])->name('website.blog');
Route::get('blog-details/{slug}',[BlogPageContoller::class,'blogDetails'])->name('website.blog-details');
Route::get('contact',[ContactPageContoller::class,'contact'])->name('website.contact');
Route::get('join-with-us',[ContactPageContoller::class,'joinWithUs'])->name('website.join-with-us');

// contact form submit 
Route::post('contact-form-submit',[ContactPageContoller::class,'contactFormSubmit'])->name('contact-form-submit');
Route::post('apply-form-submit',[ContactPageContoller::class,'applyFormSubmit'])->name('apply-form-submit');

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login-post', [LoginController::class, 'loginPost'])->name('admin.post-login');
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('change-passoword', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');
        Route::post('change-passoword-post', [ChangePasswordController::class, 'changePasswordPost'])->name('admin.change-password-post');
        Route::resource('slider-videos',SliderVideoController::class);
        Route::resource('sliders',SliderController::class);
        Route::resource('home-abouts',HomeAboutController::class);
        Route::resource('testimonials',TestimonialController::class);
        Route::resource('blogs',BlogController::class);
        Route::resource('teams',TeamController::class);
        Route::resource('how-we-works',HowitWorkController::class);
        Route::resource('achievements',AchievementController::class);
        Route::resource('galleries',GalleryController::class);
        Route::resource('contact-details',ContactDetailController::class);
        Route::resource('join-with-us',JoinWithController::class);
        Route::resource('project-details',ProjectDetailController::class);
        Route::resource('why-choose-us',WhyChooseUsDetailController::class);
        Route::resource('abouts',AboutController::class);
        Route::resource('home-three-points',HomeThreePointController::class);
        Route::resource('home-why-chooses',HomeWhyChooseController::class);
        Route::resource('beautiful-creations',BeautifullCreationController::class);
        Route::resource('metatags',MetaTagController::class);
        Route::resource('sitesettings',SiteSettingController::class);
        Route::resource('sociallinks',SocialLinkController::class);
        Route::resource('seosettings',SeoSettingController::class);
        Route::get('admin-logs', [LoginController::class, 'adminLogs'])->name('admin.logs-details');
        
        
        
        Route::get('enquiry-message',[ContactPageContoller::class,'enuiryMessage'])->name('admin.enuiry-message');
        Route::get('message-delete/{id}',[ContactPageContoller::class,'messageDelete'])->name('admin.message-delete');
        Route::get('apply-message',[ContactPageContoller::class,'applyMessage'])->name('admin.apply-message');
        Route::get('apply-delete/{id}',[ContactPageContoller::class,'applyDelete'])->name('admin.apply-delete');
       
       Route::get('side-videos/{id}',[ContactPageContoller::class,'sideVideo'])->name('admin.side-video');
       Route::post('side-videos-post/{id}',[ContactPageContoller::class,'sideVideoPost'])->name('admin.side-video-post');
       
       
       Route::get('edit-disclaimer/{id}',[ContactPageContoller::class,'editDesclaimer'])->name('admin.edit-disclaimer');
       Route::post('edit-disclaimer-post/{id}',[ContactPageContoller::class,'editDesclaimerPost'])->name('admin.edit-disclaimer-post');
    });
});
