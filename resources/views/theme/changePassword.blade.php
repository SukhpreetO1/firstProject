@extends('theme.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 style="margin-left: 25%;"> Change Password</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf

                            @if (Session::get('error') && Session::get('error') != null)
                                <div style="color:red">{{ Session::get('error') }}</div>
                                @php
                                    Session::put('error', null);
                                @endphp
                            @endif
                            @if (Session::get('success') && Session::get('success') != null)
                                <div style="color:green">{{ Session::get('success') }}</div>
                                @php
                                    Session::put('success', null);
                                @endphp
                            @endif

                            <div class="form-group row  mt-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password : </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="current_password"
                                        autocomplete="current-password">

                                        @if ($errors->has('current_password'))
                                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password : </label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="current-password">
                                        @if ($errors->has('new_password'))
                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirm
                                    Password : </label>

                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control"
                                        name="confirm_password" autocomplete="current-password">
                                        @if ($errors->has('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
