<?php

use App\Http\Controllers\Admin\Activity\ActivityController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Charge\ChargeController;
use App\Http\Controllers\Admin\Destination\DestinationController;
use App\Http\Controllers\Admin\FAQ\FaqController;
use App\Http\Controllers\Admin\Member\MemberController;
use App\Http\Controllers\Admin\Package\PackageCategoryController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/blog', [FrontendController::class, 'getBlog'])->name('getBlog');
Route::get('/member/{slug}', [FrontendController::class, 'getSingleMember'])->name('getSingleMember');
Route::post('/member/{slug}', [FrontendController::class, 'postRatting'])->name('postRatting');
Route::get('/package/{slug?}', [FrontendController::class, 'getSinglePackage'])->name('getSinglePackage');
Route::get('/contact', [FrontendController::class, 'getContact'])->name('getContact');
Route::get('/faq', [FrontendController::class, 'getFAQ'])->name('getFAQ');
Route::get('/about', [FrontendController::class, 'getAbout'])->name('getAbout');
Route::get('/booking', [FrontendController::class, 'getPackages'])->name('getPackages');
Route::post('/booking', [FrontendController::class, 'getPostBooking'])->name('getPostBooking');
Route::post('/booking/reserved', [FrontendController::class, 'postBooking'])->name('postBooking');
Route::get('/destinations/{slug?}', [FrontendController::class, 'getDestination'])->name('getDestination');
Route::get('/boking/calculation', [FrontendController::class, 'getBookingCalculation'])->name('getBookingCalculation');
Route::get('/get/date', [FrontendController::class, 'getDate'])->name('getDate');
Route::post('/mail', [FrontendController::class, 'postMail'])->name('postMail');

Auth::routes();
Route::group(['prefix'=>'admin', 'middleware'=>'role:admin'], function(){
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
	Route::resource('setting', SettingController::class)->except(['destroy']);
	Route::resource('category', CategoryController::class);
	Route::resource('destination', DestinationController::class);
	Route::resource('package', PackageController::class);
	Route::resource('charge', ChargeController::class)->except(['destroy', 'create']);
	Route::resource('banner', BannerController::class)->except(['create']);
	Route::resource('member', MemberController::class);
	Route::resource('page', PageController::class);
	Route::resource('blog', BlogController::class);
	Route::resource('testimonial', TestimonialController::class);
	Route::resource('faq', FaqController::class);
	Route::resource('activity', ActivityController::class)->except(['show']);
	Route::group(['prefix'=>'package'], function(){
		// for packages categories
		Route::get('/category/list', [PackageCategoryController::class, 'index'])->name('package_category.index');
		Route::get('/category/create', [PackageCategoryController::class, 'create'])->name('package_category.create');
		Route::post('/category', [PackageCategoryController::class, 'store'])->name('package_category.store');
		Route::get('/category/{packageCategory}/edit', [PackageCategoryController::class, 'edit'])->name('package_category.edit');
		Route::patch('/category/{packageCategory}', [PackageCategoryController::class, 'update'])->name('package_category.update');
		Route::get('/category/{packageCategory}', [PackageCategoryController::class, 'show'])->name('package_category.show');
		Route::delete('/category/{packageCategory}', [PackageCategoryController::class, 'destroy'])->name('package_category.destroy');
	});
	Route::get('/test', [App\Http\Controllers\HomeController::class, 'getTest'])->name('getTest');
	Route::post('/test', [App\Http\Controllers\HomeController::class, 'postTest'])->name('postTest');
});