<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\HandphoneController;
use App\Http\Controllers\AksesoriController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('user.landing');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('frontend.home');
// });
Auth::routes();

// Route user
Route::controller(HomeController::class)->name('home.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/pulsa', 'pulsa')->name('pulsa');
    Route::get('/struck', 'struck')->name('struck');
    Route::get('/phone', 'phone')->name('phone');
    Route::get('/akses', 'akses')->name('akses');
    Route::get('/about', 'about')->name('about');
    Route::get('/contat', 'contat')->name('contat');
    Route::get('/akses', 'akses')->name('akses');
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/order', 'order')->name('order');
    Route::get('/courier', 'getCourier')->name('courier');
});
Route::get('/goak', [OrderController::class, 'goak']);

Route::get('/payment', [OrderController::class, 'payment']);
Route::post('/payment', [OrderController::class, 'payment_post']);


Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
    });
});
Route::get('/admin', function () {
    return redirect('/admin/home');
})->middleware('is_admin');
Route::get('admin/home', [HomeController::class, 'admin_home'])->name('admin.home')->middleware('is_admin');


// Route::controller(LoginController::class)->prefix('login')->group(function () {
//     Route::get('/', 'loginView')->name('loginView');
//     Route::post('/login', 'login')->name('login.store');
// });

// Route::controller(RegisterController::class)->prefix('register')->group(function () {
//     Route::get('/', 'registerView')->name('registerView');
//     Route::post('/register', 'register')->name('register.store');
// });
// Route::controller(LoginController::class)->prefix('logout')->group(function () {
//     Route::post('/', 'logout')->name('logout');
// });

Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::controller(AdminController::class)->prefix('account')->name('account.')->group(function () {
        Route::get('/', 'account')->name('index');
        Route::post('/{id}/update', 'changePassword')->name('update');
    });
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'user')->name('index');
        Route::post('/{id}/update', 'changePassword')->name('update');
    });
    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addCategory', 'addCategory')->name('addCategory');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(VoucherController::class)->prefix('voucher')->name('voucher.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addVoucher', 'addVoucher')->name('addVoucher');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addProduct', 'addProduct')->name('addProduct');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(HandphoneController::class)->prefix('handphone')->name('handphone.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addHandphone', 'addHandphone')->name('addHandphone');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
     Route::controller(SettingController::class)->prefix('setting')->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addSetting', 'addSetting')->name('addSetting');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(AksesoriController::class)->prefix('aksesori')->name('aksesori.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addAksesori', 'addAksesori')->name('addAksesori');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
