<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ServiceController;

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

Route::prefix('v1')->group(function(){

            /**Auth namespace*/
    //Route::group(['namespace'=>'Auth'],function (){
            Route::post('/register',[AuthController::class,'register']);
            Route::post('/login','AuthController@login');
    //});

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
           // Route::group(['namespace' => 'Admin'],function() {
                Route::group(['prefix'=>'service'],function (){
                    Route::get('/',[ServiceController::class,'index']);
                    Route::post('/',[ServiceController::class,'create']);
                    Route::prefix('{serviceId}')->group(function (){
                        Route::get('/',[ServiceController::class,'show']);
                        Route::post('/',[ServiceController::class,'update']);
                        Route::delete('/',[ServiceController::class,'delete']);
                    });
                });
                Route::group(['prefix'=>'invoice'],function (){
                    Route::get('/','InvoiceController@index');
                    Route::post('/','InvoiceController@create');
                    Route::prefix('{invoiceId}')->group(function (){
                        Route::get('/','InvoiceController@show');
                        Route::post('/','InvoiceController@update');
                        Route::delete('/','InvoiceController@delete');
                    });
                });
           // });
    });
});
