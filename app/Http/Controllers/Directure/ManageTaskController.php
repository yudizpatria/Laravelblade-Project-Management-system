<?php

namespace App\Http\Controllers\Directure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Directure\Task\StoreTask;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class ManageTaskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->tasks = Task::with('project', 'employee')->orderBy('id', 'DESC')->get();
    return view('directure.task.index', $this->data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->projects = Project::where('status', 'in progress')->get();
    $this->employees = User::has('employee')->get();;
    return view('directure.task.create', $this->data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreTask $request)
  {
    $task = new Task();
    $task->heading = $request->heading;
    if ($request->description != '') {
      $task->description = $request->description;
    }
    $task->user_id = $request->user_id;
    $task->project_id = $request->project_id;
    $task->priority = $request->priority;
    $task->save();
    return redirect()->route('data_task.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $this->task = Task::findOrFail($id);
    $this->projects = Project::all();
    $this->employees = User::Role('employee')->get();
    return view('directure.task.edit', $this->data);
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
    $task = Task::findOrFail($id);
    $task->heading = $request->heading;
    if ($request->description != '') {
      $task->description = $request->description;
    }
    $task->user_id = $request->user_id;
    $task->project_id = $task->project_id;
    $task->priority = $request->priority;
    $task->status = $request->status;
    $task->update();
    return redirect()->route('data_task.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $task = Task::findOrFail($id);
    $task->delete();
  }
}
