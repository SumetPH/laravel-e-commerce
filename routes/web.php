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

Route::get('/', 'HomeController@index')->middleware(['cart.check']);

// Web
Route::group(['middleware' => ['cart.check']], function () {
    Route::get('/product/{id}', 'Web\ProductController@show')->name('web.product.show');
});

// User
Route::group(['middleware' => ['auth', 'cart.check']], function () {
    Route::get('/user/dashboard', 'User\UserController@index')->name('user.dashboard');
    Route::resource('/user/cart', 'User\CartController');
});

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::resource('/admin/product', 'Admin\ProductController');
    Route::resource('/admin/category', 'Admin\CategoryController');
});
