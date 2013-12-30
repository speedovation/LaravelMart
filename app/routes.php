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

//Route::any("product/index", [
//    "as" => "product/index",
//    "uses" => "ProductController@indexAction"
//]);
//
//Route::any("product/product/", [
//    "as" => "product/index",
//    "uses" => "ProductController@indexAction"
//]);

Route::any("account/authenticate", [
    "as" => "account/authenticate",
    "uses" => "AccountController@authenticateAction"
]);

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


Route::controller('users', 'UsersController');
Route::controller('products', 'ProductsController');

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