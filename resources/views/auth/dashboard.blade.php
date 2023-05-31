<!DOCTYPE html>
<html>

<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5">
        <div class="container">
            <div class="heading">
                <h3>Website</h3>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="position: absolute; right: 3%">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @if ($errors->any())
        {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
    @endif
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

    <div class="content-area  mt-2">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
</body>

</html>
