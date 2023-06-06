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
                class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl mt-3">
                Users Blogs
            </h1>
        </div>

        {{-- <div class="admin_category">
            <div class="custom-control custom-switch" style=" text-align: end; margin-right: 6%; ">
                <input type="checkbox" class="custom-control-input" name="category" id="category" checked>
                <label class="custom-control-label" for="category">Category</label>
            </div>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="width: auto; margin-left: 4%;">
                    <thead>
                        <tr>
                            <th style="width: 8%;">Sr No.</th>
                            <th>User Detail</th>
                            {{-- <th class="category" >Category</th> --}}
                            <th style="width: 30%;">Number of Blogs</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @if (Request::get('page') && !empty(Request::get('page')))
                            @php
                                $page = Request::get('page') - 1;
                                $counter = 10 * $page + 1;
                            @endphp
                        @endif

                        @foreach ($admin_panel as $admin_panel_blog)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $admin_panel_blog->first_name }} {{ $admin_panel_blog->last_name }}</td>
                                {{-- <td class="category" ></td> --}}
                                <td>{{ $admin_panel_blog->blog->count() }}</td>
                                <td style="display: flex; justify-content: space-evenly;">
                                    <a href="{{ route('posts.show', $admin_panel_blog->id) }}" class="btn btn-primary m-2">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @php  $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $admin_panel->links('blog.pagination') }}
    </div>
@endsection
