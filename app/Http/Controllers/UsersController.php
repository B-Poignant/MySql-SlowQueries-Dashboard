<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuery;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
    public function dashboard()
    {
        return view('users/dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('users/edit',['user'=>$user]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(StoreQuery $request)
    {
        $data = $request->validated();
var_dump($data);exit;
        $query = new \App\Query($data);
        $query->user_id = Auth::user()->id;

        $query->save();

        return redirect()->route('users.index')->with('status', 'User updated');
    }
}
