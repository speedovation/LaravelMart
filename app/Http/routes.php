<?php

//App::bind("Formativ\Billing\GatewayInterface", "Formativ\Billing\StripeGateway");
//App::bind("Formativ\Billing\DocumentInterface", "Formativ\Billing\PDFDocument");
//App::bind("Formativ\Billing\MessengerInterface", "Formativ\Billing\EmailMessenger");

Route::any("/", [
    "as" => "index",
    "uses" => "IndexController@indexAction"
]);

Route::any("category/index", [
    "as" => "category.index",
    "uses" => "CategoryController@indexAction"
]);



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
    "as" => "order.index",
    "uses" => "OrderController@indexAction"
]);

Route::any("order/add", [
    "as" => "order.add",
    "uses" => "OrderController@addAction"
]);

Route::any("order/delete", [
    "as" => "order.delete",
    "uses" => "OrderController@deleteAction"
]);

Route::get('/login', 'UsersController@getLogin');

Route::controller('users', 'UsersController');
Route::controller('products', 'ProductsController');
Route::controller('cart', 'CartController');
Route::controller('about', 'AboutController');

Route::resource('wishlist', 'WishlistController');


Route::resource('billings', 'BillingController');

Route::get('billings/{id}/delete', [
    'as' => 'billings.delete',
    'uses' => 'BillingController@destroy',
]);



Route::group( ['namespace' => 'Backend', "prefix" => "admin", "as" => "admin."], function(){

//Route::resource('admin', 'AdminController');

    Route::get('', [
        'as' => 'dashboard',
        'uses' => 'AdminController@dashboard',
    ]);
    
    Route::get('{item}', [
        'as' => 'index',
        'uses' => 'AdminController@index',
    ]);
    
    
    Route::get('{item}/create', [
        'as' => 'create',
        'uses' => 'AdminController@create',
    ]);
    
    Route::post('{item}/store', [
        'as' => 'store',
        'uses' => 'AdminController@store',
    ]);
    
    
    Route::get('{item}/edit/{id}', [
        'as' => 'edit',
        'uses' => 'AdminController@edit',
    ]);
    
    Route::patch('{item}/update/{id}', [
        'as' => 'update',
        'uses' => 'AdminController@update',
    ]);
    
    
    Route::get('admin/{item}/delete/{id}', [
        'as' => 'delete',
        'uses' => 'AdminController@destroy',
    ]);
    
    

} );


Route::group( ['namespace' => 'Backend', "prefix" => "list" , "as" => "list."], function(){

    Route::get('{type}/{field}', 'ListController@index');
    
});

/*
DB::listen(
    function ($sql, $bindings, $time) {
        echo $sql;
        print_r($bindings);
        //  $sql - select * from `ncv_users` where `ncv_users`.`id` = ? limit 1
        //  $bindings - [5]
        //  $time(in milliseconds) - 0.38 
    }
); */


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

//Route::get('category/list', 'CategoryController@getListAction');
/*Route::get('page/list', 'PageController@getList');*/


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


/*
Route::group( ['namespace' => 'Backend', 'prefix' => 'admin'], function(){

Route::resource('products', 'ProductController');

Route::get('products/{id}/delete', [
    'as' => 'admin.products.delete',
    'uses' => 'ProductController@destroy',
]);

} );*/



