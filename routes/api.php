<?php

use Illuminate\Http\Request;

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
Route::group(['prefix' => '/seller'], function () {
    Route::post('/create', ['uses' => 'Api\SellerController@create']);
    Route::get('/all', ['uses' => 'Api\SellerController@listAll']);
    Route::get('/{id}', ['uses' => 'Api\SellerController@list']);
});

Route::group(['prefix' => '/sale'], function () {
    Route::post('/create', ['uses' => 'Api\SaleController@create']);
});