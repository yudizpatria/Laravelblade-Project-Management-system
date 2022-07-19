@extends('layouts.app')

@section('title-page')
Project #{{$project->id}} - {{ $project->project_name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="col-lg-12">
                    <h5>Project Detail</h5>
                    <hr class="mb-3">

                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Project Name</strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                {{ $project->project_name}}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Project Category</strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                {{ $project->category->category_name }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Project Location</strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                {{ $project->location }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Start Date</strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                {{ $project->start_date->format('Y-m-d') }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Deadline </strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                {{ $project->deadline->format('Y-m-d') }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Project Cost</strong>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                Rp. {{ $project->project_cost }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
