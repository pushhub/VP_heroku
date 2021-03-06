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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::apiResource('/user', 'Api\UserController')->middleware('auth:api');
Route::apiResource('/donation', 'Api\DonationController')->middleware('auth:api');

Route::get('/user/{user}/paymentSources', 'Api\UserController@paymentSources')->middleware('auth:api');
Route::post('/user/create-setup-intent', 'Api\UserController@createSetupIntent')->middleware('auth:api');
Route::post('/stripe-web-hook','Api\WebHooksController@stripeWebHook');
