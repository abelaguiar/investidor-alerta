<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8" />
<title>Link Money - Integrando Profissionais em potencial</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="LikMoney" name="Integrando Profissionais em potencial" />
<meta content="Limiteweb" name="Robson Di Souza" />
<link rel="shortcut icon" href="assets/icon.png">

<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-layout="horizontal" data-topbar="colored" style="background:url(assets/images/background.jpg) no-repeat fixed">
	<div id="preloader">
            <div id="status">
                <div class="spinner">
                   <img src="assets/load.png">
                </div>
            </div>
        </div>

<div id="layout-wrapper">
<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <div class="navbar-brand-box"> <a href="index.php" class="logo logo-dark"> <span class="logo-sm"> <img src="assets/images/logo-sm.png" alt="" height="70"> </span> <span class="logo-lg"> <img src="assets/images/logo-dark.png" alt="" height="70"> </span> </a> <a href="index.php" class="logo logo-light"> <span class="logo-sm"> <img src="assets/images/logo-sm.png" alt="" height="70"> </span> <span class="logo-lg"> <img src="assets/images/logo-light.png" alt="" height="70" style="padding-top: 15px; "> </span> </a> </div>
      <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content"> <i class="fa fa-fw fa-bars"></i> </button>
      <?php include_once('includes/buscar.php'); ?>
    </div>
    <div class="d-flex">
      <div class="dropdown d-inline-block d-lg-none ms-2">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-search"></i> </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
          <form class="p-3">
            <div class="m-0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <?php include_once('includes/perfil.php'); ?>
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i class="uil-cog"></i> </button>
      </div>
    </div>
  </div>
  <?php include_once('includes/menu.php'); ?>
</header>
<div class="main-content">
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="row">
        
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Comissões</h4>
            <p class="card-title-desc">Siga abaixo a lista de Comissionados</p>
            <div class="table-responsive">
              <table class="table table-borderless mb-0">
                <thead>
                  <tr>
                    <th width="3%">#</th>
                    <th width="21%" align="Left">Nome Representante</th>
                    <th width="21%" align="Left">Loja</th>
                    <th width="20%" align="Left">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Gustavo Cuencas</td>
                    <td>Magazine Luiza</td>
                    <td><button type="button" class="btn btn-outline-success waves-effect waves-light">Autorizar</button> <button type="button" class="btn btn-outline-danger waves-effect waves-light">Negar</button> <button type="button" class="btn btn-outline-secondary waves-effect">Editar</button></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Robson Di Souza</td>
                    <td>Magazine Luiza</td>
                    <td><button type="button" class="btn btn-outline-success waves-effect waves-light">Autorizar</button>
                      <button type="button" class="btn btn-outline-danger waves-effect waves-light">Negar</button>
                    <button type="button" class="btn btn-outline-secondary waves-effect">Editar</button></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Fabio </td>
                    <td>Magazine Luiza</td>
                    <td><button type="button" class="btn btn-outline-success waves-effect waves-light">Autorizar</button>
                      <button type="button" class="btn btn-outline-danger waves-effect waves-light">Negar</button>
                    <button type="button" class="btn btn-outline-secondary waves-effect">Editar</button></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>André</td>
                    <td>Magazine Luiza</td>
                    <td><button type="button" class="btn btn-outline-success waves-effect waves-light">Autorizar</button>
                      <button type="button" class="btn btn-outline-danger waves-effect waves-light">Negar</button>
                    <button type="button" class="btn btn-outline-secondary waves-effect">Editar</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end col --> 
    </div>
  </div>
</div>
<?php include_once('includes/rodape.php'); ?>
</div>
</div>
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
</html>
