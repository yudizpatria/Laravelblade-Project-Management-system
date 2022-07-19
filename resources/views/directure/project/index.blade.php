@extends('layouts.app')

@section('title-page','Data Project')

@section('content')

<div class="card">

    <div class="card-body">
        <button class=" btn btn-icon icon-left btn-outline-primary"><i class="far fa-edit"></i> Total Projects <span class="badge badge-primary"> {{$totalProject }} </span> </button>
        <button class=" btn btn-icon icon-left btn-outline-success"><i class="fas fa-check"></i> Finished Projects <span class="badge badge-success"> {{ $projectSuccess }} </span> </button>
        <button class=" btn btn-icon icon-left btn-outline-info"><i class="fas fa-info-circle"></i> In Progress Projects <span class="badge badge-info"> {{ $projectProgress }} </span> </button>
        <button class="btn btn-icon icon-left btn-outline-warning"><i class="fas fa-exclamation-triangle"> Not Started Projects <span class="badge badge-warning"> {{ $projectPending }} </span></i></button>
        <button class="btn btn-icon icon-left btn-outline-danger"><i class="fas fa-times"></i> Cancelled Projects<span class="badge badge-danger"> {{ $projectCancel }} </span></button>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Project list</h4>
        <div class="card-header-action">
            <a href="{{route('data_project.create')}}" class="btn btn-primary mr-1"> <i class="fa fa-plus"
                    aria-hidden="true"></i> add Project </a>
            <a href="{{route('category.create')}}" class="btn btn-info"> <i class="fa fa-plus"
                    aria-hidden="true"></i> add Project Category </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Project Name</th>
                        <th>Deadline</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                    <tr>
                        <td class="text-center" >{{ $project->id }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td> {{ $project->deadline->format('d-m-Y') }} </td>
                        <td> {{ $project->client->name }} </td>
                        <td>
                             @if ($project->status == 'not started')
                            <span class="badge badge-warning">Not Started</span>
                            @elseif($project->status == 'in progress')
                            <span class="badge badge-info">In Progress</span>
                            @elseif($project->status == 'finished')
                            <span class="badge badge-success">Finished</span>
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('data_project.edit',$project->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('data_project.destroy',$project->id) }}" method="POST" class="d-inline" data-toggle="tooltip" title="Edit">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-action" title="delete" >
                                <i class="fas fa-trash"></i>
                            </button>
                            </form></td>
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
