@extends('layouts.app')

@section('title-page','Data Employee')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Employee list</h4>
        <div class="card-header-action">
            <a href="{{route('data_employee.create')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> add Employee </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job TItle</th>
                        <th>created at</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>
                            <img src=" {{ Storage::url($employee->user->image) }}"
                                    alt=" " width="30" class="rounded-circle mr-1"> {{ $employee->user->name }}
                        </td>
                        <td> {{ $employee->user->email }}</td>
                        <td>{{ $employee->job_title }}</td>
                        <td>{{ $employee->user->created_at->format('d-m-Y') }}</td>
                        <td>@if ($employee->user->status == 'active')
                            <span class="badge badge-success">Active</span>
                            @elseif ($employee->user->status == 'deactive')
                            <span class="badge badge-danger">Deactive</span>
                        @endif </td>
                        <td>
                            <a href="{{ route('data_employee.edit',$employee->user->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                    class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('data_employee.destroy',$employee->user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-action" title="delete" >
                                    <i class="fas fa-trash"></i>
                                </button>
                                </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="text-center">Employee not Available</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
