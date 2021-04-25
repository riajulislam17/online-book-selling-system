<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [ProductController::class, 'home']);
Route::resource('dashboard', DashboardController::class); //CRUD
Route::resource('seller', SellerController::class);
Route::resource('category', CategoryController::class);
Route::resource('book', ProductController::class);
Route::resource('customer', CustomerController::class);
Route::resource('order', CustomerController::class);

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
    Route::get('Dashboard', [SellerController::class, 'dashboard']);
});

Auth::routes();

Route::get('/ook', function (){
    return array(
        'stats' => true
    );
})->middleware('auth:seller');
