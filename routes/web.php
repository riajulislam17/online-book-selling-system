<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'home'])->name('homePage');
Route::get('/browsByShop', [ProductController::class, 'browsByShop'])->name('shop.view');
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);

Route::prefix('auth')->group(function (){
    Route::get('seller/login', [LoginController::class, 'showSellerLoginForm']);
    Route::get('customer/login', [LoginController::class, 'showCustomerLoginForm']);

    Route::post('seller/login', [LoginController::class, 'sellerLogin'])->name('auth.seller.login');
    Route::post('customer/login', [LoginController::class, 'customerLogin'])->name('auth.customer.login');

    Route::get('seller/register', [RegisterController::class, 'showSellerRegisterForm'])->name('auth.seller.register');
    Route::get('customer/register', [RegisterController::class, 'showCustomerRegisterForm'])->name('auth.customer.register');

    Route::post('seller/register', [RegisterController::class, 'createSeller'])->name('auth.seller.register');
    Route::post('customer/register', [RegisterController::class, 'customerRegister'])->name('auth.customer.register');

});

Route::prefix('seller')->group(function (){
    Route::get('dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('profile', [SellerController::class, 'profile'])->name('seller.profile');
    Route::get('profile/edit', [SellerController::class, 'showProfileEdit'])->name('seller.profile.edit');
    Route::patch('profile/edit/{seller}', [SellerController::class, 'profileUpdate'])->name('seller.profile.update');

    Route::get('category', [SellerController::class, 'categoryIndex'])->name('seller.category.index');
    Route::get('product', [SellerController::class, 'productIndex'])->name('seller.product.index');
});


Route::prefix('customer')->group(function (){
    Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('profile/edit', [CustomerController::class, 'showProfileEdit'])->name('customer.profile.edit');
    Route::patch('profile/edit/{customer}', [CustomerController::class, 'profileUpdate'])->name('customer.profile.update');
});


Route::prefix('order')->group(function (){
    Route::get('create/{product}', [OrderController::class, 'create'])->name('order.create');
    Route::post('store/{product}', [OrderController::class, 'store'])->name('order.store');
});



Auth::routes();

Route::get('/ook', function (){
    return array(
        'stats' => true
    );
})->middleware('auth:seller');
