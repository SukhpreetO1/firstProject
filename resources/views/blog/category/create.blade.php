@extends('theme.layout')

@section('content')
    <div class="col-md-12">
        <h1>Create Category</h1>
        <div class="pull-right" style="position: absolute; right: 3%; top: 4%; ">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
        </div>

        <div class="category mb-3">
            <h3>Category Name</h3>
            <div class="form-group mb-3 me-4">
                <input type="text" placeholder="Category Name" id="category_name" class="form-control"
                    name="category_name" autofocus value="{{ old('category_name') }}">
                @if ($errors->has('category_name'))
                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                @endif
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Submit</button>
            </div>
        </div>
    </div>
@endsection
