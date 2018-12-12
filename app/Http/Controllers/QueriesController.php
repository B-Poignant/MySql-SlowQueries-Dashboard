<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuery;
use Auth;
use Illuminate\Http\Request;

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
		    $queries = \App\Query::where([['user_id', '=', Auth::user()->id],['import_id', '=', $import_id]])->paginate(2);
	    }else{
			$queries = \App\Query::where('user_id', '=', Auth::user()->id)->paginate(2);
	    }
	    
        return view('queries/index', ['queries' => $queries]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit()
    {
        $query = new \App\Query;

        return view('queries/submit',['query'=>$query]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(StoreQuery $request)
    {
        $data = $request->validated();

        $query = new \App\Query($data);
        $query->user_id = Auth::user()->id;

        $query->save();

        return redirect()->route('queries.index')->with('status', 'Query created');
    }
}
