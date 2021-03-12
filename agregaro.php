<?php
$conn=mysqli_connect("localhost","root","","proyecto");

/*$temp=$_FILES['archivo']['tmp_name'];
/*$directorio = "C:/xampp/htdocs/dastw/oficios";  
/*$nombre_a = $_FILES['archivo']['name'];   
/*$url=$directorio . "/" . $nombre;  
/*if (move_uploaded_file($temp,$url))  */
{                       
    $sucursal=$_POST["sucursal"];
	$nombre=$_POST["nombre"];
	$precio=$_POST["precio"];
	$descripcion=$_POST["descripcion"];
/*	$captura=strtoupper($_POST["captura"]);*/
	$categoria=$_POST["categoria"];
	$fecha=date("Y-m-d H:i:s");
	$fechar=$_POST["fecha"];


	$resultado=mysqli_query($conn,$consulta);

	echo "<script type=\"text/javascript\">alert(\"Se agrego satisfactoriamente el nuevo oficio\");</script>";
	header("refresh: 0; url=priv/AdminUsers.php");    
}      
?>