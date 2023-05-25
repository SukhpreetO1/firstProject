@extends('crud.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex mt-4 mb-2">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right" style="position: absolute; right: 10%; ">
                <a class="btn btn-primary" href="{{ route('crud.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('crud.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="edit_header mb-4" style="text-align: center; ">
                <h3>Edit Details</h3>
            </div>

            <div class="container" style=" justify-content: center; align-items: center; display: grid; ">
                <div class="form-group d-flex">
                    <div class="form-group mb-3 me-4">
                        <p>First Name :
                            <input type="text" placeholder="First Name" value="{{ $user->first_name }}" id="first_name"
                                class="form-control" name="first_name" autofocus>
                        </p>
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif

                    </div>

                    <div class="form-group mb-3">
                        <p>Last Name :
                            <input type="text" placeholder="Last Name" id="last_name" value="{{ $user->last_name }}"
                                class="form-control" name="last_name" autofocus>
                        </p>
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="form-group mb-3 me-4">
                        <p>Email :
                            <input type="email" placeholder="Email" id="email" value="{{ $user->email }}"
                                class="form-control" name="email" autofocus>
                        </p>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <p>Username :
                            <input type="text" placeholder="Username" id="userName" value="{{ $user->userName }}"
                                class="form-control" name="userName" autofocus>
                        </p>
                        @if ($errors->has('userName'))
                            <span class="text-danger">{{ $errors->first('userName') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="form-group mb-3 me-4" name="gender" id="gender" value="{{ $user->gender }}">
                        <p>Gender :
                            <select class="form-select" aria-label="Default select example" style="width:17.25rem"
                                name="gender" id="gender">
                        </p>
                        <option selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <p>Phone Number :
                            <input type="text" placeholder="Phone Number" id="phone_number"
                                value="{{ $user->phone_number }}" class="form-control" name="phone_number" autofocus
                                maxlength="10" value="{{ old('phone_number') }}">
                        </p>

                        @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
    </form>
@endsection
