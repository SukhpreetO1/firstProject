@extends('theme.layout')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1 style="margin-left: 39%;">Edit Blogs</h1>
            <div class="pull-right" style="position: absolute; right: 3%; top: 1%; ">
                <a class="btn btn-primary" href="{{ route('blog.index') }}"> Back</a>
            </div>

            <form method="POST" action="{{ route('blog.update', ['blog' => $blogs->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="update_blog">
                    <div class="form-group">
                        <h3>Title</h3>

                        @error('title')
                            <span class="text-danger mb-2">{{ $message }}</span>
                        @enderror

                        <input type="text" class="form-control" name="title"
                            value="{{ old('title') ? old('title') : $blogs->title }}" placeholder="Title">
                        {{-- <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }}> --}}
                    </div>


                    <div class="form-group">
                        <h3 class="body-heading">Description</h3>

                        @error('description')
                            <span class="text-danger mb-2">{{ $message }}</span>
                        @enderror
                        <textarea class="ckeditor form-control" name="description">{{$blogs->description}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
            </form>
        </div>
    </div>
@stop
