@extends('theme.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
            <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style=" margin-right: 12%; margin-top: 2%; "><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a> 
        </div>

        {{-- Alert Messages --}}
        @include('view_user.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="margin-right: 12%; margin-left: 12%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">

                        {{-- First Name --}}
                        <div class="col-sm-6 mb-3 mb-2">
                            <span style="color:red;">*</span>First Name</label>
                            <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="First Name" name="first_name"
                                value="{{ old('first_name') ? old('first_name') : $user->first_name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <span style="color:red;">*</span>Last Name</label>
                            <input type="text"
                                class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') ? old('last_name') : $user->last_name }}">

                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-sm-6 mb-3 mb-2">
                            <span style="color:red;">*</span>Email</label>
                            <input type="text"
                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="exampleEmail" placeholder="Email" name="email"
                                value="{{ old('email') ? old('email') : $user->email }}">

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <span style="color:red;">*</span>Username</label>
                            <input type="text"
                                class="form-control form-control-user @error('userName') is-invalid @enderror"
                                id="userName" placeholder="userName" name="userName" value="{{ old('userName') ? old('userName') : $user->userName }}">

                            @error('userName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Gender --}}
                        <div class="form-group col-sm-6 mb-3 mb-sm-0 " name="gender" id="gender">
                            <span style="color:red;">*</span>Gender</label>
                            <select class="form-select" aria-label="Default select example" style="width:22.50rem"
                                name="gender" id="gender" value="{{ $user->gender }}">
                                <option selected>Gender</option>
                                <option value="Male" @if(Auth::user()->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if(Auth::user()->gender == 'Female') selected @endif>Female</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        {{-- Phone Number --}}
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <span style="color:red;">*</span>Phone Number</label>
                            <input type="text" placeholder="Phone Number" id="phone_number" class="form-control"
                                name="phone_number" autofocus maxlength="10" value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}" maxlength="10">

                            @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>

                    </div>

                    {{-- Save Button --}}
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Update
                    </button>

                </form>
            </div>
        </div>

    </div>
@endsection
