<?php

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

Auth::routes();

Route::group(['middleware' => ['cart.check']], function () {
    Route::get('/', 'HomeController@index');
});

// Web
Route::group(['middleware' => ['cart.check']], function () {
    Route::get('/product/{id}', 'Web\ProductController@show')
        ->name('web.product.show');
});

// User
Route::group(['middleware' => ['auth', 'cart.check']], function () {
    Route::get('/user/dashboard', 'User\UserController@index')
        ->name('user.dashboard');
    Route::resource('/user/cart', 'User\CartController', ['as' => 'user']);
    Route::resource('/user/order', 'User\OrderController', ['as' => 'user']);
});

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'Admin\AdminController@index')
        ->name('admin.dashboard');
    Route::get('/admin/order/payment_not_completed', 'Admin\OrderController@payment_not_completed')
        ->name('admin.order.payment_not_completed');
    Route::get('/admin/order/payment_completed', 'Admin\OrderController@payment_completed')
        ->name('admin.order.payment_completed');
    Route::get('/admin/order/{id}', 'Admin\OrderController@payment_confirm')
        ->name('admin.order.payment_confirm');
    Route::resource('/admin/product', 'Admin\ProductController', ['as' => 'admin']);
    Route::resource('/admin/category', 'Admin\CategoryController', ['as' => 'admin']);
});
