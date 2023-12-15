<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminProfileController;
use App\Http\Controllers\Admin\Auth\AdminValidateController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\User\AdminUsersController;
use App\Http\Controllers\Front\AboutUs\AboutUsController;
use App\Http\Controllers\Front\ContactUs\ContactUsController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Front\Product\ProductController;
use App\Http\Controllers\HomeController;


use App\Http\Livewire\Admin\Users\AdminUsers;
use App\Http\Livewire\Admin\Category\AdminCategory;
use App\Http\Livewire\Admin\Product\AdminProduct;
use App\Http\Livewire\Admin\Orders\AdminOrders;
use App\Http\Livewire\Admin\Payments\AdminPayments;
use Illuminate\Support\Facades\Route;

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

// front end routes
Route::get('/', [HomeController::class,'home'])->name('home');

// for search product
Route::get('/search',[ProductController::class,'searchProducts'])->name('search.products');

// get product by category
Route::get('/search/category/{slug?}',[ProductController::class,'searchCategory'])->name('search.category');

// single product
Route::get('/product/{product:title}',[ProductController::class,'show'])->name('product');
// for page does not exists
Route::get('/notFound',[HomeController::class,'notFound'])->name('not.found');

// admin panel routes

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin.login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');

    Route::get('/validate', [AdminValidateController::class, 'validateEmailForm'])->name('admin.validate.email.form');
    Route::post('/validate', [AdminValidateController::class, 'validateEmail'])->name('admin.validate.email');

});
// ->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/index', [AdminController::class, 'index'])->name('index');

    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [AdminProfileController::class, 'update'])->name('update.profile');

    Route::get('/edit/mobile',[AdminProfileController::class,'editMobile'])->name('edit.mobile');
    Route::post('/update/mobile',[AdminProfileController::class,'updateMobile'])->name('update.mobile');

    Route::get('/logout', [AdminLoginController::class, 'logOut'])->name('logout');

});
// ->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/users/index', AdminUsers::class)->name('users.index');

    Route::get('/user/create', [AdminUsersController::class,'create'])->name('user.create');
    Route::post('/user/store', [AdminUsersController::class,'store'])->name('user.store');

    Route::get('/user/edit/{user}', [AdminUsersController::class,'edit'])->name('user.edit');
    Route::post('/user/update', [AdminUsersController::class,'update'])->name('user.update');

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/category/index', AdminCategory::class)->name('category.index');

    Route::get('/category/create', [AdminCategoryController::class,'create'])->name('category.create');
    Route::post('/category/store', [AdminCategoryController::class,'store'])->name('category.store');

    Route::get('/category/edit/{id}', [AdminCategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update', [AdminCategoryController::class,'update'])->name('category.update');


});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/product/index', AdminProduct::class)->name('product.index');

    Route::get('/product/create', [AdminProductController::class,'create'])->name('product.create');
    Route::post('/product/store', [AdminProductController::class,'store'])->name('product.store');

    Route::get('/product/edit/{product}', [AdminProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update', [AdminProductController::class,'update'])->name('product.update');

    Route::get('/product/download/demo/{id}',[AdminProductController::class,'downloadDemoFile'])->name('product.download.demo');
    Route::get('/product/download/source/{id}',[AdminProductController::class,'downloadSourceFile'])->name('product.download.source');


});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/orders/index', AdminOrders::class)->name('orders.index');

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/payments/index', AdminPayments::class)->name('payments.index');

});

Route::get('/about_us',[AboutUsController::class,'aboutUs'])->name('about_us');
Route::get('/contact_us',[ContactUsController::class,'contactUs'])->name('contact_us');
