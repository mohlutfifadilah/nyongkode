<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ url('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/assets/css/components.css') }}"> --}}

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            {{-- <img alt="image" src="{{ url('foto-user/' . Auth::user()->foto) }}"
                                class="rounded-circle mr-1"> --}}
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void" class="dropdown-item has-icon text-danger"
                                onclick="$('#logout').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout </a>
                            <form action="/logout" id="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">NyongKode</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">NK</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item {{ request()->is('admin*') ? 'active' : '' }}">
                            <a href="/admin" class="nav-link"><i
                                    class="fas fa-th-large"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Data</li>
                        <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}" class="nav-link"><i
                                    class="fas fa-users"></i><span>Pengguna</span></a>
                        </li>
                        <li class="menu-header">Modul</li>
                        <li class="nav-item {{ request()->is('kategori*') ? 'active' : '' }}">
                            <a href="{{ route('kategori.index') }}" class="nav-link"><i
                                    class="fas fa-columns"></i><span>Kategori</span></a>
                        </li>
                        <li class="nav-item {{ request()->is('modul*') ? 'active' : '' }}">
                            <a href="{{ route('modul.index') }}" class="nav-link"><i
                                    class="fas fa-book"></i><span>Modul</span></a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Modul</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a>
                                </li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                            </ul>
                        </li> --}}
                    </ul>

                    {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div> --}}
                </aside>
            </div>

            @yield('content')
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By <a
                        href="https://github.com/mohlutfifadilah">Moh Lutfi Fadilah</a>
                </div>
                <div class="footer-right">
                    1.0
                </div>
            </footer>
        </div>
    </div>
    @yield('script')
    <!-- Template JS File -->
    {{-- <script src="{{ url('stisla/assets/js/stisla.js') }}"></script>
    <script src="{{ url('stisla/assets/js/scripts.js') }}"></script>
    <script src="{{ url('stisla/assets/js/custom.js') }}"></script>
    <script src="{{ url('stisla/assets/js/page/index.js') }}"></script> --}}

</body>

</html>
