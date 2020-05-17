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
            Route::post('/login','AuthController@register');
            Route::post('/register','AuthController@register');
            Route::post('/logout','AuthController@logout');
    });
            /** What action should be able to perform*/
    Route::namespace('User')->group(function (){
            Route::prefix('booking')->group(function (){
                    Route::get('/','BookingController@index');
                    Route::post('/','BookingController@create');
                    Route::group(['prefix'=>'{booking}'],function (){
                            Route::get('/','BookingController@show');
                            Route::put('/','BookingController@update');
                            Route::delete('/','BookingController@delete');
                    });
            });
    });
            /** Admin functionality*/
    Route::group(['namespace' => 'Admin'],function() {
            Route::prefix('services')->group(function (){
                    Route::get('/','ServiceController@index');
                    Route::post('/','ServiceController@create');
                    Route::prefix()->group(function (){
                            Route::get('/','ServiceController@show');
                            Route::put('/','ServiceController@update');
                            Route::delete('/','ServiceController@delete');
                    });
            });
            Route::prefix('invoice')->group(function (){
                    Route::post('/','InvoiceController@create');
                    Route::prefix('Admin')->group(function(){
                            Route::get('/','InvoiceController@index');
                            Route::prefix('{invoiceId}')->group(function (){
                                    Route::get('/','InvoiceController@show');
                                    Route::put('/','InvoiceController@update');
                                    Route::delete('/','InvoiceController@delete');
                            });
                    });
            });
    });
});
