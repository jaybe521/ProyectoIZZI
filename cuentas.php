<?php require_once('Connections/dastw.php'); ?>
<?php
$nombre=$_POST['usuario'];
$contra=$_POST['pass'];

$conn=mysqli_connect("localhost","root","","proyecto");
$consulta="SELECT * FROM usuarios WHERE nombre = '".$nombre."' AND contrasena = '".$contra."'";
$resultado=mysqli_query($conn,$consulta);
$lista=mysqli_fetch_array($resultado);
$conteo=mysqli_num_rows($resultado);

if($conteo > 0) 
{
  if($lista['tipoU']==1){
    session_start();
    $_SESSION['tipo']=$lista['tipoU'];
    $_SESSION['final']=$nombre;
    $_SESSION['sexo']=$lista['sexo'];
    $_SESSION['idUsuario']=$lista['idUsuario'];
    header("Location: priv/index.php");
    exit();
  }
  if($lista['tipoU']==2){
    session_start();
    $_SESSION['tipo']=$lista['tipoU'];
    $_SESSION['coordinacion']=$nombre;
    $_SESSION['sexo']=$lista['sexo'];
    $_SESSION['idUsuario']=$lista['idUsuario'];
    header("Location: priv/crud.php");
    exit();
  }
  if($lista['tipoU']==3){
    session_start();
    $_SESSION['tipo']=$lista['tipoU'];
    $_SESSION['informatica']=$nombre;
    $_SESSION['sexo']=$lista['sexo'];
    $_SESSION['idUsuario']=$lista['idUsuario'];
    header("Location: priv/enlazar.php");
    exit();
  }
  if($lista['tipoU']==4){
    session_start();
    $_SESSION['tipo']=$lista['tipoU'];
    $_SESSION['mensajeria']=$nombre;
    $_SESSION['sexo']=$lista['sexo'];
    $_SESSION['idUsuario']=$lista['idUsuario'];
    header("Location: priv/mensajeria.php");
    exit();
  }

   if($lista['tipoU']==5){
    session_start();
    $_SESSION['tipo']=$lista['tipoU'];
    $_SESSION['userTurnado']=$nombre;
    $_SESSION['sexo']=$lista['sexo'];
    $_SESSION['idUsuario']=$lista['idUsuario'];
    header("Location: priv/busquedaTurnado.php");
    exit();
  }
}else 
{
   echo "<script type=\"text/javascript\">alert(\"El usuario y/o la contraseña son incorrectos, por favor vuelva a introducirlos.\");</script>";
   header("refresh: 0; url=login.php");
}
?>