<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('samples', 'SampleController');
    $router->resource('products', 'ProductController');
    $router->resource('products_store', 'ProductsStoreController');
    $router->resource('orders', 'OrderController');
    $router->resource('clienteles', 'ClienteleController');
    $router->resource('users', 'UserController');
    $router->resource('user_identity', 'UserIdentityController');
});
