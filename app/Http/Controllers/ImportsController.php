<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
		$imports = \App\Import::where('user_id', '=', Auth::user()->id)->paginate(15);
	
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
			$data = $request->validate([
				'log' => 'required|max:10000',
			]);

			$path = $request->file('log')->store('imports/'.Auth::user()->id);
			$import->path = $path;
			$import->size = Storage::size($path);
			$import->user_id = Auth::user()->id;
			
			$import->save();
	
			return redirect()->route('imports.index')->with('status', 'Import created');
			
		}
		
		return view('imports/submit',['import'=>$import]);
    }
	
}
