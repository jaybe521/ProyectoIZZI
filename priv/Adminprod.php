<?php

session_start();
 
//Si la variable sesión está vacía
if (!isset($_SESSION['coordinacion'])) 
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
                <h2>
                  <?php echo strtoupper($_SESSION['coordinacion']); ?></h2>
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
                      <!--<li><a href="../priv/index.php">Inicio</a></li>-->
                      <li><a href="../priv/crud.php">Registro de Entregas</a></li>
                      <!--<li><a href="../priv/enlazar.php">Consulta de Reportes</a></li>--> 
                      <li><a href="../priv/Adminprod.php">Administracion de Productos</a></li>
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
                    <?php echo strtoupper($_SESSION['coordinacion']); ?>
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
  
<form name="eliminar" method="POST" action="../modificarp.php">
  <div align="center" style="width: 98%;">
    <header>
        <br><br><h4>Eliminar/Modificar Productos</h4><br>
      </header>
  <table class="table table-hover" width="102%"  align="center"><!-- aqui se muestra el formato del reporte el cual se muestra al usuario para iniciar con su llenado con los datos necesarios -->
    <tr align="center">
        <td><b>PRODUCTO</b></td>
        <td><b>SUCURSAL</b></td>
        <td><b>ACCIONES</b></td>
    </tr>
    <?php
                $conn=mysqli_connect("localhost","root","","proyecto") ;
                $consulta="select * from sucursales a, productos b ";
                $resultado=mysqli_query($conn,$consulta);
                $i=0;
                while($lista=mysqli_fetch_array($resultado)){
                  if($_SESSION['coordinacion']!=$lista['idSucursal']){
                    $i++;
    ?>
    <tr align="center">
      <td height="50"><b>
        <?php echo strtoupper($lista["nombre_prod"]." ".$lista["descripcion"]." ".$lista["Precio"]) ?></b></td>
        <td height="50">
          <select class="form-control" name=<?php echo "nombre".$lista["idSucursal"]; ?> id=<?php echo "nombre".$i; ?> style="width: 300px; height: 35px" class="selectpicker show-tick">
            <?php if($lista["idSucursal"]==1){?>
                <option value="1" selected>Cuernavaca</option>
                <option value="2">Yautepec</option>
                <option value="3">Cuautla</option>
                <option value="4">Cuautla</option>
  <?php }else{ if($lista["idSucursal"]==2){?>
                <option value="1">Cuernavaca</option>
                <option value="2" selected>Yautepec</option>
                <option value="3" >Cuautla</option>
                <option value="4">Cuautla</option>
  <?php }else{ if($lista["idSucursal"]==3){?>
                <option value="1">Cuernavaca</option>
                <option value="2">Yautepec</option>
                <option value="3" selected>Cuautla</option>
                <option value="4">Cuautla</option>
  <?php }else{ if($lista["idSucursal"]==4){?>
                <option value="1">Cuernavaca</option>
                <option value="2">Yautepec</option>
                <option value="3">Cuautla</option>
                <option value="4" selected>Cuautla</option>
             <?php } } } } ?>
                  </select></td>
      <td height="50">
        <button id="actualizaUser" name="actualizaUser" value="0" class="btn btn-info" style="height: 40px;" onclick="this.value=<?php echo $lista['nombre_prod'];?>">Guardar</button>
        <button id="eliminarUser" name="eliminarUser" value="0" class="btn btn-danger" style="height: 40px;" onclick="this.value=<?php echo $lista['nombre_prod'];?>">Eliminar usuario</button></td>
    <?php } } 
        if($i==0){?>
    <td colspan="3" height="50" align="center"><b>NO HAY USUARIOS PARA MOSTRAR</b></td>
    <?php }?>
    </table>
    </tr>
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