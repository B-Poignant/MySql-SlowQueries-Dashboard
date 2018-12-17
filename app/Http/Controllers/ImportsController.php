<?php

namespace App\Http\Controllers;

use App\Jobs\SplitImport;
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
		
		return view('imports/submit',['import'=>$import]);
    }

    public function post(StoreImport $request)
    {
        $data = $request->validated();

        $import = new \App\Import($data);
        $import->user_id = Auth::user()->id;
        $import->save();

        $request->file('log')->storeAs('imports/pending/'.Auth::user()->id,$import->id.'.sql.log');

        SplitImport::dispatch($import->id);

        return redirect()->route('imports.index')->with('status', 'Import created');
    }
	
}
