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

Route::get('/queries/index/{import_id?}', 'QueriesController@index')->name('queries.index');
Route::match('get', '/queries/view/{id}', 'QueriesController@view')->name('queries.view');
Route::match('get','/queries/submit', 'QueriesController@submit')->name('queries.submit');
Route::match('post','/queries/submit/{id?}', 'QueriesController@post')->name('queries.post');

Route::get('/imports/index', 'ImportsController@index')->name('imports.index');
Route::match('get', '/imports/view/{id}', 'ImportsController@view')->name('imports.view');
Route::match('get','/imports/submit', 'ImportsController@submit')->name('imports.submit');
Route::match('post','/imports/submit/{id?}', 'ImportsController@post')->name('imports.post');

Route::get('/projects/index/', 'ProjectsController@index')->name('projects.index');
Route::match('get', '/projects/view/{id}', 'ProjectsController@view')->name('projects.view');
Route::match('get','/projects/submit', 'ProjectsController@submit')->name('projects.submit');
Route::match('get','/projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit');
Route::match('post','/projects/submit/{id?}', 'ProjectsController@post')->name('projects.post');

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
