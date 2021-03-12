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
<script type="text/javascript">
  var arreglo = [];
  var arreglo2 = [];
  var j=0;
  while(j<44){
    arreglo[j]=0;
    arreglo2[j]=0;
  j++;
  }
function mostrarCajaBis(i){
    if(arreglo2[i-1]==0){
        document.getElementById("cajaBn"+i).style= 'visibility:visible; text-align:center';
        document.getElementById("cajaBm"+i).style= 'visibility:visible; text-align:center';
        document.getElementById("cajaBd"+i).style= 'visibility:visible; text-align:center';
        document.getElementById("cajaBr"+i).style= 'visibility:visible; text-align:center';
        document.getElementById("cajaBdi"+i).style= 'visibility:visible; text-align:center';
        arreglo2[i-1]=1;
      }else{
      if(arreglo2[i-1]==1){
      document.getElementById("cajaBn"+i).style= 'visibility:hidden; text-align:center';
        document.getElementById("cajaBm"+i).style= 'visibility:hidden; text-align:center';
        document.getElementById("cajaBd"+i).style= 'visibility:hidden; text-align:center';
        document.getElementById("cajaBr"+i).style= 'visibility:hidden; text-align:center';
        document.getElementById("cajaBdi"+i).style= 'visibility:hidden; text-align:center';
      arreglo2[i-1]=0;
      }
    }
}
function mostrarCajaCir(i){
if(arreglo[i-1]==1){
    document.getElementById("cajaCn"+i).style= 'visibility:hidden; text-align:center';
    document.getElementById("cajaCm"+i).style= 'visibility:hidden; text-align:center';
    document.getElementById("cajaCd"+i).style= 'visibility:hidden; text-align:center';
    document.getElementById("cajaCr"+i).style= 'visibility:hidden; text-align:center';
    document.getElementById("cajaCdi"+i).style= 'visibility:hidden; text-align:center';
    arreglo[i-1]=0;
}else{
    if(arreglo[i-1]==0){
    document.getElementById("cajaCn"+i).style= 'visibility:visible; text-align:center';
    document.getElementById("cajaCm"+i).style= 'visibility:visible; text-align:center';
    document.getElementById("cajaCd"+i).style= 'visibility:visible; text-align:center';
    document.getElementById("cajaCr"+i).style= 'visibility:visible; text-align:center';
    document.getElementById("cajaCdi"+i).style= 'visibility:visible; text-align:center';
      arreglo[i-1]=1;
    }
  }
}
function fncSumar(numero){
  total=0;
caja=document.forms["tabla"].elements;
var numero1 = Number(caja["n"+numero].value);
var numero2 = Number(caja["na"+numero].value);
nombre="resultadoN"+numero;
if(numero1>0){
  resultado=(numero2-numero1)+1;
  total=total=resultado;
  if(!isNaN(resultado)){
    document.getElementById(nombre).value=resultado;
  }
}
var numero3 = Number(caja["m"+numero].value);
var numero4 = Number(caja["ma"+numero].value);
nombre2="resultadoM"+numero;
if (numero3>0){
  resultado2=(numero4-numero3)+1;
  total=total+resultado2;
  if(!isNaN(resultado2)){
    document.getElementById(nombre2).value=resultado2;
  }
}
var numero5 = Number(caja["d"+numero].value);
var numero6 = Number(caja["de"+numero].value);
nombre3="resultadoDef"+numero;
if (numero5>0){
  resultado3=(numero6-numero5)+1;
  total=total+resultado3;
  if(!isNaN(resultado3)){
    document.getElementById(nombre3).value=resultado3;
  }
}
var numero7 = Number(caja["r"+numero].value);
var numero8 = Number(caja["re"+numero].value);
nombre4="resultadoR"+numero;
if (numero7>0){
  resultado4=(numero8-numero7)+1;
  total=total+resultado4;
  if(!isNaN(resultado4)){
    document.getElementById(nombre4).value=resultado4;
  }
}
var numero9 = Number(caja["di"+numero].value);
var numero0 = Number(caja["div"+numero].value);
nombre5="resultadoDiv"+numero;
if (numero9>0){
  resultado5=(numero0-numero9)+1;
  total=total+resultado5;
  if(!isNaN(resultado5)){
    document.getElementById(nombre5).value=resultado5;
  }
}
var nombret = "total"+numero;
document.getElementById(nombret).value=total;
}
</script>
</head>
<body>

    <?php
                $conn=mysqli_connect("localhost","root","","proyecto") ;
                $consulta="select * from productos";
                $resultado=mysqli_query($conn,$consulta);
                
    ?>
    
    <table class="table table-striped">
  	
		<thead>
		<tr>
			<th>PRODUCTO</th>
			<th>DESCRIPCION</th>
			<th>FECHA DE COMPRA</th>
			<th>PRECIO</th>
		</tr>
		</thead>
<?php while ($row = mysqli_fetch_array ($resultado))
{?> <tr>
	<td><?php echo $row['nombre_prod'] ?></td>
    <td><?php echo $row['descripcion'] ?></td>
    <td><?php echo $row['fecha_compra'] ?></td>
    <td><?php echo $row['Precio'] ?></td>
	<tr>
    	
<?php 
  } ?>
</table>
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