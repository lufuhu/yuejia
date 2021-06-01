<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::get('test', 'IndexController@test')->name('index.test');

    Route::prefix('auth')->group(function () {
        Route::post('wx_login', 'AuthController@wxLogin')->name('auth.wxLogin');
        Route::post('test_login', 'AuthController@testLogin')->name('auth.testLogin');


        Route::middleware('auth:sanctum')->group(function () {
            Route::post('bind_phone', 'AuthController@bindPhone')->name('auth.bindPhone');
            Route::post('bind_mail', 'AuthController@bindMail')->name('auth.bindMail');
            Route::post('loginout', 'AuthController@loginOut')->name('auth.loginOut');
            Route::get('user_identity', 'UserIdentityController@index')->name('user_identity.index');
            Route::post('user_identity', 'UserIdentityController@store')->name('user_identity.store');
            Route::post('user_identity/{id}', 'UserIdentityController@update')->name('user_identity.update');
            Route::post('upload', 'IndexController@upload')->name('index.update');
        });

        Route::post('phone_code', 'AuthController@phoneCode')->name('auth.phoneCode');
        Route::post('mail_code', 'AuthController@mailCode')->name('auth.mailCode');
    });

    Route::prefix('index')->group(function () {
        Route::post('upload', 'IndexController@upload')->name('index.update');
    });

    Route::middleware('auth:sanctum')->prefix('order')->group(function () {
        Route::get('statistics', 'OrderController@statistics')->name('order.statistics');
        Route::get('get_select_data', 'OrderController@getSelectData')->name('order.getSelectData');

        Route::get('order', 'OrderController@index')->name('order.index');
        Route::post('order', 'OrderController@store')->name('order.store');
        Route::post('order/{id}', 'OrderController@update')->name('order.update');
        Route::delete('order/{id}', 'OrderController@destroy')->name('order.destroy');

        Route::get('sample', 'SampleController@index')->name('sample.index');
        Route::post('sample', 'SampleController@store')->name('sample.store');
        Route::patch('sample/{id}', 'SampleController@update')->name('sample.update');
        Route::delete('sample/{id}', 'SampleController@destroy')->name('sample.destroy');
    });


    Route::middleware('auth:sanctum')->prefix('product')->group(function () {
        Route::get('product', 'ProductController@index')->name('product.index');
        Route::get('product/{id}', 'ProductController@view')->name('product.view');
        Route::post('product', 'ProductController@store')->name('product.store');
        Route::patch('product/{id}', 'ProductController@update')->name('product.update');
        Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');

        Route::get('product_store', 'ProductsStoreController@index')->name('product.index');
        Route::post('product_store', 'ProductsStoreController@store')->name('product.store');
    });

    Route::middleware('auth:sanctum')->prefix('clientele')->group(function () {
        Route::get('get_select_data', 'ClienteleController@getSelectData')->name('clientele.getSelectData');
        Route::get('clientele', 'ClienteleController@index')->name('clientele.index');
        Route::get('clientele/{id}', 'ClienteleController@view')->name('clientele.view');
        Route::post('clientele', 'ClienteleController@store')->name('clientele.store');
        Route::patch('clientele/{id}', 'ClienteleController@update')->name('clientele.update');
        Route::delete('clientele/{id}', 'ClienteleController@destroy')->name('clientele.destroy');
    });
});
