<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuery;
use App\Query;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;


class QueriesController extends Controller
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
    public function index($import_id=null)
    {
        if($import_id){
            $queries = \App\Query::auth()->where('import_id', '=', $import_id)->paginate(20);
	    }else{
            $queries = \App\Query::auth()->paginate(20);
	    }
	    
        return view('queries/index', ['queries' => $queries]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = new \App\Query;

        return view('queries/create',['query'=>$query]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuery $request)
    {
        $data = $request->validated();

        $query = new \App\Query($data);
        $query->user_id = Auth::user()->id;

        $query->save();

        return redirect()->route('queries.index')->with('status', 'Query created');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        if (is_null($query)) {
            return redirect()->route('queries.index');
        }

        return view('queries/show', ['query' => $query]);
    }

    public function destroy(Query $query)
    {
        //
    }

    public function edit(Query $query)
    {
        return view('queries/edit',['query'=>$query]);
    }

    public function update(StoreQuery $request, Query $query)
    {
        $data = $request->validated();
        $query->save();

        return redirect()->route('queries.show',$query)->with('status', 'Query updated');
    }
}
