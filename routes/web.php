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
//CLIENTS
//Home
Route::get('/', 'HomeController@index');

//Register
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

//Login
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

//Product
Route::get('/detail-product/{id}', 'ProductController@getProductById');
//Products by category
Route::get('/products-by-category/{id}', 'ProductController@getListProductByCategory');

//Brand

//Category

//ADMIN
Route::get('/admin', 'HomeController@indexAdmin');

//ADM brand
Route::get('/admin/list-brand', 'BrandController@indexAdmin');
Route::get('/admin/create-brand', 'BrandController@create');
Route::post('/admin/store-brand', 'BrandController@store');
Route::get('/admin/edit-brand/{id}', 'BrandController@edit');
Route::post('/admin/update-brand/{id}', 'BrandController@update');
Route::post('/admin/delete-brand/{id}', 'BrandController@destroy');

//ADM category
Route::get('/admin/list-category', 'CategoryController@indexAdmin');
Route::get('/admin/create-category', 'CategoryController@create');
Route::post('/admin/store-category', 'CategoryController@store');
Route::get('/admin/edit-category/{id}', 'CategoryController@edit');
Route::post('/admin/update-category/{id}', 'CategoryController@update');
Route::post('/admin/delete-category/{id}', 'CategoryController@destroy');

//ADM Products
Route::get('/admin/list-product', 'ProductController@indexAdmin');
Route::get('/admin/create-product', 'ProductController@create');
Route::post('/admin/store-product', 'ProductController@store');
Route::get('/admin/show-product/{id}', 'ProductController@show');
Route::get('/admin/edit-product/{id}', 'ProductController@edit');
Route::post('/admin/update-product/{id}', 'ProductController@update');
Route::post('/admin/delete-product/{id}', 'ProductController@destroy');