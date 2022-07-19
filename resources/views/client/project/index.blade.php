@extends('layouts.app')

@section('title-page','Project List')

@section('content')

<div class="card">

    <div class="card-body">
            <button class="btn btn-icon icon-left btn-outline-primary"><i class="far fa-edit"></i> Total Projects <span class="badge badge-primary"> {{$totalProject }} </span> </button>
            <button class=" btn btn-icon icon-left btn-outline-success"><i class="fas fa-check"></i> Finished Projects <span class="badge badge-success"> {{ $projectSuccess }} </span> </button>
            <button class="btn btn-icon icon-left btn-outline-info"><i class="fas fa-info-circle"></i> In Progress Projects <span class="badge badge-info"> {{ $projectProgress }} </span> </button>
            <button class="btn btn-icon icon-left btn-outline-warning"><i class="fas fa-exclamation-triangle"> Not Started Projects <span class="badge badge-warning"> {{ $projectPending }} </span></i></button>
            <button class="btn btn-icon icon-left btn-outline-danger"><i class="fas fa-times"></i> Cancelled Projects<span class="badge badge-danger"> {{ $projectCancel }} </span></button>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Project list</h4>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Project Name</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                    <tr>
                        <td class="text-center" >{{ $project->id }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td> {{ $project->deadline->format('d-m-Y') }} </td>
                        <td> {{ $project->status }} </td>
                        <td> <a href="{{ route('project_list.show', $project->id) }}" class="btn btn-light"> Detail </a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="text-center"> No Data Recorded</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
