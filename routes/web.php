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
	$queries = \App\Query::all();
 
    return view('welcome', ['queries' => $queries]);
})->name('queries.index');

Route::get('/submit', function () {
	
	$query = new \App\Query;
	
    return view('submit',['query'=>$query]);
})->name('queries.submit.get');

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'query' => 'required|max:255',
    ]);

	$query = new \App\Query;
	$query->query = $data['query'];

    $query->save();

    return redirect('/');
})->name('queries.submit.post');

Route::get('/import', function () {
		
    return view('import');
})->name('queries.import.get');

Route::post('/import', function (Request $request) {
	$import = new \App\Import;
	
    $path = $request->file('log')->store('imports');
	$import->path = $path;
	$import->size = Storage::size($path);

	
	$import->save();
	
    return redirect('/');
})->name('queries.import.post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
