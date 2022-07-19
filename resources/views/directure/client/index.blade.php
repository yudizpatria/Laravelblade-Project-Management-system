@extends('layouts.app')

@section('title-page','Data Client')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Client list</h4>
        <div class="card-header-action">
            <a href="{{ route('data_client.create') }}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> add Client </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Company name</th>
                        <th>Email</th>
                        <th>status</th>
                        <th>created at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>
                            <img src=" {{ Storage::url($client->user->image) }} "
                                    alt=" " width="30" class="rounded-circle mr-1"> {{ $client->user->name }}
                        </td>
                        <td> {{ $client->company_name }}</td>
                        <td>{{ $client->user->email }}</td>
                        <td>@if ($client->user->status == 'active')
                            <span class="badge badge-success">Active</span>
                            @elseif ($client->user->status == 'deactive')
                            <span class="badge badge-danger">Deactive</span>
                        @endif </td>
                        <td>{{ $client->user->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('data_client.edit',$client->user->id) }}"
                                class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('data_client.destroy',$client->user->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-action" title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="text-center">Client not Available</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
