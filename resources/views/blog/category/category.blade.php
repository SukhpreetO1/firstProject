@extends('theme.layout')

@section('content')
    <div class="container">
        <div class="category heading d-flex">
            <h1>Category</h1>

            <div class="pull-right mb-3 mt-2" style="margin-left: 71%;">
                <a href={{ route('categories.create') }}>
                    <button class="btn btn-success">Add Category</button>
                </a>
            </div>
        </div>
        <table class="table table-bordered" style="width: 71%; margin-left: 17%;">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <input data-id="{{ $category->id }}" class="toggle-class" type="checkbox" data-onstyle="success"
                                data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                {{ $category->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
