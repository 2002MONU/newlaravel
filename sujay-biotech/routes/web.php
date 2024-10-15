<?php

use App\Http\Controllers\Frontend\MainCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ResearchTypeController;
use App\Http\Controllers\Admin\ResearchDevelopmentController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvisoryDirectorController;
use App\Http\Controllers\Admin\BoradDirectorController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\WhychooseusController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\ResearchDetailController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutusController;
use App\Http\Controllers\Frontend\MainPartnerController;
use App\Http\Controllers\Admin\SpecialCategoryController;
use App\Http\Controllers\Admin\SpecialSubCategoryController;
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
//     return view('frontend.index');
// });
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //dashboard
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Site settings
    Route::get('/sitesetting', [SiteSettingController::class, 'index'])->name('admin.sitesetting.index');
    Route::get('/sitesetting/edit/{id}', [SiteSettingController::class, 'edit'])->name('admin.sitesetting.edit');
    Route::post('/sitesetting/update/{id}', [SiteSettingController::class, 'update'])->name('admin.sitesetting.update');

    //change password
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    // Testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('/testimonial/add', [TestimonialController::class, 'create'])->name('admin.testimonial.add');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::post('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
     // Testimonial
     Route::get('/partner', [PartnerController::class, 'index'])->name('admin.partner.index');
     Route::get('/partner/add', [PartnerController::class, 'create'])->name('admin.partner.add');
     Route::post('/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
     Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
     Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
     Route::delete('/partner/delete/{id}', [PartnerController::class, 'delete'])->name('admin.partner.delete');
      // Category
      Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
      Route::get('/category/add', [CategoryController::class, 'create'])->name('admin.category.add');
      Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
      Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
      Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
      Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
 // Product
 Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
 Route::get('/product/add', [ProductController::class, 'create'])->name('admin.product.add');
 Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
 Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
 Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
 Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    // Banner
    Route::get('/banner', [BannerController::class, 'index'])->name('admin.banner.index');
    Route::get('/banner/add', [BannerController::class, 'create'])->name('admin.banner.add');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('/banner/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('/banner/delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
        // researchtype
        Route::get('/researchtype', [ResearchTypeController::class, 'index'])->name('admin.researchtype.index');
        Route::get('/researchtype/add', [ResearchTypeController::class, 'create'])->name('admin.researchtype.add');
        Route::post('/researchtype/store', [ResearchTypeController::class, 'store'])->name('admin.researchtype.store');
        Route::get('/researchtype/edit/{id}', [ResearchTypeController::class, 'edit'])->name('admin.researchtype.edit');
        Route::post('/researchtype/update/{id}', [ResearchTypeController::class, 'update'])->name('admin.researchtype.update');
        Route::delete('/researchtype/delete/{id}', [ResearchTypeController::class, 'delete'])->name('admin.researchtype.delete');
            // Banner
    Route::get('/research-development', [ResearchDevelopmentController::class, 'index'])->name('admin.research_development.index');
    Route::get('/research-development/add', [ResearchDevelopmentController::class, 'create'])->name('admin.reseacrh_development.add');
    Route::post('/research-development/store', [ResearchDevelopmentController::class, 'store'])->name('admin.research_development.store');
    Route::get('/research-development/edit/{id}', [ResearchDevelopmentController::class, 'edit'])->name('admin.research_development.edit');
    Route::post('/research-development/update/{id}', [ResearchDevelopmentController::class, 'update'])->name('admin.research_development.update');
    Route::delete('/research_devlopment/delete/{id}', [ResearchDevelopmentController::class, 'delete'])->name('admin.research_development.delete');
    // Achievement
    Route::get('/achievement', [AchievementController::class, 'index'])->name('admin.achievement.index');
    Route::get('/achievement/edit/{id}', [AchievementController::class, 'edit'])->name('admin.achievement.edit');
    Route::post('/achievement/update/{id}', [AchievementController::class, 'update'])->name('admin.achievement.update');
    // About Us
    Route::get('/aboutus', [AboutController::class, 'index'])->name('admin.aboutus.index');
    Route::get('/aboutus/edit/{id}', [AboutController::class, 'edit'])->name('admin.aboutus.edit');
    Route::post('/aboutus/update/{id}', [AboutController::class, 'update'])->name('admin.aboutus.update');
        // SEO
        Route::get('/seo', [SeoController::class, 'index'])->name('admin.seo.index');
        Route::get('/seo/{id}', [SeoController::class, 'edit'])->name('admin.seo.edit');
        Route::post('/seo/{id}', [SeoController::class, 'update'])->name('admin.seo.update');
             // log
     Route::get('/log', [LoginController::class, 'index'])->name('admin.log.index');
     Route::delete('/log/delete/{id}', [LoginController::class, 'delete'])->name('admin.log.delete');
      // Enquiry
    Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
    Route::delete('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
     //Why choose us
     Route::get('/whychooseus', [WhychooseusController::class, 'index'])->name('admin.whychooseus.index');
     Route::get('/whychooseus/edit/{id}', [WhychooseusController::class, 'edit'])->name('admin.whychooseus.edit');
     Route::post('/whychooseus/update/{id}', [WhychooseusController::class, 'update'])->name('admin.whychooseus.update');
       // Breadcrumb
       Route::get('/breadcrumb', [BreadcrumbController::class, 'index'])->name('admin.breadcrumb.index');
       Route::get('/breadcrumb/{id}', [BreadcrumbController::class, 'edit'])->name('admin.breadcrumb.edit');
       Route::post('/breadcrumb/{id}', [BreadcrumbController::class, 'update'])->name('admin.breadcrumb.update');


       // advisory director
      Route::get('/advisory-directors',[AdvisoryDirectorController::class,'index'])->name('advisory-directors.index');
      Route::get('/add-advisory-directors',[AdvisoryDirectorController::class,'create'])->name('add-advisory-directors');
      Route::post('/add-advisory-directors-post',[AdvisoryDirectorController::class,'store'])->name('add-advisory-directors-post');
      Route::get('/edit-advisory-directors/{id}',[AdvisoryDirectorController::class,'edit'])->name('edit-advisory-directors');
      Route::post('/update-advisory-directors-post/{id}',[AdvisoryDirectorController::class,'update'])->name('update-advisory-directors-post');
      Route::delete('/delete-advisory-directors/{id}',[AdvisoryDirectorController::class,'delete'])->name('delete-advisory-directors');
   // board director
      Route::get('/board-directors',[BoradDirectorController::class,'index'])->name('board-directors.index');
      Route::get('/add-board-directors',[BoradDirectorController::class,'create'])->name('add-board-directors');
      Route::post('/add-board-directors-post',[BoradDirectorController::class,'store'])->name('add-board-directors-post');
      Route::get('/edit-board-directors/{id}',[BoradDirectorController::class,'edit'])->name('edit-board-directors');
      Route::post('/update-board-directors-post/{id}',[BoradDirectorController::class,'update'])->name('update-board-directors-post');
      Route::delete('/delete-board-directors/{id}',[BoradDirectorController::class,'delete'])->name('delete-board-directors');

      
       // special product 
      Route::get('special-category',[SpecialCategoryController::class,'index'])->name('admin.special-category');
      Route::get('create-special-category',[SpecialCategoryController::class,'create'])->name('admin.create-special-category');
      Route::post('store-special-category',[SpecialCategoryController::class,'store'])->name('admin.store-special-category');
      Route::get('edit-special-category/{id}',[SpecialCategoryController::class,'edit'])->name('admin.edit-special-category');
      Route::post('update-special-category/{id}',[SpecialCategoryController::class,'update'])->name('admin.update-special-category');
      Route::delete('delete-special-category/{id}',[SpecialCategoryController::class,'delete'])->name('admin.delete-special-category');
      
          Route::get('special-sub-category',[SpecialSubCategoryController::class,'index'])->name('admin.special-sub-category');
      Route::get('create-special-sub-category',[SpecialSubCategoryController::class,'create'])->name('admin.create-special-sub-category');
      Route::post('store-special-sub-category',[SpecialSubCategoryController::class,'store'])->name('admin.store-special-sub-category');
      Route::get('edit-special-sub-category/{id}',[SpecialSubCategoryController::class,'edit'])->name('admin.edit-special-sub-category');
      Route::post('update-special-sub-category/{id}',[SpecialSubCategoryController::class,'update'])->name('admin.update-sub-special-category');
      Route::delete('delete-special-sub-category/{id}',[SpecialSubCategoryController::class,'destroy'])->name('admin.delete-sub-special-category');
});


// Admin login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('category/{slug}', [MainCategoryController::class, 'index'])->name('frontend.category');
Route::get('/',[MainController::class, 'index'])->name('frontend.home');
Route::get('products/{slug}', [ProductDetailController::class, 'index'])->name('frontend.productdetail');
Route::get('products', [ProductDetailController::class, 'product'])->name('frontend.product');
Route::get('research&development/{slug}', [ResearchDetailController::class, 'index'])->name('frontend.researchdetail');
Route::get('contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('about', [AboutusController::class, 'index'])->name('frontend.about');
Route::get('partners', [MainPartnerController::class, 'index'])->name('frontend.partner');