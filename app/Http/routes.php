<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function(){

    Route::get('/', [
        'uses' => 'ProductController@getIndex',
        'as' => 'product.index',
    ]);

    Route::get('/chekout', [
        'uses' => 'ProductController@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth',
    ]);

    Route::post('/chekout', [
        'uses' => 'ProductController@postCheckout',
        'as' => 'postCheckout',
        'middleware' => 'auth',
    ]);

    Route::get('/shopping-cart', [
        'uses' => 'ProductController@getCart',
        'as' => 'product.shoppingCart',
    ]);

    Route::get('/add-to-cart/{id}', [
        'uses' => 'ProductController@getAddToCart',
        'as' => 'product.addToCart',
    ]);

    Route::get('/reduce/{id}', [
        'uses' =>  'ProductController@getReduceByOne',
        'as' => 'product.reduceByOne',
    ]);

    Route::get('/remove/{id}', [
        'uses' =>  'ProductController@getRemoveItem',
        'as' => 'product.removeItem',
    ]);

    Route::group(['prefix' => '/user'], function () {//short hand for '/user/signup'...

        Route::group(['middleware' => ['guest']], function () {

            Route::get('/signin', [
                'uses' => 'UserController@getSignin',
                'as' => 'user.signin',
            ]);

            Route::post('/signin', [
                'uses' => 'UserController@postSignin',
                'as' => 'user.signin',
            ]);

            Route::get('/signup', [
                'uses' => 'UserController@getSignup',
                'as' => 'user.signup',
            ]);

            Route::post('/signup', [
                'uses' => 'UserController@postSignup',
                'as' => 'user.signup',
            ]);
        });

        Route::group(['middleware' => ['auth']], function () {

            Route::get('/profile', [
                'uses' => 'UserController@getProfile',
                'as' => 'user.profile',
            ]);

            Route::get('/logout', [
                'uses' => 'UserController@getLogout',
                'as' => 'user.logout',
            ]);
        });
    });

});
