<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-verif', [LoginController::class, 'authenticate'])->name('login-verif');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'store'])->name('register-proses');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
    Route::get('/my-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/edit-profile', [UserController::class, 'profile_edit'])->name('user.edit-profile');
    Route::put('/update-profile/{id}', [UserController::class, 'update'])->name('user.update-profile');
    Route::get('/user/history', [UserController::class, 'history'])->name('user.history');
    Route::get('/user/history/{id}', [UserController::class, 'history_detail'])->name('user.history-detail');
    Route::get('/user/pesanans', [UserController::class, 'pesanan'])->name('user.pesanans');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/product', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/admin/product/create', [ProductsController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/product/create-proses', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/product/edit/{id}', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/product/update/{id}', [ProductsController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/product/delete/{id}', [ProductsController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/admin/order', [OrderController::class, 'index_admin'])->name('admin.order');
    Route::get('/admin/order/{id}', [OrderController::class, 'detail_admin'])->name('admin.order-detail');
});