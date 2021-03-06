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

Route::prefix('v1')->group(function () {
    Route::resource('categories', 'API\categoriesAPIController');
    Route::resource('images', 'API\imageAPIController');
    Route::resource('products', 'API\ProductsAPIController');
    Route::resource('options', 'OptionsAPIController');
    Route::resource('vats', 'VatAPIController');
    Route::resource('currencies', 'CurrencyAPIController');
    Route::resource('date-times', 'DateTimeAPIController');
});
