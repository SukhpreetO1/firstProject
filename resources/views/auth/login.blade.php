@extends('auth.dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        
                        {{-- show logout alert --}}
                        @if (session('logout_message'))
                            <div class="alert alert-success">{{ session('logout_message') }}</div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">

                                @if (session('error_message'))
                                    <div class="alert alert-danger">{{ session('error_message') }}</div>
                                @endif

                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control"
                                        name="email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                                </div>

                                <div class="sign-up mt-2 mb-2">
                                    <p>Not Register, then click <a href="./registration">here</a> to sign up.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
