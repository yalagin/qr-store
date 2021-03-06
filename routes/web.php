<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//laravel
Route::get('/', function () {
    return view('welcome');
})->name('index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');


// metronic
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


//lang
Route::get('lang/{locale}', 'LocalizationController@index');
//admin
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'PagesController@index');
    Route::resource('categories', 'categoriesController');
    Route::resource('images', 'imageController');
    Route::resource('products', 'ProductsController');
    Route::resource('options', 'OptionsController');
    Route::resource('vats', 'VatController');
    Route::resource('currencies', 'CurrencyController');
    Route::resource('dateTimes', 'DateTimeController');
});
