<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {
		
    return view('index');
})->name('index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('index');

Route::get('/queries', 'QueriesController@index')->name('queries.index');
Route::match(['get','post'],'/queries/submit', 'QueriesController@submit')->name('queries.submit');

Route::get('/imports', 'ImportsController@index')->name('imports.index');
Route::match(['get','post'],'/imports/submit', 'ImportsController@submit')->name('imports.submit');