@extends('layouts.app')

@section('title-page', 'Dashboard')

@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="far fa-question-circle"></i>
            </div>
            <div class="card-description"> <strong>Total Project</strong></div>
            <h4> {{$projectClient}} </h4>
          </div>
        </div>
    </div>
</div>
@endsection
