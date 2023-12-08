<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminProfileController;
use App\Http\Controllers\Admin\Auth\AdminValidateController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Front\AboutUs\AboutUsController;
use App\Http\Controllers\Front\ContactUs\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Category\AdminCategory;
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

Route::get('/', [HomeController::class,'home'])->name('home');

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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/category/index', AdminCategory::class)->name('category.index');

    Route::get('/category/create', [AdminCategoryController::class,'create'])->name('category.create');
    Route::post('/category/store', [AdminCategoryController::class,'store'])->name('category.store');

    Route::get('/category/edit/{id}', [AdminCategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update', [AdminCategoryController::class,'update'])->name('category.update');


});

Route::get('/about_us',[AboutUsController::class,'aboutUs'])->name('about_us');
Route::get('/contact_us',[ContactUsController::class,'contactUs'])->name('contact_us');
