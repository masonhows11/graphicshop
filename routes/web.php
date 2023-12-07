<?php

use App\Http\Controllers\Dash\AdminController;
use App\Http\Controllers\Dash\Auth\AdminLoginController;
use App\Http\Controllers\Dash\Auth\AdminProfileController;
use App\Http\Controllers\Dash\Auth\AdminValidateController;
use App\Http\Controllers\HomeController;
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

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [AdminProfileController::class, 'update'])->name('update.profile');

    Route::get('/edit/mobile',[AdminProfileController::class,'editMobile'])->name('edit.mobile');
    Route::post('/update/mobile',[AdminProfileController::class,'updateMobile'])->name('update.mobile');

    Route::get('/logout', [AdminLoginController::class, 'logOut'])->name('logout');

});

Route::get('/about_us',[\App\Http\Controllers\Front\AboutUs\AboutUsController::class,'aboutUs'])->name('about_us');
Route::get('/contact_us',[\App\Http\Controllers\Front\ContactUs\ContactUsController::class,'contactUs'])->name('contact_us');
