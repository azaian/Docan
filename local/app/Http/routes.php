<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

////////////////////////////////////////// Admin Route ///////////////////////////////////////////////////


Route::group(['middleware' => ['web']], function () {


    Route::controller('admin', 'admin\AdminController');
    Route::group(['middleware' => ['admins']], function () {

        Route::controller('ads', 'admin\AdsController');
        Route::controller('attributes', 'admin\AttributeController');
        Route::controller('partner', 'admin\PartnerController');
        Route::controller('delivery', 'admin\DeliveryController');
        Route::controller('adminsouq', 'admin\SouqController');
        Route::controller('products', 'admin\ProductController');
        Route::controller('orders', 'admin\OrderController');
        Route::controller('reports', 'admin\ReportsController');
        Route::resource('admin', 'admin\DashboardController');
        Route::controller('settings', 'admin\SettingController');
        Route::post('editGeneralSettings', 'admin\SettingController@editGeneralSettings')->name('editGeneralSettings');
        Route::controller('categories', 'admin\CategoriesController');
        Route::controller('customers', 'admin\CustomerController');
        Route::controller('dakaken', 'admin\DakakenController');
        Route::controller('adminmessages', 'admin\ContactController');
        Route::get('emails', 'admin\AnyController@emails');
        Route::get('deleteemail', 'admin\AnyController@deleteemail');


    });
});


//////////////////////////////////////////
///////////////////////Front Route ////////
///////////////////////////////////////////

Route::group(['middleware' => ['web']], function () {


    Route::get('/', 'front\HomeController@index');
    
    //routes for rest password

    Route::get('/resetpassword', 'front\HomeController@restpassword');
    Route::post('/resetpassword', 'front\HomeController@prestpassword');
    Route::get('/newpassword/{id}/{password}', 'front\HomeController@newpassword');
    Route::post('/newpassword', 'front\HomeController@pnewpassword');
    
//        Route::get('/alldocans', 'front\HomeController@alldocan'); old docans route
//    new docans route 
    Route::controller('/alldocans', 'front\HomeController');

    Route::get('/contact', 'front\HomeController@contact');
    Route::post('/contactus', 'front\HomeController@contactus');
    Route::get('part/{id}', 'front\HomeController@showpart');
    Route::get('share/{email}', 'front\HomeController@share');

    Route::get('/get-store-logo', [
        'uses' => 'front/OperationController@getStoreLogo',
        'as' => 'get.store.logo'
    ]);

    Route::resource('category', 'front\CategoriesController');
    Route::resource('shop', 'front\ShopsController');
    Route::controller('souq', 'front\SouqController');
    Route::resource('product', 'front\ProductsController');

    Route::get('register', 'front\UserController@getRegister');
    Route::get('login', 'front\UserController@getLogin');
    Route::post('login', 'front\UserController@postLogin');
    Route::post('register', 'front\UserController@postRegister');
    Route::get('subcat_souq/{id}', 'front\OperationController@subcat_souq');
    Route::get('test_souq/{id}', 'front\UserController@test_souq');

    Route::group(['middleware' => ['auth']], function () {

        Route::controller('profile', 'front\ProfileController');
        Route::post('addfollow/{id}', 'front\OperationController@addfollow');
        Route::get('subcat/{id}', 'front\OperationController@subcat');
        Route::get('subcatedit/{id}/{catname}', 'front\OperationController@subcatedit');

        Route::get('getaddfollow/{id}', 'front\OperationController@getaddfollow');
        Route::post('addfav/{id}', 'front\OperationController@addfav');
        Route::get('getaddfav/{id}', 'front\OperationController@getaddfav');
        Route::get('process', 'front\OperationController@process');
        Route::get('payment', 'front\OperationController@payment');
        Route::get('cart/{id}', 'front\ProductsController@cart');
        Route::get('delcart/{id}', 'front\ProductsController@delcart');
        Route::post('payment', 'front\OperationController@adpayment');
        // Route::post('shipping','front\OperationController@shipping');
        Route::get('test/{id}', 'front\UserController@test');

        Route::get('new_docan', 'front\NewController@newdocan');
        Route::post('new_docan', 'front\NewController@storedocan');
        Route::get('new_ad', 'front\NewController@newad');
        Route::post('new_ad', 'front\NewController@storead');
        //Route::get('profile','front\UserController@profile');
        Route::get('logout', 'front\UserController@logout');
        Route::post('updatecart', 'front\ProductsController@updatecart');
    });

});
