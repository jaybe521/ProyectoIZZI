<?php
$conn=mysqli_connect("localhost","root","","proyecto");

if(isset($_POST["eliminarUser"])){
	$id=$_POST["eliminarUser"];
	if($id>0){
		$consulta="DELETE FROM `usuarios` WHERE `nombre_prod` = ".$id."";
		$resultado=mysqli_query($conn,$consulta);

		echo "<script type=\"text/javascript\">alert(\"Se elimino satisfactoriamente el usuario\");</script>";
		header("refresh: 0; url=priv/AdminUsers.php");
	}
}
if(isset($_POST["actualizaUser"])){
	$actualiza=$_POST["actualizaUser"];
	if ($actualiza>0) {
		$nTipo=$_POST["privilegioA".$actualiza];

		$consulta="UPDATE `producto` SET `nombre_prod`= ".$nTipo." WHERE `nombre_prod` = ".$actualiza."";
		$resultado=mysqli_query($conn,$consulta);

		echo "<script type=\"text/javascript\">alert(\"Se modifico satisfactoriamente el usuario\");</script>";
		header("refresh: 0; url=priv/AdminUsers.php");
	}
}
?>