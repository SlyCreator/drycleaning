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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){

            /**Auth namespace*/
    Route::namespace('Auth')->group(function (){
            Route::post('/register','AuthController@register');
            Route::post('/login','AuthController@login');
    });

    Route::middleware('auth:api')->group(function (){
            Route::namespace('User')->group(function (){
                Route::prefix('booking')->group(function (){
                    Route::get('/','LaundryController@index');
                    Route::post('/','LaundryController@create');
                    Route::group(['prefix'=>'{booking}'],function (){
                        Route::get('/','LaundryController@show');
                        Route::post('/','LaundryController@update');
                        Route::delete('/','LaundryController@delete');
                    });
                });
            });
            /** Admin functionality*/
            Route::group(['namespace' => 'Admin'],function() {
                Route::prefix('service')->group(function (){
                    Route::get('/','ServiceController@index');
                    Route::post('/','ServiceController@create');
                    Route::prefix('{serviceId}')->group(function (){
                        Route::get('/','ServiceController@show');
                        Route::post('/','ServiceController@update');
                        Route::delete('/','ServiceController@delete');
                    });
                });
                Route::prefix('invoice')->group(function (){
                    Route::get('/','InvoiceController@index');
                    Route::post('/','InvoiceController@create');
                    Route::prefix('{invoiceId}')->group(function (){
                        Route::get('/','InvoiceController@show');
                        Route::post('/','InvoiceController@update');
                        Route::delete('/','InvoiceController@delete');
                    });
                });
            });
    });
});
