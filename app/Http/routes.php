<?php

//App::bind("Formativ\Billing\GatewayInterface", "Formativ\Billing\StripeGateway");
//App::bind("Formativ\Billing\DocumentInterface", "Formativ\Billing\PDFDocument");
//App::bind("Formativ\Billing\MessengerInterface", "Formativ\Billing\EmailMessenger");

Route::any("/", [
    "as" => "index/index",
    "uses" => "IndexController@indexAction"
]);

Route::any("category/index", [
    "as" => "category/index",
    "uses" => "CategoryController@indexAction"
]);

Route::get('category/list', 'CategoryController@getListAction');

//Route::any("product/index", [
//    "as" => "product/index",
//    "uses" => "ProductController@indexAction"
//]);
//
//Route::any("product/product/", [
//    "as" => "product/index",
//    "uses" => "ProductController@indexAction"
//]);

/*Route::any("user/authenticate", [
    "as" => "user/authenticate",
    "uses" => "AccountController@authenticateAction"
]);*/

Route::get('page/{url}', 'PageController@getIndex');

//Authentication
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



Route::any("order/index", [
    "as" => "order/index",
    "uses" => "OrderController@indexAction"
]);

Route::any("order/add", [
    "as" => "order/add",
    "uses" => "OrderController@addAction"
]);

Route::any("order/delete", [
    "as" => "order/delete",
    "uses" => "OrderController@deleteAction"
]);

Route::get('/login', 'UsersController@getLogin');

Route::controller('users', 'UsersController');
Route::controller('products', 'ProductsController');
Route::controller('cart', 'CartController');
Route::controller('about', 'AboutController');

Route::resource('wishlist', 'WishlistController');

//Route::group(["before" => "guest"], function()
//{
//    Route::any("/", [
//        "as"   => "user/login",
//        "uses" => "UserController@loginAction"
//    ]);
//
//    Route::any("/request", [
//        "as"   => "user/request",
//        "uses" => "UserController@requestAction"
//    ]);
//
//    Route::any("/reset", [
//        "as"   => "user/reset",
//        "uses" => "UserController@resetAction"
//    ]);
//});
//
//Route::group(["before" => "auth"], function()
//{
//    Route::any("/profile", [
//        "as"   => "user/profile",
//        "uses" => "UserController@profileAction"
//    ]);
//
//    Route::any("/logout", [
//        "as"   => "user/logout",
//        "uses" => "UserController@logoutAction"
//    ]);
//});



Route::resource('billings', 'BillingController');

Route::get('billings/{id}/delete', [
    'as' => 'billings.delete',
    'uses' => 'BillingController@destroy',
]);

/*
Route::group( ['namespace' => 'Backend', 'prefix' => 'admin'], function(){

Route::resource('products', 'ProductController');

Route::get('products/{id}/delete', [
    'as' => 'admin.products.delete',
    'uses' => 'ProductController@destroy',
]);

} );*/

Route::group( ['namespace' => 'Backend'], function(){

//Route::resource('admin', 'AdminController');

    Route::get('admin', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard',
    ]);
    
    Route::get('admin/{item}', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index',
    ]);
    
    
    Route::get('admin/{item}/create', [
        'as' => 'admin.create',
        'uses' => 'AdminController@create',
    ]);
    
    Route::post('admin/{item}/store', [
        'as' => 'admin.store',
        'uses' => 'AdminController@store',
    ]);
    
    
    Route::get('admin/{item}/edit/{id}', [
        'as' => 'admin.edit',
        'uses' => 'AdminController@edit',
    ]);
    
    Route::patch('admin/{item}/update/{id}', [
        'as' => 'admin.update',
        'uses' => 'AdminController@update',
    ]);
    
    
    
    Route::get('admin/{item}/delete/{id}', [
        'as' => 'admin.delete',
        'uses' => 'AdminController@destroy',
    ]);
    
    

} );
