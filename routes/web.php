<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/customer_register', function () {
    return view('customer_register');
});

Route::get('/shop_register', function () {
    return view('shop_register');
});

Route::get('/admin_register', function () {
    return view('admin_register');
});

Route::resource('/category', CategoryController::class);
Route::resource('/book', ProductController::class);
