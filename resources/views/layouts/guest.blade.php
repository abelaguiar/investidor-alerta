<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Link Money - Integrando Profissionais em potencial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="LikMoney" name="Integrando Profissionais em potencial" />
    <meta content="Limiteweb" name="Robson Di Souza" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="assets/icon.png">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="authentication-bg">

<div id="preloader">
    <div id="status">
        <div class="spinner">
            <img src="assets/load.png">
        </div>
    </div>
</div>

<div class="account-pages pt-sm-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body p-4"> 
                        <div class="text-center mt-2">
                            <img src="assets/images/logo-sm.png" width="150px">
                        </div>
                        {{ $slot }}
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>© <script>document.write(new Date().getFullYear())</script> LinkMoney. Desenvovido por Limiteweb</p>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

{{ $scripts ?? '' }}

</body>
</html>

