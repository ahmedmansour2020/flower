<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    Route::get('all-shops', [AdminController::class, 'all_shops'])->name('all-shops');
    Route::post('change_buyer_membership_status', [AdminController::class, 'change_buyer_membership_status'])->name('change_buyer_membership_status');
    Route::get('byerinfo/{id}', [AdminController::class, 'edit_user_data']);

    Route::get('setting-pages', [AdminController::class, 'settings'])->name('setting-pages');
    Route::get('page/{type}', [AdminController::class,'users'])->name('page_user_vendor');
    Route::post('save_settings', [AdminController::class, 'save_settings'])->name('save_settings');
    Route::post('delete_user', [AdminController::class, 'delete_user'])->name('delete_user');

});
Route::group(['prefix' => 'buyer', 'middleware' => ['auth', 'buyer']], function () {
    Route::resource('product', ProductController::class);
    Route::post('delete/product', [ProductController::class, 'destroy'])->name('delete.product');
    Route::get('store-data', [UserController::class, 'edit_user_data'])->name('store-data');
    Route::get('login-data', [UserController::class, 'user_info'])->name('login-data');
    Route::post('save_login_data', [UserController::class, 'change_user_info'])->name('save_login_data');
});

// Route::get('page-users', function () {
//     return view('admin/show/page-users');
// })->name('page-users');


Route::get('statistics', function () {
    return view('admin/show/statistics');
})->name('statistics');

Route::get('mail-messages', function () {
    return view('admin/show/mail-messages');
})->name('mail-messages');

Route::get('incoming-mail', function () {
    return view('admin/show/incoming-mail');
})->name('incoming-mail');

Route::get('writing-messages', function () {
    return view('admin/show/writing-messages');
})->name('writing-messages');

Route::get('vendor-products', function () {
    return view('home/vendor-products');
})->name('vendor-products');

Route::get('product-view', function () {
    return view('home/product-view');
})->name('product-view');
