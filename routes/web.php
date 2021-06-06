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

});

Route::get('register-1', function () {
    return view('auth/register-1');
})->name('register-1');
