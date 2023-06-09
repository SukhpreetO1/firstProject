@extends('crud.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3 mt-3">
            <div class="pull-left">
                <h2>CRUD Operation</h2>
            </div>
            <div class="pull-right" style="position: absolute; right: 8%; top: 5%; ">
                <a class="btn btn-primary" href="{{ route('register-user') }}"> Create New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->userName }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>
                    <form action="{{ route('crud.destroy',$user->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('crud.show', $user->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('crud.edit', $user->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links('crud.pagination') }}
    </div>
@endsection
