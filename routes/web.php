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

Route::get('/dashboard', 'UsersController@dashboard')->name('users.dashboard');
Route::get('/edit', 'UsersController@edit')->name('users.edit');

Route::resource('queries', 'QueriesController');
Route::resource('imports', 'ImportsController');
Route::resource('projects', 'ProjectsController');
Route::resource('roles', 'RolesController');

Route::match('get', '/testSplitImport', function () {
    $job = new \App\Jobs\SplitImport(6);
    $job->handle();
});

Route::match('get', '/testStoreQueriesImport', function () {
    $job = new \App\Jobs\StoreQueriesImport(6);
    $job->handle();
});

Route::match('get', '/testStoreDetailsImport', function () {
    $job = new \App\Jobs\StoreDetailsImport(4);
    $job->handle();
});
