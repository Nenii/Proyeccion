<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servicio Social Estudiantil</title>
  <link rel="icon" type="image/png" href="asserts/img/Logo_UGB.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="asserts/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">
    @media print {
    .progress {
        position: relative;
    }
    .progress:before {
        display: block;
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
        border-bottom: 2rem solid #eeeeee;
    }
    .progress-bar {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        border-bottom: 2rem solid #337ab7;
    }
    .progress-bar-success {
        border-bottom-color: #67c600;
    }
    .progress-bar-info {
        border-bottom-color: #5bc0de;
    }

   
    .progress-bar-warning {
        border-bottom-color: #f0a839;
    }
    .progress-bar-danger {
        border-bottom-color: #ee2f31;
      }
    }
  </style>
  <link href="asserts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="asserts/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="asserts/css/stylxe.css" rel="stylesheet">


</head>
<body id="page-top">
  <!-- Page Wrapper -->
    <div id="wrapper">
    <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Home">
                  <div class="sidebar-brand-icon ">
                    <i class="fas fa-hand-holding-heart"></i>
                  </div>
                  <div class="sidebar-brand-text mx-3">Proyeccion Social<sup><?php echo (new \DateTime())->format('Y'); ?></sup>
                  </div>
              </a>
              <!-- Divider -->
              <hr class="sidebar-divider my-0">
              <?php if ($_SESSION["nivel"] == 1 or $_SESSION["nivel"] == 2) {?>
                  <!-- Nav Item - Dashboard -->
                  <li class="nav-item">
                    <a class="nav-link" href="?c=Proyecto&a=Crud">
                      <i class="fas fa-plus"></i>
                      <span>Agregar proyecto</span></a>
                  </li>
              <?php } ?>
           <!-- Nav Item - Pages Collapse Menu -->
           <li class="nav-item">
              <a class="nav-link" href="Home">
               <i class="fa big-icon fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Inicio</span></a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
              Proyectos
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Proyectos ejecutados</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Perfiles de proyectos</h6>
                      <a class="collapse-item" href="proyecto">Perfiles de proyectos</a>
                      <?php if ($_SESSION["nivel"] == 1 or $_SESSION["nivel"] == 2) {?>
                      <a class="collapse-item" href="agenda">Agendas</a>
                      <a class="collapse-item" href="memorias">Memorias</a>
                      <a class="collapse-item" href="resumen">Resumen ejecutivo</a>
                      <a class="collapse-item" href="boletin">Boletines</a>
                      <a class="collapse-item" href="plan">Plan de trabajo</a>
                      <a class="collapse-item" href="MINED">Mined</a>
                    <?php } ?>
                    </div>
                </div>
              </li>
              <hr class="sidebar-divider">

              <div class="sidebar-heading">
                Complementos
              </div>
                <?php if ($_SESSION["nivel"] == 1) {?>  
                <li class="nav-item">
                  <a class="nav-link " href="gasto"  aria-expanded="true" >
                    <i class="fas fa-wallet fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Finanzas</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ejecutores">
                     <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                      <span>Usuarios</span></a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="reportes">
                     <i class="fas fa-clipboard  fa-sm fa-fw mr-2 text-gray-400"></i>
                      <span>Reportes</span></a>
                </li>      <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="a=salir">

                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      <span>Cerrar sesión</span></a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

      </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content"> 

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#"  id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span><img src="img/icono.png" />
                <i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter">3+</span>
              </a>

            </li> -->

            <!-- Nav Item - Messages -->
          <!--   <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
              </a> -->
              <!-- Dropdown - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="?c=Usuario&a=Perfil&user=<?php echo $_SESSION['user']; ?>" role="button" >
                <i class="fas fa-user-cog fa-ms"></i>
              </a>
          </li>
          <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="?c=Usuario&a=Perfil&user=<?php echo $_SESSION['user']; ?>"role="button" >
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo "Hola, ".$_SESSION["nombre_usuario"]; ?> </span>
                <img class="img-profile rounded-circle" src="files/fotos/<?php echo $_SESSION["ubicacion_foto"]; ?>">
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
