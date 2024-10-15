<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\CurrentJobController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EthicalController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\InstitutionalController;
use App\Http\Controllers\Admin\KeyElementsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\OTCProductController;
use App\Http\Controllers\Admin\OurAchievementController;
use App\Http\Controllers\Admin\OurVisionController;
use App\Http\Controllers\Admin\PharmaController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\WhoWeAreController;
use App\Http\Controllers\Website\CareersController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\ExportsController;
use App\Http\Controllers\Website\IndexPageController;
use App\Http\Controllers\Website\OurCompanyController;
use App\Http\Controllers\Website\ProductController;

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


// website index page route
Route::get('/', [IndexPageController::class, 'indexPage'])->name('home.index');
// website our company all  route
Route::get('our-company/who-we-are', [OurCompanyController::class, 'WhoWeAre'])->name('home.who-we-are');
Route::get('our-company/vision', [OurCompanyController::class, 'vision'])->name('home.vision');
Route::get('our-company/management', [OurCompanyController::class, 'management'])->name('home.management');
Route::get('our-company/pharmacovigilance', [OurCompanyController::class, 'pharmaCovigilance'])->name('home.pharmacovigilance');
// website products all  route
Route::get('products/otc', [ProductController::class, 'otc'])->name('home.otc');
Route::get('products/ethical', [ProductController::class, 'ethical'])->name('home.ethical');
Route::get('products/institutional', [ProductController::class, 'institutional'])->name('home.institutional');
// website exports all route 
Route::get('exports/world-map', [ExportsController::class, 'worldMap'])->name('home.world-map');
// website careers all route
Route::get('careers/current-job', [CareersController::class, 'currentJob'])->name('home.current-job');
Route::get('careers/reach-out', [CareersController::class, 'reachOut'])->name('home.reach-out');
// carrers form submit 
Route::post('careers/reach-out-post', [CareersController::class, 'reachOutPost'])->name('home.reach-out-post');
// website contact route
Route::get('/contact-us', [ContactUsController::class, 'contactUs'])->name('home.contact-us');
// contact form submit 
Route::post('/contact-post', [ContactUsController::class, 'contactUsPost'])->name('home.contact-post');

//  admin panel all route here 
Route::group(['prefix' => 'admin'], function () {
  Route::get('login', [LoginController::class, 'login'])->name('admin.login');
  Route::post('login-post', [LoginController::class, 'loginPost'])->name('admin.post-login');
  Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
  Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('change-passoword', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');
    Route::post('change-passoword-post', [ChangePasswordController::class, 'changePasswordPost'])->name('admin.change-password-post');
    Route::resource('homepages', HomePageController::class);
    Route::resource('homeabouts', AboutPageController::class);
    Route::resource('ourachievements', OurAchievementController::class);
    Route::resource('whoweares', WhoWeAreController::class);
    Route::resource('ourvisions', OurVisionController::class);
    Route::resource('managements', ManagementController::class);
    Route::resource('pharmas', PharmaController::class);
    Route::resource('keyelements', KeyElementsController::class);
    Route::resource('otcproducts', OTCProductController::class);
    Route::resource('ethicals', EthicalController::class);
    Route::resource('institutionals', InstitutionalController::class);
    Route::resource('exports', ExportController::class);
    Route::resource('currentjobs', CurrentJobController::class);
    Route::resource('seosettings', SeoSettingController::class);
    Route::resource('contactdetails', ContactDetailController::class);
    Route::resource('sitesettings',SiteSettingController::class);
    Route::resource('metatags',MetaTagController::class);
    // reach out form details 
    Route::get('reach-out-details', [CareersController::class, 'reachOutPostDetails'])->name('admin.reach-out-details');
    Route::get('reach-out-delete/{id}', [CareersController::class, 'reachOutDelete'])->name('admin.reach-out-delete');

    // contact form details 
    Route::get('/contact-form-details', [ContactUsController::class, 'contactUsDetails'])->name('admin.contact-details');
    Route::get('/contact-form-delete/{id}', [ContactUsController::class, 'contactDelete'])->name('admin.contact-delete');
    // admin logs details
    Route::get('admin-logs', [LoginController::class, 'adminLogs'])->name('admin.logs-details');

  });
});
