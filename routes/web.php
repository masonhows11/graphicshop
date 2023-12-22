<?php

// admin panel controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPermAssignController;
use App\Http\Controllers\Admin\AdminRoleAssignController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\ProductByCategorySlider\AdminSliderOneController;
use App\Http\Controllers\Admin\ProductByCategorySlider\AdminSliderTwoController;
use App\Http\Controllers\Admin\ProductByCategorySlider\AdminSliderThreeController;
use App\Http\Controllers\Admin\User\AdminUsersController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Front\AboutUs\AboutUsController;
use App\Http\Controllers\Front\ContactUs\ContactUsController;
use App\Http\Controllers\Front\Payment\PaymentController;
use App\Http\Controllers\Front\Product\ProductController;
use App\Http\Controllers\Front\Basket\BasketController;
use App\Http\Controllers\Front\Profile\ProfileController;
use App\Http\Controllers\HomeController;

// admin auth controllers
use App\Http\Controllers\Auth_Admin\AdminProfileController;
use App\Http\Controllers\Auth_Admin\AdminLoginController;
use App\Http\Controllers\Auth_Admin\AdminValidateController;

// auth front controllers
use App\Http\Controllers\Auth_Front\LoginUserController;
use App\Http\Controllers\Auth_Front\RegisterUserController;
use App\Http\Controllers\Auth_Front\ValidateUserController;

// admin live wire panel controllers
use App\Http\Livewire\Admin\AdminPerms;
use App\Http\Livewire\Admin\AdminRoles;
use App\Http\Livewire\Admin\ListUsersForPerm;
use App\Http\Livewire\Admin\ListUsersForRole;
use App\Http\Livewire\Admin\Users\AdminAdmins;
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

// for page does not exists
Route::get('/notFound',[HomeController::class,'notFound'])->name('not.found');

// front end routes
Route::get('/', [HomeController::class,'home'])->name('home');


Route::prefix('auth')->name('auth.')->group(function (){

    Route::get('/register', [RegisterUserController::class, 'registerForm'])->name('register.form');
    Route::post('/register-user', [RegisterUserController::class, 'register'])->name('register.user');

    Route::get('/login', [LoginUserController::class, 'loginForm'])->name('login.form');
    Route::post('/login-user', [LoginUserController::class, 'login'])->middleware('throttle:auth-login-limiter')->name('login.user');

    Route::get('/validate-user-form', [ValidateUserController::class, 'validateForm'])->name('validate.user.form');
    Route::post('/validate-user', [ValidateUserController::class, 'validate_user'])->middleware('throttle:auth-validate-limiter')->name('validate.user');

    Route::get('/resend-token/{token_guid}', [ValidateUserController::class, 'resendToken'])->middleware('throttle:auth-resend-token-limiter')->name('resend.token');
});

Route::get('/log-out', [LoginUserController::class, 'logOut'])->middleware('auth', 'web')->name('auth.log.out');

Route::prefix('profile')->middleware(['auth','web'])->group(function(){

    Route::get('/user-profile', [ProfileController::class,'Profile'])->name('user.profile');
});

Route::prefix('shopping')->middleware(['auth','web'])->group(function(){

    Route::get('/cart/check',[BasketController::class,'cartCheck'])->name('cart.check');
    Route::post('/payment',[PaymentController::class,'payment'])->name('payment.pay');


});

// for search product
Route::get('/search',[ProductController::class,'searchProducts'])->name('search.products');

// get product by category
Route::get('/search/category/{slug?}',[ProductController::class,'searchCategory'])->name('search.category');

// single product
Route::get('/product/{product:title}',[ProductController::class,'show'])->name('product');


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

    Route::get('/admins/index', AdminAdmins::class)->name('admins.index');

    Route::get('/admins/edit/{user}', [AdminUsersController::class,'edit'])->name('admins.edit');
    Route::post('/admins/update', [AdminUsersController::class,'update'])->name('admins.update');

});
// ->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/perms/index', AdminPerms::class)->name('perms.index');
    Route::get('/roles/index', AdminRoles::class)->name('roles.index');

});
// ->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/roles/list/users', ListUsersForRole::class)->name('role.list.users');
    Route::get('/roles/assign/form', [AdminRoleAssignController::class, 'create'])->name('roles.assign.form');
    Route::post('/roles/assign', [AdminRoleAssignController::class, 'store'])->name('roles.assign');

});
// ->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/perms/list/users', ListUsersForPerm::class)->name('perm.list.users');
    Route::get('/perms/assign/form', [AdminPermAssignController::class, 'create'])->name('perms.assign.form');
    Route::post('/perms/assign', [AdminPermAssignController::class, 'store'])->name('perms.assign');
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

    Route::get('/slider_one/create', [AdminSliderOneController::class,'create'])->name('slider_one.create');
    Route::post('/slider_one/store', [AdminSliderOneController::class,'store'])->name('slider_one.store');
    Route::get('/slider_one/destroy/{slider}', [AdminSliderOneController::class,'destroy'])->name('slider_one.destroy');

    Route::get('/slider_two/create', [AdminSliderTwoController::class,'create'])->name('slider_two.create');
    Route::post('/slider_two/store', [AdminSliderTwoController::class,'store'])->name('slider_two.store');
    Route::get('/slider_two/destroy/{slider}', [AdminSliderTwoController::class,'destroy'])->name('slider_two.destroy');

    Route::get('/slider_three/create', [AdminSliderThreeController::class,'create'])->name('slider_three.create');
    Route::post('/slider_three/store', [AdminSliderThreeController::class,'store'])->name('slider_three.store');
    Route::get('/slider_three/destroy{slider}', [AdminSliderThreeController::class,'destroy'])->name('slider_three.destroy');




});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/orders/index', AdminOrders::class)->name('orders.index');

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/payments/index', AdminPayments::class)->name('payments.index');

});

Route::get('/about_us',[AboutUsController::class,'aboutUs'])->name('about_us');
Route::get('/contact_us',[ContactUsController::class,'contactUs'])->name('contact_us');
