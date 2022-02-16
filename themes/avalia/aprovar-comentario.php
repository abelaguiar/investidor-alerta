<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8" />
<title>Investidor Alerta</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="LikMoney" name="Integrando Profissionais em potencial" />
<meta content="Limiteweb" name="Robson Di Souza" />
<link rel="shortcut icon" href="assets/icon.png">
           <link href="assets/libs/jquery-bar-rating/themes/bars-1to10.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/bars-horizontal.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/bars-movie.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/bars-pill.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/bars-reversed.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/bars-square.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/css-stars.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/fontawesome-stars-o.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-bar-rating/themes/fontawesome-stars.css" rel="stylesheet" type="text/css" />
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">APROVAR AVALIAÇÕES</h4>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">


		



		<div class="col-xl-4">

            <div class="card">
                
                <div class="card-body">
                    <h4 class="card-title mt-0">Gustavo Cuencas</h4>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="text-primary">Nome da empresa</span></li>
                    <li class="list-group-item"><select id="rating-1to10" name="rating" autocomplete="off">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7" selected>7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                          </select>  </li>
                </ul>
                <div class="card-body">
                    <button type="button" class="btn btn-success waves-effect waves-light">
                            <i class="uil uil-check me-2"></i> Permitir
                        </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">
                            <i class="uil uil-exclamation-octagon me-2"></i> Não Permitir
                        </button>
                </div>
            </div>

        </div>
		
      
      
      
    </div>
  </div>
</div>
<?php include_once('includes/rodape.php'); ?>
</div>
</div>
<div class="rightbar-overlay"></div>

        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- jquery-bar-rating js -->
        <script src="assets/libs/jquery-bar-rating/jquery.barrating.min.js"></script>

        <script src="assets/js/pages/rating-init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

</body>
</html>
