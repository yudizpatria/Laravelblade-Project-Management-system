@extends('layouts.app')

@section('title-page', 'Dashboard')

@section('content')
<div class="row">
    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Project</h4>
          </div>
          <div class="card-body">
            {{ $totalProject }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Task</h4>
          </div>
          <div class="card-body">
            {{ 1 }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Client</h4>
          </div>
          <div class="card-body">
            {{ $totalClient }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Invoice</h4>
          </div>
          <div class="card-body">
            47
          </div>
        </div>
      </div>
    </div> --}}

    <div class="col-md-4">
        <div class="card card-hero bg-primary">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-coins"></i>
            </div>
            <div class="card-description"><strong>Total Project</strong></div>
            <h4> {{ $project }} </h4>
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-tasks"></i>
            </div>
            <div class="card-description"> <strong>Total Task</strong></div>
            <h4> {{$task}} </h4>
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-description"> <strong>Total Client</strong></div>
            <h4> {{ $client}} </h4>
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-id-card"></i>
            </div>
            <div class="card-description"> <strong>Total Employee</strong></div>
            <h4> {{ $employee }} </h4>
          </div>
        </div>
    </div>
</div>
@endsection
