<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Investidor Alerta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="InvestidorAlerta" name="Investidor alerta" />
    <meta content="Limiteweb" name="Robson Di Souza" />
    <link rel="shortcut icon" href="/assets/icon.png">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    {{ $styles ?? '' }}
</head>

<body 
    data-layout="horizontal" 
    data-topbar="colored" 
    style="background:url(/assets/images/background.jpg) no-repeat fixed"
>

<div id="preloader">
    <div id="status">
        <div class="spinner">
            <img src="/assets/load.png">
        </div>
    </div>
</div>

<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box">
                    <a href="{{ route('dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="70">
                        </span>
                        <span class="logo-lg">
                            <img src="/assets/images/logo-dark.png" alt="" height="70">
                        </span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="70"> 
                        </span> 
                        <span class="logo-lg"> 
                            <img src="/assets/images/logo-light.png" alt="" height="70" style="padding-top: 15px; "> 
                        </span> 
                    </a> 
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!--<form class="app-search d-none d-lg-block"  style="padding-top: 20px">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="uil-search"></span>
                    </div>
                </form>-->
            </div>
            <div class="d-flex">
                <!--<div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="uil-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>-->
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="uil-minus-path"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ auth()->user()->picture_profile }}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">
                            {{ ucwords(mb_strtolower(Auth::user()->name)) }}
                        </span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"> 
                        <!-- item--> 
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i>
                            <span class="align-middle">Ver perfil</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" class="dropdown-item" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                                <span class="align-middle">Terminar Seção</span>
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="uil-cog"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="uil-home-alt me-2"></i> Dashboard 
                                </a>
                            </li>
                            @if (auth()->user()->isAdmin())
                                <li class="nav-item dropdown"> 
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                        <i class="uil-apps me-2"></i>Lojas
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                        <a href="{{ route('dashboard') }}" class="dropdown-item">Listar Lojas</a> 
                                    </div>
                                </li>
                                @if (auth()->user()->isAdmin())
                                <li class="nav-item dropdown"> 
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"> 
                                        <i class="uil-apps me-2"></i>Usuários
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                        <a href="{{ route('user.request.authorization') }}" class="dropdown-item">Permissões Usuários</a>
                                        <a href="{{ route('users.create') }}" class="dropdown-item">Cadastrar Usuário</a> 
                                        <a href="{{ route('users.index') }}" class="dropdown-item">Listar Usuários</a>
                                        <a href="{{ route('roles.index') }}" class="dropdown-item">Grupos</a>
                                    </div>
                                </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <main>
                    @include('flash::message')

                    <x-auth-validation-errors class="alert alert-danger mb-4" :errors="$errors" />

                    {{ $slot }}
                </main>
            </div>
        </div>
        <footer class="footer" style="background: #ffffffb8">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>© InvestidorAlerta.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Todos os Direitos Reservados - Desenvolvido por Limiteweb
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>
<script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- apexcharts -->
<script src="/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

{{ $scripts ?? '' }}

</body>
</html>
