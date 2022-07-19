@extends('layouts.app')

@section('title-page','Assign Task')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add New Task</h4>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-body">
                <form action="{{ route('data_task.update', $tasks->id) }}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="project_id">Project</label>
                            <select name="project_id" class="form-control">
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    @if ($project->id === $task->project_id)
                                    selected
                                    @endif
                                    >
                                    {{ $project->project_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_id">Assigned to</label>
                            <select name="user_id" class="form-control">
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    @if ($employee->id === $task->project_id)
                                    selected
                                    @endif>
                                    {{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heading">Task Title </label>
                        <input type="text" class="form-control" name="heading" value="{{ $task->heading }}" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10"> {{ $task->description }} </textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md 6">
                            <label class="d-block" for="priority">Priority</label>
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" value="low"
                                    @if ($task->priority == 'low')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="low">
                                      Low
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" value="medium"
                                    @if ($task->priority == 'medium')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="priority">
                                      Medium
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" value="high"
                                    @if ($task->priority == 'high')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="priority">
                                      high
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="incomplete"{{ $task->status == "incomplete" ? 'selected' : '' }}>incomplete</option>
                                <option value="completed"{{ $task->status == "completed" ? 'selected' : '' }} >completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
