<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$imports = \App\Import::paginate(15);
	
        return view('imports/index', ['imports' => $imports]);
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
		
		$import = new \App\Import;
		
		if ($request->isMethod('post')) {
			var_dump($request->file('log'));exit;
				$data = $request->validate([
					'log' => 'required|max:10000|mimes:text/plain',
				]);
			
				$path = $request->file('log')->store('imports');
				$import->path = $path;
				$import->size = Storage::size($path);

				
				$import->save();
	
	
			return redirect()->route('imports.index')->with('status', 'Import created');
			
		}
		
		return view('imports/submit',['import'=>$import]);
    }
	
}
