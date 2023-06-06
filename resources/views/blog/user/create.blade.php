@extends('theme.layout')
@section('content')
    <style type="text/css">

    </style>
    <div class="container">
        <div class="col-md-12">
            <h1>Write Your Post Here</h1>
            <div class="pull-right" style="position: absolute; right: 3%; top: 4%; ">
                <a class="btn btn-primary" href="{{ route('blog.index') }}"> Back</a>
            </div>

            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="create_blog">
                    <div class="form-group">
                        <h3>Title</h3>

                        @error('title')
                            <span class="text-danger mb-2">{{ $message }}</span>
                        @enderror

                        <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                            placeholder="Title">
                        <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }}>
                    </div>

                    <div class="category mb-3">
                        <h3>Category</h3>
                        <div class="form-group" style="width: 100%; ">
                            <div class="form-group mb-3 me-4" name="category" id="category">
                                <select class="form-select" aria-label="Default select example" name="category"
                                    id="category">
                                    <option selected value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value='{{ $category->id }}'>{{ $category->name }}></option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h3 class="body-heading">Description</h3>

                        @error('description')
                            <span class="text-danger mb-2">{{ $message }}</span>
                        @enderror

                        <textarea class="ckeditor form-control" name="description" value="{{ old('description') }}"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </div>
    </div>
@endsection
