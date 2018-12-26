<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessImport;
use App\Jobs\SplitImport;
use App\Jobs\StoreQueriesImport;
use App\Jobs\StoreDetailsImport;
use App\Jobs\CompleteImport;
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

        exec('php /full/path/to/artisan view:clear');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imports = \App\Import::auth()->paginate(15);

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

        $projects = \App\Project::auth()->pluck('name','id');

        return view('imports/submit',['import'=>$import,'projects'=>$projects]);
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
            new SplitImport($import->id),
            new StoreQueriesImport($import->id),
            new StoreDetailsImport($import->id),
            new CompleteImport($import->id),
        ])->dispatch($import->id);

        //SplitImport::dispatch($import->id);

        return redirect()->route('imports.index')->with('status', 'Import created');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $import = \App\Import::auth()->where('id', '=', $id)->first();

        if (is_null($import)) {
            return redirect()->route('imports.index');
        }

        return view('imports/view', ['import' => $import]);
    }

}
