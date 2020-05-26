<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\LaundryController;

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
            Route::post('/login',[AuthController::class,'login']);
    //});

    Route::middleware('auth:api')->group(function (){
            Route::namespace('User')->group(function (){
                Route::prefix('booking')->group(function (){
                    Route::get('/',[LaundryController::class,'index']);
                    Route::post('/',[LaundryController::class,'create']);
                    Route::group(['prefix'=>'{booking}'],function (){
                        Route::get('/',[LaundryController::class,'show']);
                        Route::post('/',[LaundryController::class,'update']);
                        Route::delete('/',[LaundryController::class,'destroy']);
                    });
                });
            });
            /** Admin functionality*/
                Route::group(['prefix'=>'service'],function (){
                    Route::get('/',[ServiceController::class,'index'])->withoutMiddleware('auth:api');
                    Route::post('/',[ServiceController::class,'create']);
                    Route::prefix('{serviceId}')->group(function (){
                        Route::get('/',[ServiceController::class,'show'])->withoutMiddleware('auth:api');
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
