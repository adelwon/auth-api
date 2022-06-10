<?php

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

Route::namespace('API')->group(function () {
    Route::prefix('v1')->group(function(){
        Route::post('auth/register', 'AuthController@register');
        Route::post('auth/login', 'AuthController@login');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('me', 'UserController@me');
            Route::post('auth/logout', 'AuthController@logout');
        });
    });
});
