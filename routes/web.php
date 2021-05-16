<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SslCommerzPaymentController;
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
    Route::get('cart/add/{product}', [CustomerController::class, 'addToCart'])->name('cart.add');
    Route::get('cart/view', [CustomerController::class, 'viewCart'])->name('cart.view');
    Route::get('cart/remove/{id}', [CustomerController::class, 'removeCart'])->name('cart.remove');
});

Route::prefix('admin')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('orders', [DashboardController::class, 'orders'])->name('admin.orders');
    Route::get('sellers', [DashboardController::class, 'sellers'])->name('admin.sellers');
    Route::get('customers', [DashboardController::class, 'customers'])->name('admin.customers');
    Route::get('products', [DashboardController::class, 'products'])->name('admin.products');
});


Route::prefix('invoices')->group(function (){
    Route::get('create/{product}', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('store/{product}', [InvoiceController::class, 'store'])->name('invoices.store');
});



// SSLCOMMERZ Start
Route::get('/payment/', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('payment');
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('payment.old');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Auth::routes();

Route::get('/ook', function (){
    return array(
        'stats' => true
    );
})->middleware('auth:seller');
