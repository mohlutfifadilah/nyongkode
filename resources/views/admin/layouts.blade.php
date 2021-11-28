<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/assets/css/components.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ url('') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
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
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
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
                            <a href="{{ route('admin') }}" class="nav-link"><i
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
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Modul</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a>
                                </li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                                    Page</span></a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                                <span>Bootstrap</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                                <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                                <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                                <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                                <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                                <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                                <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                                <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                                <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                                <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                                <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                                <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                                <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                                <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                                <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                                <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                                <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                                <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                                <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                                <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Stisla</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                <span>Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="components-article.html">Article</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                                <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty
                                        State</a></li>
                                <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                                <li><a class="nav-link" href="components-multiple-upload.html">Multiple
                                        Upload</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a>
                                </li>
                                <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                                <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                                <li><a class="nav-link" href="components-table.html">Table</a></li>
                                <li><a class="nav-link" href="components-user.html">User</a></li>
                                <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                                <span>Forms</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i>
                                <span>Google Maps</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                                <span>Modules</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                                <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                                <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                                <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                                <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Pages</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                                <span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-reset-password.html">Reset Password</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                                <span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                                <span>Features</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                                <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                                <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                                <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                                <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                                <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a>
                                </li>
                                <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                                <span>Utilities</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="utilities-contact.html">Contact</a></li>
                                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                                <li><a href="utilities-subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                                <span>Credits</span></a></li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>

            @yield('content')
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                        href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ url('stisla/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    {{-- <script src="{{ url('stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ url('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ url('stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}

    <!-- Template JS File -->
    <script src="{{ url('stisla/assets/js/scripts.js') }}"></script>
    <script src="{{ url('stisla/assets/js/custom.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('stisla/assets/js/page/index.js') }}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>
