<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Kaiadmin - Dashboard')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="assets/css/demo.css" /> --}}
    <!-- Additional Styles -->
    @stack('styles')
</head>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
          <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
          <!-- End Logo Header -->

        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <!-- Item untuk Admin -->
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item {{ Request::is('/dashboardadmin') ? 'active' : '' }}">
                        <a href="{{ route('dashboard_admin') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('penghuni') ? 'active' : '' }}">
                        <a href="/penghuni">
                            <i class="fas fa-users"></i>
                            <p>Data Penghuni</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('kamar') ? 'active' : '' }}">
                        <a href="/kamar">
                            <i class="fas fa-door-open"></i>
                            <p>Data Kamar</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('laporan') ? 'active' : '' }}">
                        <a href="/transaksi/laporan">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                @elseif (Auth::check() && Auth::user()->role == 'guest')
                    <li class="nav-item {{ Request::is('/home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif

                    <li class="nav-item {{ Request::is('transaksi') ? 'active' : '' }}">
                        <a href="/transaksi">
                            <i class="fas fa-money-bill"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <!-- Header -->
        <div class="main-header">
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                        <li class="nav-item dropdown topbar-user hidden-caret">
                            <a class="nav-link dropdown-toggle profile-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                                </div>
                                <span class="profile-username">
                                    <span class="op-7">Hi,</span>
                                    <span class="fw-bold">Admin</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="/logout" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Header -->
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Navbar Header -->

    <!-- End Navbar -->
</div>
<!-- Content -->

<!-- End Content -->
{{-- <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a> --}}


<!-- Footer -->
{{-- <footer class="footer">
    <div class="container-fluid">
        <div class="copyright ml-auto">
            2024, made with <i class="fa fa-heart heart text-danger"></i> by Kaiadmin
        </div>
    </div>
</footer> --}}
<!-- End Footer -->
</div>
</div>

</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

<!-- Additional Scripts -->
@stack('scripts')
</body>

</html>
