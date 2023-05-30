@extends('theme.layout')

@section('content')
<div style="margin: 0px 10% 5% 20%;">
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-2 d-flex">
            <div class="pull-left">
                <h2> Show User</h2>
            </div>
            <div class="pull-right" style="position: absolute; right: 20%; top: 5%; ">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="heading mb-4">Details</h3>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>First Name : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; "> {{ $user->first_name }} </p></div>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>Last Name : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; ">{{ $user->last_name }} </p></div>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>Email : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; ">{{ $user->email }} </p></div>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>Username : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; ">{{ $user->userName }} </p></div>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>Gender : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; ">{{ $user->gender }} </p></div>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <div>Phone Number : </div>
                <div style="border: 1px solid #cbcbcb;margin: 10px 8px 0px 0px;height: 29px;"><p style="margin-left: 2%; ">{{ $user->phone_number }} </p></div>
            </div>
        </div>
    </div>
</div>
@endsection
