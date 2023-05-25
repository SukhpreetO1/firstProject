
@extends('crud.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-2 d-flex">
            <div class="pull-left">
                <h2> Show User</h2>
            </div>
            <div class="pull-right" style="position: absolute; right: 20%; top: 5%; ">
                <a class="btn btn-primary" href="{{ route('crud.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="heading mb-4">Details</h3>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" >
                <p>First Name : {{ $user->first_name }} </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Last Name : {{ $user->last_name }} </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Email : {{ $user->email }} </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Username : {{ $user->userName }}</p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Gender : {{ $user->gender }} </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Phone Number : {{ $user->phone_number }}</p>
            </div>
        </div>
    </div>
@endsection
