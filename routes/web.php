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
    Route::get('/product/{id}', 'Web\ProductController@show')->name('web.product.show');
});

// User
Route::group(['middleware' => ['auth', 'cart.check']], function () {
    Route::get('/user/dashboard', 'User\UserController@index')->name('user.dashboard');
    Route::resource('/user/cart', 'User\CartController', ['as' => 'user']);
    Route::resource('/user/order', 'User\OrderController', ['as' => 'user']);
});

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::resource('/admin/product', 'Admin\ProductController', ['as' => 'admin']);
    Route::resource('/admin/category', 'Admin\CategoryController', ['as' => 'admin']);
    Route::resource('/admin/order', 'Admin\OrderController', ['as' => 'admin']);
});
