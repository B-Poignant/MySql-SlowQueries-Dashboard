<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessImport;
use App\Jobs\SplitImport;
use App\Jobs\StoreQueriesImport;
use App\Http\Requests\StoreImport;
use Auth;
use Illuminate\Http\Request;

class ImportsController extends Controller
{
    /**
     * Create a new controller instance.
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

    /**
     * @param StoreImport $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(StoreImport $request)
    {
        $data = $request->validated();

        $import = new \App\Import($data);
        $import->user_id = Auth::user()->id;
        $import->save();

        $request->file('log')->storeAs('imports/pending/'.Auth::user()->id,$import->id.'.sql.log');

        ProcessImport::withChain([
            new SplitImport,
            new StoreQueriesImport
        ])->dispatch($import->id);

        //SplitImport::dispatch($import->id);

        return redirect()->route('imports.index')->with('status', 'Import created');
    }

}
