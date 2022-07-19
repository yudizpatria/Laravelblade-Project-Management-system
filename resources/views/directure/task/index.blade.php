@extends('layouts.app')

@section('title-page','Data Task')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Task list</h4>
        <div class="card-header-action">
            <a href="{{route('data_task.create')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Assign task </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Project</th>
                        <th>Assigned to</th>
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
                            <img src=" {{ Storage::url($task->employee->image) }} "
                            alt=" " width="30" class="rounded-circle mr-1"> {{ $task->employee->name }} </td>
                        <td>
                        @if ($task->status == 'incomplete')
                        <div class="badge badge-danger"> InComplete </div>
                        @elseif($task->status == 'completed')
                        <div class="badge badge-success"> Completed </div>
                        @endif </td>

                        <td>
                            <a href=" {{ route('data_task.edit',$task->id) }} " class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"><i
                                    class="fas fa-pencil-alt"></i></a>
                                <form action=" {{ route('data_task.destroy',$task->id) }} " method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger btn-action" data-toggle="tooltip" tool title="Delete" >
                                    <i class="fas fa-trash"></i>
                                </button>
                                </form>
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
