@extends('layouts.app')

@push('styles')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
@endpush

@section('title-page')
Edit {{ $projects->project_name }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('data_project.update', $projects->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="project_name">Project Name<code>*</code> </label>
                    <input type="text" name="project_name" class="form-control" id="nameProject"
                        value="{{ $projects->project_name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="project_category">Project Category</label>
                    <select name="category_id" class="form-control">
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id === $projects->category_id)
                                selected
                            @endif
                            >
                            {{ $category->category_name }}</option>
                        @empty
                        <option value="">No Data Recorded</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Startdate <code> * </code></label>
                    <input type="text" class="form-control datepicker" name="start_date" value="{{ $projects->start_date }}" >
                </div>
                <div class="form-group col-md-6">
                    <label for="deadline">Deadline<code> * </code> </label>
                    <input type="text" class="form-control datepicker" name="deadline" value=" {{ $projects->deadline }} ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location">Location<code>*</code></label>
                    <input class="form-control" name="location" value="{{ $projects->location }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="status">Project Status</label>
                  <select name="status" class="form-control">
                      <option value="not started" {{ $projects->status == 'not started' ? 'selected' : '' }} > Not Started </option>
                      <option value="in progress" {{ $projects->status == 'in progress' ? 'selected' : '' }} >In Progress</option>
                      <option value="finished" {{ $projects->status == 'finished' ? 'selected':'' }} >Finished</option>
                      <option value="cancelled" {{ $projects->status == 'cancelled'? 'selected': ''}}>Cancelled</option>
                  </select>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="project_cost">Project Cost</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                        <input type="number" class="form-control" name="project_cost" value="{{ $projects->project_cost }}">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="client_id">client</label>
                    <select name="client_id" class="form-control">
                        @foreach ($clients as $client)
                        <option value="{{ $client->id }}"
                            @if ($client->id === $projects->client_id)
                            selected
                        @endif
                            >
                            {{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


        <hr class="mb-3">

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td> {{ $task->heading}} </td>
                            <td>
                            @if ($task->status == 'incomplete')
                            <div class="badge badge-danger"> InComplete </div>
                            @elseif($task->status == 'completed')
                            <div class="badge badge-success"> Completed </div>
                            @endif </td>
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
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
<script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
<script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script>
@endpush
