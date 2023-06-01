<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
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


Route::controller(HomeController::class)->name('home.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/pulsa', 'pulsa')->name('pulsa');
    Route::get('/voucher', 'voucher')->name('voucher');
    Route::get('/handpone', 'handpone')->name('handpone');
    Route::get('/about', 'about')->name('about');
    Route::get('/aksesoris', 'aksesoris')->name('aksesoris');
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/order', 'order')->name('order');
    Route::get('/courier', 'getCourier')->name('courier');
});

Route::controller(LoginController::class)->prefix('login')->group(function () {
    Route::get('/', 'loginView')->name('loginView');
    Route::post('/login', 'login')->name('login.store');
});

Route::controller(RegisterController::class)->prefix('register')->group(function () {
    Route::get('/', 'registerView')->name('registerView');
    Route::post('/register', 'register')->name('register.store');
});
Route::controller(LoginController::class)->prefix('logout')->group(function () {
    Route::post('/', 'logout')->name('logout');
});

Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::controller(AdminController::class)->prefix('account')->name('account.')->group(function () {
        Route::get('/', 'account')->name('index');
        Route::post('/{id}/update', 'changePassword')->name('update');
    });
    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addCategory', 'addCategory')->name('addCategory');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addProduct', 'addProduct')->name('addProduct');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
     Route::controller(SettingController::class)->prefix('setting')->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/addSetting', 'addSetting')->name('addSetting');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
});
