<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\StoreProject;
use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
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
        //\DB::enableQueryLog();

        $projects = \App\Project::auth()->paginate(15);

       //var_dump(\DB::getQueryLog());exit;

        return view('projects/index', ['projects' => $projects]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $project = new \App\Project;

        return view('projects/submit',['project'=>$project]);
    }

    /**
     * @param StoreProject $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProject $request)
    {
        $data = $request->validated();


        $project = new \App\Project($data);
        $project->save();

        $userRoleProject = new \App\UserRoleProject();
        $userRoleProject->project_id = $project->id;
        $userRoleProject->role_id = \App\Role::ROLE_OWNER;
        $userRoleProject->user_id = Auth::user()->id;
        $userRoleProject->save();


        return redirect()->route('projects.index')->with('status', 'Project created');
    }

    /**
     * @param StoreProject $request
     * @return \Illuminate\Http\RedirectResponse
     */
        public function update(StoreProject $request,Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return redirect()->route('projects.index')->with('status', 'Project created');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        if (is_null($project)) {
            return redirect()->route('projects.index');
        }

        return view('projects/show', ['project' => $project]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = \App\Project::auth()->where('id', '=', $id)->first();

        if (is_null($project)) {
            return redirect()->route('projects.index');
        }

        return view('projects/edit', ['project' => $project]);
    }
}
