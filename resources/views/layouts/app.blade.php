<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS Application">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Sayful - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') - POS APP</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
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
    @stack('custom-scripts')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        #loading{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
        }
        .loader {
            width: 78px;
            height: 78px;
            border: 8px solid #FFF;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }
        .loader::after {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 50%;
            top: 0;
            background: #FF3D00;
            width: 6px;
            height: 24px;
            transform: translateX(-50%);
            }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .login-wrapper .login-content{
            width: 60% !important;
            margin: 0 auto;
        }
        .login-wrapper .login-img{
            display: none !important;
        }
        .login-wrapper .login-content .form-login .btn-login{
            margin-top: 30px !important;
            padding: 8px !important;
        }
        .login-wrapper .login-content .form-setlogin h4:before,
        .login-wrapper .login-content .form-setlogin h4:after{
            width: 350px !important;
        }
    </style>
</head>
<body class="account-page">

    <div id="loading" class="d-none">
        <span class="loader"></span>
    </div>

    <div id="main" class="main-wrapper">
        @yield('content')
    </div>

    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Feather JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
