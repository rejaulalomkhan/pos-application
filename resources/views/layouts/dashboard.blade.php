<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Dashboard">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Sayful - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') - POS APP</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <!-- Toastify CSS JS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastify/toastify.min.css') }}">
    <script src="{{ asset('assets/plugins/toastify/toastify-js.js') }}"></script>
    <!-- Axios Js -->
    <script src="{{ asset('assets/plugins/axios/axios.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="global-loader" class="">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        @include('components.dashboard.header')

        @include('components.dashboard.sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>


    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Feather JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
