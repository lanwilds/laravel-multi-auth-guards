<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/customer', 'Auth\LoginController@showCustomerLoginForm')->name('login.customer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm')->name('register.customer');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/customer', 'Auth\LoginController@customerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/customer', 'Auth\RegisterController@createCustomer')->name('register.customer');


Route::group(['middleware' => 'auth:admin'], function () {
	Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:customer'], function () {
	Route::view('/customer', 'customer');
});
