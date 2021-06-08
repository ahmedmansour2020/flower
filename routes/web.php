<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/', [HomeController::class, 'to_home'])->name('home');
Route::get('/register/buyer', [UserController::class, 'buyer_register'])->name('register_buyer');
Route::get('/register-1', [UserController::class, 'register_1'])->name('register_1');
Route::post('/register-1/save', [UserController::class, 'save_buyer_info'])->name('save_buyer_info');

Route::get('acc-success', function () {
    return view('auth/acc-success');
})->name('acc-success');


Route::resource('message', MessageController::class);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

});
Route::group(['prefix' => 'buyer', 'middleware' => ['auth', 'buyer']], function () {
    Route::resource('product', ProductController::class);
    Route::post('delete/product',[ProductController::class,'destroy'])->name('delete.product');
    Route::get('store-data', [UserController::class,'edit_user_data'])->name('store-data');
    Route::get('login-data',[UserController::class,'user_info'] )->name('login-data');
    Route::post('save_login_data',[UserController::class,'change_user_info'] )->name('save_login_data');
});


Route::get('all-shops', function () {
    return view('admin/show/all-shops');
})->name('all-shops');

Route::get('page-users', function () {
    return view('admin/show/page-users');
})->name('page-users');

Route::get('page-vendors', function () {
    return view('admin/show/page-vendors');
})->name('page-vendors');

Route::get('setting-pages', function () {
    return view('admin/show/setting-pages');
})->name('setting-pages');
