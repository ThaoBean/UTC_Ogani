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

//My account
Route::get('/my-profile', 'LoginController@myProfile')->middleware('checkAuth');
Route::post('/update-my-acc', 'LoginController@updateProfile')->middleware('checkAuth');
Route::post('/change-password', 'LoginController@changePassword')->middleware('checkAuth');
//Product
Route::get('/detail-product/{id}', 'ProductController@getProductById');
//Products by category
Route::get('/products-by-category/{id}', 'ProductController@getListProductByCategory');
//Product by brand
Route::get('/products-by-brand/{id}', 'ProductController@getListProductByBrand');
//Product sale off
Route::get('/products-sale-off', 'ProductController@listSaleOff');

//search product
Route::get('/search-product', 'ProductController@searchProduct');

//Cart
//Display cart
Route::get('/my-cart', 'CartController@index')->middleware('checkAuth');
//Add to cart
Route::post('/add-to-cart/{id}', 'CartController@store')->middleware('checkAuth');
Route::get('/continue-shopping', 'CartController@continueShopping')->middleware('checkAuth');
Route::post('/addToCart/{id}', 'CartController@addToCart')->middleware('checkAuth');
Route::post('/delete-product-cart/{id}', 'CartController@destroy')->middleware('checkAuth');
Route::get('/checkout', 'CartController@checkout')->middleware('checkAuth');

//Checkout
Route::post('/place-order', 'OrderController@store')->middleware('checkAuth');
Route::get('/history-order', 'OrderController@index')->middleware('checkAuth');
Route::get('/order-detail/{id}', 'OrderController@viewOrderDetails')->middleware('checkAuth');
Route::get('/cancel-order/{id}', 'OrderController@cancelOrder')->middleware('checkAuth');

//Review product
Route::post('/review-product/{product_id}/{order_detail_id}', 'ProductController@reviewProduct')->middleware('checkAuth');

//Contact
Route::get('/contact-us', 'ContactController@index');
Route::post('/send-contact', 'ContactController@store');

//Favorite
Route::get('/add-to-favorite/{id}', 'UserFavoriteController@store')->middleware('checkAuth');
Route::get('/list-my-favorite-product', 'UserFavoriteController@index')->middleware('checkAuth');
//Brand

//Category

//ADMIN
Route::get('/admin', 'HomeController@indexAdmin')->middleware('checkAdmin');

//ADM brand
Route::get('/admin/list-brand', 'BrandController@indexAdmin')->middleware('checkAdmin');
Route::get('/admin/create-brand', 'BrandController@create')->middleware('checkAdmin');
Route::post('/admin/store-brand', 'BrandController@store')->middleware('checkAdmin');
Route::get('/admin/edit-brand/{id}', 'BrandController@edit')->middleware('checkAdmin');
Route::post('/admin/update-brand/{id}', 'BrandController@update')->middleware('checkAdmin');
Route::post('/admin/delete-brand/{id}', 'BrandController@destroy')->middleware('checkAdmin');

//ADM category
Route::get('/admin/list-category', 'CategoryController@indexAdmin')->middleware('checkAdmin');
Route::get('/admin/create-category', 'CategoryController@create')->middleware('checkAdmin');
Route::post('/admin/store-category', 'CategoryController@store')->middleware('checkAdmin');
Route::get('/admin/edit-category/{id}', 'CategoryController@edit')->middleware('checkAdmin');
Route::post('/admin/update-category/{id}', 'CategoryController@update')->middleware('checkAdmin');
Route::post('/admin/delete-category/{id}', 'CategoryController@destroy')->middleware('checkAdmin');

//ADM Products
Route::get('/admin/list-product', 'ProductController@indexAdmin')->middleware('checkAdmin');
Route::get('/admin/create-product', 'ProductController@create')->middleware('checkAdmin');
Route::post('/admin/store-product', 'ProductController@store')->middleware('checkAdmin');
Route::get('/admin/show-product/{id}', 'ProductController@show')->middleware('checkAdmin');
Route::get('/admin/edit-product/{id}', 'ProductController@edit')->middleware('checkAdmin');
Route::post('/admin/update-product/{id}', 'ProductController@update')->middleware('checkAdmin');
Route::post('/admin/delete-product/{id}', 'ProductController@destroy')->middleware('checkAdmin');

//ADM orders
Route::get('/admin/list-orders', 'OrderController@listOrdersAdmin')->middleware('checkAdmin');
Route::get('/admin/order-detail/{id}', 'OrderController@viewListOrdersDetailAdmin')->middleware('checkAdmin');
Route::post('/admin/update-status-order/{id}', 'OrderController@updateStatusOrder')->middleware('checkAdmin');

//ADM Users
Route::get('/admin/list-users', 'LoginController@getAllUsers')->middleware('checkAdmin');