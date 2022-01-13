<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ url('stisla/node_modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/assets/css/components.css') }}">
    @yield('style')
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

    <!-- JS Libraies -->
    {{-- <script src="{{ url('stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}
    <script src="{{ url('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('stisla/assets/js/stisla.js') }}"></script>
    <script src="{{ url('stisla/assets/js/scripts.js') }}"></script>
    <script src="{{ url('stisla/assets/js/custom.js') }}"></script>
    <script src="{{ url('stisla/assets/js/page/index.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Page Specific JS File -->
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery.js"></script> --}}
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @yield('script')
</body>

</html>
