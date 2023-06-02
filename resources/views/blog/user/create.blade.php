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
