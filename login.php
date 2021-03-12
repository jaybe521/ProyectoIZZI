<?php
session_start();
if(isset($_SESSION['tipo'])){
  switch ($_SESSION['tipo']) {
  case '1':
     header("location: priv/index.php");
    break;
  case '2':
     header("location: priv/crud.php");
    break;
  case '3':
     header("location: priv/enlazar.php");
    break;
    case '4':
     header("location: priv/mensajeria.php");
  default:
    break;
  }
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <script type="text/javascript">
  function validacion() {
	  valor = document.getElementById("campo").value;
if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
  return false;
  }}
	  
</script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesion</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form ACTION="cuentas.php"  METHOD="POST">
              <h1>Inicio de Sesion</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nombre" name="usuario" id="usuario"  required  />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required />
              </div>
              <div>
                <button class="btn btn-default submit">Iniciar Sesion</button>
              </div>

              <div class="clearfix"></div>
<br>
              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>PROYECTO INVENTARIO</p>
                  <p>JOSE ALFREDO DIAZ GONZALEZ</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>