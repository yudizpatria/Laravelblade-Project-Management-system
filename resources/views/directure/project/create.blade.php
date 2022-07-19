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

@section('title-page','Add New Project')

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
        <form action="{{ route('data_project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="project_name">Project Name<code>*</code> </label>
                    <input type="text" name="project_name" class="form-control" id="nameProject"
                        value="{{old('project_name')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="project_category">Project Category</label>
                    <select name="category_id" class="form-control">
                        <option disabled value=""> Select Project Category </option>
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}">
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
                    <input type="text" class="form-control datepicker" name="start_date">
                </div>
                <div class="form-group col-md-6">
                    <label for="deadline">Deadline<code> * </code> </label>
                    <input type="text" class="form-control datepicker" name="deadline">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location">Location<code>*</code></label>
                    <input class="form-control" name="location">
                </div>
                <div class="form-group col-md-6">
                  <label for="status">Project Status</label>
                  <select name="status" class="form-control">
                      <option selected> Not Started </option>
                      <option>In Progress</option>
                      <option>Finished</option>
                  </select>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="project_cost">Project Cost</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                        <input type="number" class="form-control" name="project_cost">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="client_id">client</label>
                    <select name="client_id" class="form-control">
                        @forelse ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->name }}</option>
                        @empty
                        <option value="">No Data Recorded</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
            </div>
        </form>



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
