<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        label.error {
            color: #dc3545;
            font-size: 15px;
        }
        input.form-control.error, select.form-select.error{
            border-color: red;
            border-width: 2px;
        }
    </style>
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

    <div class="content-area  mt-2">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>



    @include('auth.commonjs')

</body>

</html>
