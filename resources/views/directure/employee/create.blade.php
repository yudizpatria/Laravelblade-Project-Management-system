@extends('layouts.app')

@section('title-page','Add employee')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add New Employee</h4>
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
                <form action="{{ route('data_employee.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Employee Name</label>
                            <input type="text" name="name" class="form-control" id="nameEmployee" placeholder="Employee"
                                value="{{old('name')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Employee Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                placeholder="employee@example.com" value="{{ old('email')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="Password" name="password" class="form-control" id="password"
                                value="{{old('password')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="job_title">Job title</label>
                            <input type="text" name="job_title" class="form-control"
                                placeholder="Programmer | Marketing" value="{{old('job_title')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Prolfe Picture</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select name="status" id="gender" class="form-control">
                                <option selected>active</option>
                                <option>deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block ">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
