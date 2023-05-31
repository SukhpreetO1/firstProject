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
                                @csrf

                                {{-- @if ($errors->any())
                                    {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                                @endif --}}
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
                                
                                <div class="form-group mb-3 mt-2">
                                    <input type="text" placeholder="Email" id="email" class="form-control"
                                        name="email" autofocus value="{{ old('email') }}">
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

                                <div class="d-grid mx-auto">
                                    <a href="{{ route('forget.password.get') }}"
                                        style="margin-left: 62%;margin-top: 2%;">Forgot Password</a>
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
