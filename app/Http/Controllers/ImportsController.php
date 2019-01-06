<?php

namespace App\Http\Controllers;

use App\Import;
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

        $this->authorizeResource(Import::class);

        //exec('php artisan view:clear');
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
    public function create(Request $request)
    {

        $import = new \App\Import;

        $projects = \App\Project::auth()->pluck('name','id');

        if(count($projects)==0){
            return redirect()->route('projects.index')->with('status', 'You must create project first');
        }else{
            return view('imports/submit',['import'=>$import,'projects'=>$projects]);
        }
    }

    /**
     * @param StoreImport $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreImport $request)
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
    public function show(Import $import)
    {

        return view('imports/view', ['import' => $import]);
    }

}
