{{-- @extends('auth.dashboard')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Registeration Form</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control"
                                        name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>

                                <div class="login mt-2 mb-2">
                                    <p>Already Register. Click <a href="./login">here</a> to login.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection --}}




@extends('auth.dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="card-header text-center">Registeration Form</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group d-flex">
                                    <div class="form-group mb-3 me-4">
                                        <input type="text" placeholder="First Name" id="first_name" class="form-control"
                                            name="nafirst_nameme" required autofocus>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Last Name" id="last_name" class="form-control"
                                            name="last_name" required autofocus>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->last('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="form-group mb-3 me-4">
                                        <input type="text" placeholder="Email" id="email" class="form-control"
                                            name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Username" id="userName" class="form-control"
                                            name="userName" required autofocus>
                                        @if ($errors->has('userName'))
                                            <span class="text-danger">{{ $errors->first('userName') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="form-group mb-3 me-4">
                                        <select class="form-select" aria-label="Default select example" style="width:15.25rem">
                                            <option selected>Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Phone Number" id="phone_number"
                                            class="form-control" name="phone_number" required autofocus>
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="form-group mb-3 me-4">
                                        <input type="password" placeholder="Password" id="password" class="form-control"
                                            name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Confirm Password" id="password" class="form-control"
                                            name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>

                                <div class="login mt-3" style="margin-left: 20%;">
                                    <p>Already Register. Click <a href="./login">here</a> to login.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
