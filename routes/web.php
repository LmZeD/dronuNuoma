<?php

Route::get('/',[
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Auth::routes();

Route::group(['prefix' => 'customer'],function () {
    Route::get('/register', [
        'uses' => 'CustomerRegisterController@showRegisterForm',
        'as' => 'customer.register'
    ]);
    Route::post('/register', [
        'uses' => 'CustomerRegisterController@register',
        'as' => 'customer.register'
    ]);

    Route::get('/login', [
        'uses' => 'Auth\CustomerLoginController@showLoginForm',
        'as' => 'customer.login'
    ]);

    Route::post('/login', [
        'uses' => 'Auth\CustomerLoginController@login',
        'as' => 'customer.login.submit'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@logout',
        'as' => 'customer.logout'
    ]);

    Route::get('/profile', [
        'uses' => 'VartotojasController@getCustomerProfile',
        'as' => 'customer.getProfile'
    ]);
    Route::get('/addProduct', [
        'uses' => 'NuomaController@getAddProductForm',
        'as' => 'customer.getAddProductForm'
    ]);
    Route::post('/addProduct', [
        'uses' => 'NuomaController@postAddProductForm',
        'as' => 'customer.getAddProductForm.submit'
    ]);

    Route::get('/getCustomerProducts', [
        'uses' => 'NuomaController@getCustomerProducts',
        'as' => 'customer.getCustomerProducts'
    ]);
});

Route::group(['prefix' => 'shop'],function () {
    Route::get('/index', [
        'uses' => 'NuomaController@getShopIndex',
        'as' => 'shop.index'
        ]);
});

Route::group(['prefix' => 'admin'],function () {
    Route::get('/index', [
        'uses' => 'VartotojasController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('/addShopAddress', [
        'uses' => 'VartotojasController@getAddShopForm',
        'as' => 'admin.getAddShopForm'
    ]);

    Route::post('/addShopAddress', [
        'uses' => 'VartotojasController@postAddShopForm',
        'as' => 'admin.getAddShopForm.submit'
    ]);
});


Route::get('/home', 'HomeController@index')->name('home');

