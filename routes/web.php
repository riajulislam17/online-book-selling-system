<?php

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

Route::resource('/', CustomerController::class);
Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::resource('seller', SellerController::class)->middleware('Seller');
Route::resource('/category', CategoryController::class)->middleware('Admin');
Route::resource('/book', ProductController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/order', CustomerController::class)->middleware('auth');

Route::get('my', function (){
    return view('CustomAuth.login');
});

Auth::routes();

Route::get('seller_login', function (){
    return view('seller.login');
});

Route::post('seller_login', [App\Http\Controllers\CustomAuth\AdminController::class, 'login'])->name('customer.login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('customer')->middleware('Seller');
