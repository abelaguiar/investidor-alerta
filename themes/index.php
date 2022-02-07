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
      <div class="col-12"> </div>
    </div>
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="float-end mt-2"> <img src="assets/images/icone-loja.jpg" width="100" height="100"> </div>
            <div>
              <h4 class="mb-1 mt-1">LOJAS</h4>
              <br>
              <a href="cadastrar-lojas.php">
              <p class="text-muted mb-0">> Cadastrar Lojas</p>
              </a> <a href="listar-lojas.php">
              <p class="text-muted mb-0">> Listar Lojas</p>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="float-end mt-2"> <img src="assets/images/icone-representantes.jpg" width="100" height="100"> </div>
            <div>
              <h4 class="mb-1 mt-1">REPRESENTANTES</h4>
              <br>
              <a href="autorizar-usuario.php">
              <p class="text-muted mb-0">> Permissões de Usuários</p>
				  <a href="cadastrar-representantes.php">
              <p class="text-muted mb-0">> Atribuir Representante</p>
              </a> <a href="listar-representantes">
              <p class="text-muted mb-0">> Listar Representantes</p>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="float-end mt-2"> <img src="assets/images/icone-comissao.jpg" width="100" height="100"> </div>
            <div>
              <h4 class="mb-1 mt-1">COMISSÃO</h4>
              <br>
              <a href="cadastrar-comissoes.php">
              <p class="text-muted mb-0">> Cadastrar Comissões</p>
              </a> <a href="listar-comissoes.php">
              <p class="text-muted mb-0">> Listar Comissões</p>
              </a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-8">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Comissões dos Representantes</h4>
            <div data-simplebar style="max-height: 336px;">
              <div class="table-responsive">
                <table class="table table-borderless table-centered table-nowrap">
                  <tbody>
                    <tr>
                      <td style="width: 20px;"><img src="assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                      <td><h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                        <p class="text-muted font-size-13 mb-0">Fortaleza - Loja Magazine Luiza</p></td>
                      <td><span class="badge bg-soft-danger font-size-12">Pendente</span></td>
                      <td class="text-muted fw-semibold text-end">R$250.00</td>
                    </tr>
                    <tr>
                      <td><img src="assets/images/users/avatar-5.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                      <td><h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                        <p class="text-muted font-size-13 mb-0">São Paulo - Loja Magazine Luiza</p></td>
                      <td><span class="badge bg-soft-success font-size-12">Pago</span></td>
                      <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>R$110.00</td>
                    </tr>
                    <tr>
                      <td><img src="assets/images/users/avatar-2.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                      <td><h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                        <p class="text-muted font-size-13 mb-0">Brasilia - Loja Magazine Luiza</p></td>
                      <td><span class="badge bg-soft-success font-size-12">Pago</span></td>
                      <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-success" data-feather="trending-up"></i>R$420.00</td>
                    </tr>
                    <tr>
                      <td><img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                      <td><h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                        <p class="text-muted font-size-13 mb-0">Rio de Janeiro - Loja Magazine Luiza</p></td>
                      <td><span class="badge bg-soft-success font-size-12">Pago</span></td>
                      <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>R$120.00</td>
                    </tr>
                    <tr>
                      <td><img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                      <td><h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                        <p class="text-muted font-size-13 mb-0">Rio de Janeiro - Loja Magazine Luiza</p></td>
                      <td><span class="badge bg-soft-success font-size-12">Pago</span></td>
                      <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>R$120.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Histórico de Lojas</h4>
            <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 336px;">
              <li class="feed-item">
                <div class="feed-item-list">
                  <p class="text-muted mb-1 font-size-13">Hoje<small class="d-inline-block ms-1">12:20 pm</small></p>
                  <p class="mb-0">Loja Magazine Luiza, cadastrada para o respresentante: <span class="text-primary"><br>Gustavo Cuencas</span></p>
                </div>
              </li>
              <li class="feed-item">
                <div class="feed-item-list">
                  <p class="text-muted mb-1 font-size-13">Hoje<small class="d-inline-block ms-1">12:20 pm</small></p>
                  <p class="mb-0">Loja Magazine Luiza, cadastrada para o respresentante: <span class="text-primary"><br>Gustavo Cuencas</span></p>
                </div>
              </li>
              <li class="feed-item">
                <div class="feed-item-list">
                  <p class="text-muted mb-1 font-size-13">Hoje<small class="d-inline-block ms-1">12:20 pm</small></p>
                  <p class="mb-0">Loja Magazine Luiza, cadastrada para o respresentante: <span class="text-primary"><br>Gustavo Cuencas</span></p>
                </div>
              </li>
              <li class="feed-item">
                <div class="feed-item-list">
                  <p class="text-muted mb-1 font-size-13">Hoje<small class="d-inline-block ms-1">12:20 pm</small></p>
                  <p class="mb-0">Loja Magazine Luiza, cadastrada para o respresentante: <span class="text-primary"><br>Gustavo Cuencas</span></p>
                </div>
              </li>
            </ol>
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
