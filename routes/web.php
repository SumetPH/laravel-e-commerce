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

Route::get('/', 'HomeController@index');

// Web
Route::get('/product/{id}', 'Web\ProductController@show')->name('web.product.show');

// User
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/dashboard', 'User\UserController@index')->name('user.dashboard');
});

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::resource('/admin/product', 'Admin\ProductController');
    Route::resource('/admin/category', 'Admin\CategoryController');
});
