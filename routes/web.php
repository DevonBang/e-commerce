<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DefaultController::class, 'index'])->name('home');
Route::get('/product', [DefaultController::class, 'product'])->name('product');
Route::get('/product/{slug}', [DefaultController::class, 'product_detail'])->name('product.detail');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-verif', [LoginController::class, 'authenticate'])->name('login-verif');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'store'])->name('register-proses');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
    Route::get('/my-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/update-profile/{id}', [UserController::class, 'update'])->name('user.update-profile');
    Route::get('/user/history', [UserController::class, 'history'])->name('user.history');
    Route::get('/user/history/{id}', [UserController::class, 'history_detail'])->name('user.history-detail');
    Route::get('/user/pesanans', [UserController::class, 'pesanan'])->name('user.pesanans');
    Route::get('/cart', [DefaultController::class, 'cart'])->name('cart');
    Route::get('/product/add/{id}', [DefaultController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('/update-cart', [DefaultController::class, 'updateCart'])->name('update.cart.product');
    Route::delete('/delete-cart-product', [DefaultController::class, 'deleteProduct'])->name('delete.cart.product');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/product', [ProductsController::class, 'index'])->name('admin.products');
    Route::post('/admin/product/create-proses', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/product/edit/{id}', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/product/update/{id}', [ProductsController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/product/delete/{id}', [ProductsController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/admin/order', [OrderController::class, 'index_admin'])->name('admin.order');
    Route::get('/admin/order/export', [OrderController::class, 'export_excel'])->name('admin.export');
    Route::get('/admin/order/{id}', [OrderController::class, 'detail_admin'])->name('admin.order-detail');
});