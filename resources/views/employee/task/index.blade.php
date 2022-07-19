@extends('layouts.app')

@section('title-page','Task')

@section('content')
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Project</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->heading }} </td>
                        <td>{{ $task->project->project_name }} </td>
                      <td>
                        @if ($task->status == 'incomplete')
                        <div class="badge badge-danger"> InComplete </div>
                        @elseif($task->status == 'complete')
                        <div class="badge badge-success"> Complete </div>
                        @endif
                      </td>
                        <td>
                            <a href=" {{ route('task.edit',$task->id) }} " class="btn btn-primary " data-toggle="tooltip" title="Edit">Update</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="text-center">Tasks not Available</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
