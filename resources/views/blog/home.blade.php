@extends('theme.layout')

@section('content')
    <div>
        <div class="container mx-auto">
            @if (Session::has('message'))
                <div class="col-md-12" style="text-align: end;font-size: 142%;color: green;">
                    <div class=”alert alert-info”>{{ Session::get('message') }}</div>
                </div>
            @endif
            <h1
                class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                Blog Page
            </h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="pull-right mb-3" style="margin-left: 79%;">
                    <a href={{ route('blog.create') }}>
                        <button class="btn btn-success">Add New Blog Post</button>
                    </a>
                </div>

                <table class="table table-bordered" id="dataTable" style="width: auto; margin-left: 4%;">
                    <thead>
                        <tr>
                            <th style="width: 8%;">Sr No.</th>
                            <th>BLOG TITLE</th>
                            <th style="width: 30%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $blogs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blogs->title }}</td>
                                <td style="display: flex; justify-content: space-evenly;">
                                    <a href="{{ route('blog.show', ['blog' => $blogs->id]) }}" class="btn btn-primary m-2">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a href="{{ route('blog.edit', ['blog' => $blogs->id]) }}" class="btn btn-primary m-2">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form method="POST" action="{{ route('blog.destroy', ['blog' => $blogs->id]) }}">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $blog->links('blog.pagination') }}
    </div>
@endsection
