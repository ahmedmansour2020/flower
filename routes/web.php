<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\NotificationController;
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
Route::post('change_message_status', [HomeController::class, 'change_message_status'])->name('change_message_status');

// Route::get('acc-success', function () {
//     return view('auth/acc-success');
// })->name('acc-success');

Route::resource('message', MessageController::class);
Route::resource('favourite', FavouriteController::class);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return redirect()->route('all-shops');
    })->name('admin');
    Route::resource('category', CategoryController::class);
    Route::get('all-shops', [AdminController::class, 'all_shops'])->name('all-shops');
    Route::post('change_buyer_membership_status', [AdminController::class, 'change_buyer_membership_status'])->name('change_buyer_membership_status');
    Route::post('delete_category', [CategoryController::class, 'destroy'])->name('delete_category');
    Route::get('buyerinfo/{id}', [AdminController::class, 'edit_user_data']);

    Route::get('setting-pages', [AdminController::class, 'settings'])->name('setting-pages');
    Route::get('page/{type}', [AdminController::class, 'users'])->name('page_user_vendor');
    Route::post('save_settings', [AdminController::class, 'save_settings'])->name('save_settings');
    Route::post('delete_user', [AdminController::class, 'delete_user'])->name('delete_user');

    Route::get('/settings/sliders', [SettingController::class, 'to_sliders'])->name('setting.sliders');
    Route::get('/settings/sliders/create', [SettingController::class, 'create_slider'])->name('create.slider');
    Route::get('/setting/slider/{id}', [SettingController::class, 'edit_slider']);
    Route::get('/setting/slider/delete/{id}', [SettingController::class, 'delete_slider']);
    Route::post('/settings/sliders/store', [SettingController::class, 'save_slider'])->name('save_slider');
    Route::put('/settings/sliders/update/{id}', [SettingController::class, 'update_slider'])->name('update_slider');
    Route::post('/settings/slider/delete/image', [SettingController::class, 'slider_delete_image'])->name('slider_delete_image');
    Route::post('/change_slider_status', [SettingController::class, 'change_slider_status'])->name('change_slider_status');
    Route::get('/areas', [LocationController::class, 'areas'])->name('areas');
    Route::get('/area/create', [LocationController::class, 'create_area'])->name('area.create');
    Route::get('/area/{id}', [LocationController::class, 'edit_area'])->name('area.edit');
    Route::post('/area-delete', [LocationController::class, 'destroy'])->name('area_delete');
    Route::post('/area-store', [LocationController::class, 'store_area'])->name('area.store');
    Route::put('/area-update/{id}', [LocationController::class, 'update_area'])->name('area.update');

    Route::post('change_password', [AdminController::class, 'change_password'])->name('change_password');

});
Route::post('get_areas', [LocationController::class, 'getAreas'])->name('get_areas');
Route::group(['prefix' => 'buyer', 'middleware' => ['auth', 'buyer']], function () {
    Route::resource('product', ProductController::class);
    Route::get('/', function () {
        return redirect()->route('store-data');
    })->name('buyer');
    Route::post('delete/product', [ProductController::class, 'destroy'])->name('delete.product');
    Route::get('store-data', [UserController::class, 'edit_user_data'])->name('store-data');
    Route::get('login-data', [UserController::class, 'user_info'])->name('login-data');
});
Route::post('save_login_data', [UserController::class, 'change_user_info'])->name('save_login_data');
Route::get('writing-messages', [MessageController::class, 'create'])->name('writing-messages');
Route::get('getNotifications',[NotificationController::class, 'getNotifications'])->name('notifications');
Route::post('read_notifications',[NotificationController::class, 'read_notifications'])->name('read_notifications');
Route::get('statistics', [AdminController::class, 'statistics'])->name('statistics');

Route::get('incoming-mail?mail-messages=new', [MessageController::class, 'index'])->name('mail-messages')->middleware(['auth']);
Route::get('incoming-mail', [MessageController::class, 'index'])->name('incoming-mail')->middleware(['auth']);
Route::get('view-mail/{id}', [MessageController::class, 'show'])->name('view-mail')->middleware(['auth']);
Route::post('delete_message', [MessageController::class, 'destroy'])->name('delete_message')->middleware(['auth']);
Route::get('about-us', [HomeController::class, 'to_about_us'])->name('about-us');

Route::get('products/{id}', [HomeController::class, 'to_products'])->name('vendor-products');
Route::get('buyer-offers/{id}', [HomeController::class, 'to_buyer_offers'])->name('buyer_offers');

Route::get('product-view/{id}', [HomeController::class, 'product_view'])->name('product-view');
Route::get('offers', [HomeController::class, 'to_offers'])->name('all_offers');
Route::get('new-products', [HomeController::class, 'to_new'])->name('new-products');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('add_location',[HomeController::class,'add_location'])->name('add_location')->middleware(['auth']);
Route::get('wishlist', [HomeController::class, 'wish_list'])->name('wish-list')->middleware(['auth']);
Route::post('delete_favourite/{id}', [FavouriteController::class, 'destroy'])->name('delete_favourite')->middleware(['auth']);
Route::post('home_message', [MessageController::class, 'home_message'])->name('home_message')->middleware(['auth']);
Route::post('msg_read', [MessageController::class, 'msg_read'])->name('msg_read')->middleware(['auth']);

Route::get('user-profile',[UserController::class,'user_profile'])->name('user_profile')->middleware(['auth']);