<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>YPR Cell</title>
<!-- plugins:css -->
<link rel="stylesheet" href="{{asset('frontend/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/vendors/base/vendor.bundle.base.css')}}">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<!-- endinject -->
<!-- plugin css for this page -->
{{-- <link rel="stylesheet" href="{{asset('frontend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"> --}}

<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styledashboard.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/icon.css')}}">
<!-- endinject -->
<link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
{{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
<link href="{{asset('assets/css/chosen.min.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.4.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>


</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href=""><img src="{{asset('img/Logo_Barantan (1) 1.svg')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="{{asset('img/Logo_Barantan (1) 1.svg')}}" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
        </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            {{-- <img src="" alt="profile"/> --}}
            <span class="nav-profile-name" style="color: black">Selamat Datang {{Auth::user()->name}}</span>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
    </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        @if (Auth::user()->roles == "ADMIN")
            <li class="nav-item @yield('dashboard')">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                <i class="mdi mdi-subway menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
        <li class="nav-item @yield('dapel')">
            <a class="nav-link" href="{{route('operator.index')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Kelola Operator</span>
            </a>
        </li>
        <li class="nav-item @yield('dapel')">
            <a class="nav-link" href="{{route('harga.index')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Kelola Voucher</span>
            </a>
        </li>
        <!-- <li class="nav-item @yield('dapel')">
            <a class="nav-link" href="{{route('contoh.index')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Contoh</span>
            </a>
        </li> -->
        <li class="nav-item @yield('dapel')">
            <a class="nav-link" href="{{route('pelanggan.konfirmasi')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Pelanggan</span>
            </a>
        </li>
        <li class="nav-item @yield('dapel')">
            <a class="nav-link" href="{{route('pelanggan.index')}}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Laporan Penjualan</span>
            </a>
        </li>
        @else
            <li class="nav-item @yield('dashboard')">
                <a class="nav-link" href="{{route('transaksi-pulsa.create')}}">
                <i class="mdi mdi-subway menu-icon"></i>
                <span class="menu-title">Transaksi Pulsa</span>
                </a>
            </li>
            <li class="nav-item @yield('dashboard')">
                <a class="nav-link" href="{{route('transaksi-pulsa.index')}}">
                <i class="mdi mdi-subway menu-icon"></i>
                <span class="menu-title">History Transaksi</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a href="#" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
    </nav>
    <!-- partial -->
        <div class="main-panel">
            @if (Auth::user()->roles != "ADMIN")
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Selamat Datang di YPR Cell</h2>
                <hr>
            </div>
            @endif
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
            {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © </span>
            </div> --}}
            </footer>
            <!-- partial -->
        </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('sweetalert::alert')
<!-- plugins:js -->
<script src="{{asset('frontend/vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('frontend/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('frontend/js/off-canvas.js')}}"></script>
<script src="{{asset('frontend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('frontend/js/template.js')}}"></script>
{{-- <script src="{{asset('frontend/js/jquery.cookie.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets/stisla-assets/js/scripts.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
</body>
</html>


