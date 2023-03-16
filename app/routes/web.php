<?php
use App\Router;

Router::get('/','App\Controllers\HomeController@index');
Router::get('/home', 'App\Controllers\HomeController@index');
Router::post('/search', 'App\Controllers\HomeController@search');

Router::get('/product', 'App\Controllers\ProductController@product');
Router::get('/productDetail', 'App\Controllers\ProductController@productDetail');

Router::get('/deleteCart', 'App\Controllers\CartController@deleteCart');
Router::get('/addCart', 'App\Controllers\CartController@addCart');
Router::post('/addCart', 'App\Controllers\CartController@addCart');
Router::get('/cart', 'App\Controllers\CartController@cart');
Router::get('/bill', 'App\Controllers\CartController@Bill');
Router::get('/userBillDetail', 'App\Controllers\CartController@BillDetail');
Router::post('/userFillBill', 'App\Controllers\CartController@FillBill');

Router::post('/pay', 'App\Controllers\CartController@pay');

Router::get('/register', 'App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('/register', 'App\Controllers\Auth\RegisterController@register');
Router::get('/logout', 'App\Controllers\Auth\LoginController@logout');
Router::get('/login', 'App\Controllers\Auth\LoginController@showLoginForm');
Router::post('/login', 'App\Controllers\Auth\LoginController@login');


Router::get('/admin', 'App\Controllers\AdminController@index');
Router::get('/adminBill', 'App\Controllers\AdminController@Bill');
Router::get('/adminBillDetail', 'App\Controllers\AdminController@BillDetail');
Router::get('/adminDashboard', 'App\Controllers\AdminController@index');
Router::get('/adminProduct', 'App\Controllers\AdminController@Product');
Router::post('/adminUpdate', 'App\Controllers\AdminController@Product');
Router::get('/adminDelete', 'App\Controllers\AdminController@DeleteProduct');
Router::post('/adminInsert', 'App\Controllers\AdminController@Insert');
Router::get('/adminUser', 'App\Controllers\AdminController@User');
Router::get('/adminBillCancle', 'App\Controllers\AdminController@BillCancle');
Router::post('/adminFillProduct', 'App\Controllers\AdminController@FillProduct');
Router::post('/adminFillBill', 'App\Controllers\AdminController@FillBill');
Router::post('/adminDeleteUser', 'App\Controllers\AdminController@DeleteUser');

Router::error('App\Controllers\HomeController@error');
?>