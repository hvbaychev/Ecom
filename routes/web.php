<?php

use App\Http\Controllers\Admin\Products;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgottenPasswordManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileManager;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\UsersController;

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


Route::group(['middleware' => 'share'], function () {
    Route::get('/', function () { return view('home'); })->name('home');
    Route::get('/product-details', function () { return view('product-details'); })->name('product-details');  // if user wants to see some product details
    Route::get('/blog-details', function () { return view('blog-details'); })->name('blog-details'); // if user wants to read some article from blog
    Route::get('/contact', function () { return view('contact'); })->name('contact');
    Route::get('/blog', function () { return view('blog'); })->name('blog');
    Route::get('/shop', function () { return view('shop'); })->name('shop');
    Route::get('/womans', function() { return view('woman'); })->name('womans');
    Route::get('/kids', function() { return view('kid'); })->name('kids');
    Route::get('/man', function() { return view('man'); })->name('man');
    Route::get('/cosmetics', function() { return view('cosmetics'); })->name('cosmetics');
    Route::get('/accessories', function() { return view('accessories'); })->name('accessories');
    Route::get('/profile', [ProfileManager::class,'profile'])->name('profile')->middleware('isLoggedIn'); // two middleware
    Route::post('/profile', [ProfileManager::class,'profilePost'])->name('profilePost')->middleware('isLoggedIn');
});



Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/profile', [ProfileAdminController::class, 'edit'])->name('admin.profile.admin')->middleware('share');
    Route::post('/admin/profile', [ProfileAdminController::class, 'updateNameMail'])->name('admin.profile.adminPost')->middleware('share');
    Route::post('/admin/profile-pass', [ProfileAdminController::class, 'updatePassword'])->name('admin.profile.updatePass')->middleware('share');


    Route::get('/admin/users-profiles', [UsersController::class, 'index'])->name('admin.users.users')->middleware('share');
    Route::get('/admin/users-store', [UsersController::class, 'create'])->name('admin.users.create')->middleware('share');
    Route::post('/admin/user-store-new', [UsersController::class, 'store'])->name('admin.users-store')->middleware('share');
    Route::get('/admin/user/{id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit')->middleware('share');
    Route::put('/admin/user/{id}', [UsersController::class, 'update'])->name('admin.users.update')->middleware('share');
    Route::delete('/admin/user/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');


    Route::get('/admin/products', [Products::class, 'index'])->name('admin.products.products')->middleware('share');
    Route::get('/admin/store', [Products::class, 'create'])->name('admin.products.store')->middleware('share');
    Route::post('/admin/store', [Products::class, 'store'])->name('admin.products-store')->middleware('share');
    Route::get('/admin/product/{id}/edit', [Products::class, 'edit'])->name('admin.products.edit')->middleware('share');
    Route::put('/admin/product/{id}', [Products::class, 'update'])->name('admin.products.update')->middleware('share');
    Route::get('/admin/product/{id}/preview', [Products::class, 'show'])->name('admin.products.preview')->middleware('share');
    Route::delete('/admin/product/{id}', [Products::class, 'destroy'])->name('admin.products.destroy');
});



Route::get('/forgottenPassword', [ForgottenPasswordManager::class, 'forgetPassword'])->name('forgottenPassword');
Route::post('/forgottenPasswordPost', [ForgottenPasswordManager::class, 'forgetPasswordPost'])->name('forgottenPasswordPost');
Route::get('/resetPassword/{token}', [ForgottenPasswordManager::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPassword/{token}', [ForgottenPasswordManager::class, 'resetPasswordPost'])->name('resetPasswordPost');
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login-user',[AuthController::class, 'loginUser'])->name('login-user');
Route::get('/register', [AuthController::class,'registration'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/shop-cart', function () { return view('shop-cart'); })->name('shop-cart')->middleware('isLoggedIn');
Route::get('/checkout', function () { return view('checkout'); })->name('checkout')->middleware('isLoggedIn');


Route::get('/admin/dashboard', function () { return view('admin.dashboard');})->name('admin.dashboard')->middleware('share');




// Route::get('/admin/users-profiles', function () { return view('admin.users.users');})->name('admin.user.users')->middleware('share');


// Route::get('/admin/store', function () { return view('admin.products.store');})->name('admin.products.store')->middleware('share');
Route::get('/admin/notification', function () { return view('admin.notifications.notifications');})->name('admin.notifications.notifications')->middleware('share');
Route::get('/admin/icons', function () { return view('admin.icon.icons');})->name('admin.icon.icons')->middleware('share');
Route::get('/blog/article', function () { return view('admin.blog.article');})->name('admin.blog.article')->middleware('share');



