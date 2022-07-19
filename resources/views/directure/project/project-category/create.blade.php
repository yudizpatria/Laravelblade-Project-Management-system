@extends('layouts.app')

@section('title-page','Add Project Category')

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="category_name">Project Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="categoryname"
                                value="{{old('category_name')}}">
                        </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Category</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Category name</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-inline">
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
                                <div class="text-center">Project category not Available</div>
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
