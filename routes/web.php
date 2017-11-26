<?php

use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;

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

    Route::get('/getUpdateProductForm/{id}', [
        'uses' => 'NuomaController@getUpdateProductForm',
        'as' => 'customer.getUpdateProductForm'
    ]);

    Route::post('/getUpdateProductForm/{id}', [
        'uses' => 'NuomaController@postUpdateProduct',
        'as' => 'customer.getUpdateProductForm.submit'
    ]);

    Route::get('/deleteProduct/{id}', [
        'uses' => 'NuomaController@getDeleteProduct',
        'as' => 'customer.deleteProduct.submit'
    ]);

    Route::get('/getRentProductForm/{id}', [
        'uses' => 'NuomaController@getRentPage',
        'as' => 'customer.getRentPage'
    ]);

    Route::post('/getRentProductForm/{id}', [//route for test only, original will be in checkout with params
        'uses' => 'NuomaController@sendRentDataToCheckOut',
        'as' => 'customer.getRentPage.submit'
    ]);

    Route::get('/getCreateMessageForm', [
        'uses' => 'VartotojasController@getCreateMessageForm',
        'as' => 'customer.getCreateMessageForm'
    ]);

    Route::post('/getCreateMessageForm', [
        'uses' => 'VartotojasController@postCreateMessageForm',
        'as' => 'customer.getCreateMessageForm.submit'
    ]);

});

Route::get('/logout', [
    'uses' => 'UserController@logout',
    'as' => 'customer.logout'
]);

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

    Route::get('/rentSummary', [
        'uses' => 'NuomaController@getRentSummary',
        'as' => 'admin.getRentSummary'
    ]);

    Route::get('/state/{id}', [
        'uses' => 'NuomaController@getStateByProductStatusId',
        'as' => 'admin.getStateByProductStatusId'
    ]);

    Route::post('/rentSummary', [
        'uses' => 'NuomaController@getRentSummaryDetails',
        'as' => 'admin.getRentSummaryDetails'
    ]);

    Route::get('/sendMailForm', [
        'uses' => 'VartotojasController@getSendMailForm',
        'as' => 'admin.sendMailForm'
    ]);

    Route::post('/sendMailForm', [
        'uses' => 'VartotojasController@postSendMailForm',
        'as' => 'admin.sendMailForm.submit'
    ]);

    Route::get('/createEvent', [
        'uses' => 'VartotojasController@getCreateEventForm',
        'as' => 'admin.createEvent'
    ]);

    Route::post('/createEvent', [
        'uses' => 'VartotojasController@postCreateEventForm',
        'as' => 'admin.createEvent.submit'
    ]);
});

Route::get('/map',[
    'uses' => 'NuomaController@setUpMap',
    'as' => 'map'
]);

Route::get('/events',[
    'uses' => 'VartotojasController@getEvents',
    'as' => 'events'
]);

Route::get('/home', 'HomeController@index')->name('home');

