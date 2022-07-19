<?php

namespace App\Http\Controllers\Directure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Directure\Project\StoreProject;
use App\Models\ClientDetails;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\ProjectCategory;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManageProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->projects = Project::with('client')->orderBy('id', 'DESC')->get();

    $this->totalProject = Project::all()->count();
    $this->projectSuccess = Project::where('status', '=', 'finished')->get()->count();
    $this->projectProgress = Project::where('status', '=', 'in progress')->get()->count();
    $this->projectPending = Project::where('status', '=', 'not started')->get()->count();
    $this->projectCancel = Project::where('status', '=', 'cancelled')->get()->count();

    return view('directure.project.index', $this->data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->clients = User::Role('client')->where('status', '=', 'active')->get();
    $this->categories = ProjectCategory::all();
    return view('directure.project.create', $this->data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProject $request)
  {
    $project = new Project();
    $project->project_name = $request->project_name;
    $project->start_date = Carbon::parse($request->start_date)->format('Y-m-d');
    $project->deadline = Carbon::parse($request->deadline)->format('Y-m-d');
    if ($request->category_id != '') {
      $project->category_id = $request->category_id;
    }
    $project->location = $request->location;
    $project->client_id = $request->client_id;
    $project->project_cost = $request->project_cost;
    $project->status = $request->status;
    $project->save();

    return redirect()->route('data_project.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $this->projects = Project::findorFail($id);
    $this->tasks = Task::where('project_id', '=', $id)->get();
    $this->categories = ProjectCategory::all();
    $this->clients = User::Role('client')->where('status', '=', 'active')->get();

    return view('directure.project.edit', $this->data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $project = Project::findOrFail($id);
    $project->project_name = $request->project_name;
    $project->start_date = Carbon::parse($request->start_date)->format('Y-m-d');
    $project->deadline = Carbon::parse($request->deadline)->format('Y-m-d');
    if ($request->category_id != '') {
      $project->category_id = $request->category_id;
    }
    $project->location = $request->location;
    $project->client_id = $request->client_id;
    $project->project_cost = $request->project_cost;
    $project->status = $request->status;
    $project->update();

    return redirect()->route('data_project.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $project = Project::findOrFail($id);
    $project->forceDelete();

    return redirect()->route('data_project.index');
  }
}
