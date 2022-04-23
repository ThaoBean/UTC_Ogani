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

//Brand

//Category

//ADMIN
Route::get('/admin', 'HomeController@indexAdmin');

//ADM brand
Route::get('/admin/list-brand', 'BrandController@indexAdmin');
Route::get('/admin/create-brand', 'BrandController@create');