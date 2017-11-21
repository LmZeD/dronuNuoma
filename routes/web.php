<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/', 'Controller@index')->name('home');

Route::get('/register',[
    'uses' => 'CustomerRegisterController@showRegisterForm',
    'as' => 'customer.register'
]);
Route::post('/register',[
    'uses' => 'CustomerRegisterController@register',
    'as' => 'customer.register'
]);

Route::get('/login',[
    'uses' => 'CustomerLoginController@showLoginForm',
    'as' => 'customer.login'
]);

Route::post('/login',[
    'uses' => 'CustomerLoginController@login',
    'as' => 'customer.login'
]);

Route::get('/logout',[
    'uses' => 'CustomerController@logout',
    'as' => 'customer.logout'
]);
