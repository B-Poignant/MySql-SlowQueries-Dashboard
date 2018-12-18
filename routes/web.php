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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/queries/index/{import_id?}', 'QueriesController@index')->name('queries.index');
Route::match('get','/queries/submit', 'QueriesController@submit')->name('queries.submit');
Route::match('post','/queries/submit', 'QueriesController@post')->name('queries.post');

Route::get('/imports/index', 'ImportsController@index')->name('imports.index');
Route::match('get','/imports/submit', 'ImportsController@submit')->name('imports.submit');
Route::match('post','/imports/submit', 'ImportsController@post')->name('imports.post');

Route::match('get', '/testSplitImport', function () {
    $job = new \App\Jobs\SplitImport(7);
    $job->handle();
});

Route::match('get', '/testStoreQueriesImport', function () {
    $job = new \App\Jobs\StoreQueriesImport(7);
    $job->handle();
});

