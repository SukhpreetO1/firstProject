<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="margin-left: 69%">
        <li class="nav-item d-none d-sm-inline-block">
            <a href={{url('dashboard')}} class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        
        <li class="nav-item dropdown">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dashboard
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href={{ route('show') }}>Profile</a></li>
                    <li><a class="dropdown-item" href={{ url('view_user.list')}}>User</a></li>
                    <li><a class="dropdown-item" href={{ route('signout') }}>Logout</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
