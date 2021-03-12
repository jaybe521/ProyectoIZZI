<?php
session_start();
 
//Si la variable sesión está vacía
if (!isset($_SESSION['final'])) 
{
   /* nos envía a la siguiente dirección en el caso de no poseer autorización */
   header("location: ../login.php"); 
}
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
$_SESSION['informatica'] = NULL;
  $_SESSION['final'] = NULL;
  $_SESSION['tipo']= NULL;
  $_SESSION['coordinacion'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['informatica']);
  unset($_SESSION['final']);
  //unset($_SESSION['tipo']);
  unset($_SESSION['coordinacion']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Integral de Reportes</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="../css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src=<?php if($_SESSION['sexo']=='mujer'){
                  echo "../images/usuariom.png";
                }else{
                  echo "../images/usuarioh.jpg";
                } ?> alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2><?php echo strtoupper($_SESSION['final']); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../priv/index.php">Descarga de Reportes</a></li>
                      <!--<li><a href="../priv/crud.php">Registro de Entregas</a></li>
                      <li><a href="../priv/enlazar.php">Consulta de Reportes</a></li>-->
                      <li><a href="../priv/AdminUsers.php">Administracion de Usuarios</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src=<?php if($_SESSION['sexo']=='mujer'){
                  echo "../images/usuariom.png";
                }else{
                  echo "../images/usuarioh.jpg";
                } ?> alt="">
                    <?php echo strtoupper($_SESSION['final']); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo $logoutAction ?>"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation

         page content-->
        <div class="right_col" role="main">
          <div class="">
          <div class="row">
              <div class="col-md-12">
                <div class="x_title">
                    <div class="clearfix">
                  </div>
                  <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
  <form name="form1" method="POST" action="../reporteexcel.php">
    <div align="center" style="width: 98%">
      <header>
        <h3><b>DECARGA DE REPORTES</b></h3>
      </header>
      <div>
        <button id="reporte" name="reporte" value="Reporte 1" class="btn btn-primary">Descarga Masiva</button>
        <button id="reporte" name="reporte" value="Reporte 2" class="btn btn-primary">Descarga Por Fecha</button>
        <button id="reporte" name="reporte" value="Reporte 3" class="btn btn-primary">Reporte 3</button>
        <button id="reporte" name="reporte" value="Reporte 4" class="btn btn-primary">Reporte 4</button>
        <button id="reporte" name="reporte" value="Reporte 5" class="btn btn-primary">Reporte 5</button>
        <!-- Boton que redirecciona al archivo reporteexcel.php en el cual se general los reportes en hojas de excel con los datos que se solicitan para dicho reporte -->
      </div><br>
    </div>
</form>
</body>
</html>
<br>
</div>
</div>
</div>
</div>
        
        <!-- /page content -->
      </div>
    </div>
 <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../js/flot/jquery.flot.orderBars.js"></script>
    <script src="../js/flot/date.js"></script>
    <script src="../js/flot/jquery.flot.spline.js"></script>
    <script src="../js/flot/curvedLines.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../js/moment/moment.min.js"></script>
    <script src="../js/datepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>