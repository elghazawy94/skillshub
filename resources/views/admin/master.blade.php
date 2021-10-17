<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>{{ env('APP_NAME') }} | Dashboard - @yield('title')</title>
<link rel="icon" type="image/png" href="{{asset('web/favicon.png')}}"/>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('admin/css/fontawesome.all.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/css/adminlte.css')}}">


<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <form id="logout-form" action="{{ url('logout')}}" method="POST" style="display:none;">
        @csrf
    </form>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a id="logout-link" href="#" class="nav-link font-weight-bold text-dark">Logout</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link font-weight-bold text-dark">back to Website</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{ asset('admin/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('admin/img/user-profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ url('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/setting')}}" class="nav-link {{ (request()->is('dashboard/setting')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Setting</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/messages')}}" class="nav-link {{ (request()->is('dashboard/messages*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>Messages</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/categories')}}" class="nav-link {{ (request()->is('dashboard/categories*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Categoris</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/skills')}}" class="nav-link {{ (request()->is('dashboard/skills*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-atom"></i>
                    <p>Skills</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/exams')}}" class="nav-link {{ (request()->is('dashboard/exams*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>Exams</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/students')}}" class="nav-link {{ (request()->is('dashboard/students*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Students</p>
                </a>
            </li>

            @if (Auth::user()->role_id == 1)
            <li class="nav-item">
                <a href="{{ url('dashboard/admins')}}" class="nav-link {{ (request()->is('dashboard/admins*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>Admins</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/groups')}}" class="nav-link {{ (request()->is('dashboard/groups*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Groups</p>
                </a>
            </li>
            @endif


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@yield('content')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/js/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.js')}}"></script>
<script type="text/javascript">
    $('#logout-link').click(function (e) {
        e.preventDefault();
        $('#logout-form').submit()
    });
</script>
    @yield('scripts')

</body>
</html>
