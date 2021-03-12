<?php
$conn=mysqli_connect("localhost","root","","proyecto");

$nombre=$_POST["nombre"];
$ap=$_POST["ap"];
$am=$_POST["am"];
$sexo=$_POST["sexo"];
$correo=$_POST["correo"];
$pass=$_POST["pass"];
$privilegio=$_POST["privilegio"];

$consulta="select * from usuarios";
$resultado=mysqli_query($conn,$consulta);
$i=0; $j=0;
while($lista=mysqli_fetch_array($resultado)){
	if($lista["correo"]==$correo){
		$i++;
	}
	if ($lista["nombre"]==$nombre) {
		$j++;
	}
}
if($i==0){
	if ($j==0) {
		$consulta2="INSERT INTO `usuarios`(`nombre`, `apellidoP`, `apellidoM`, `sexo`, `contrasena`, `correo`, `tipoU`) VALUES ('".$nombre."', '".$ap."', '".$am."', '".$sexo."','".$pass."','".$correo."',".$privilegio.");";
		$resultado2=mysqli_query($conn,$consulta2);

		echo "<script type=\"text/javascript\">alert(\"Se agrego satisfactoriamente el nuevo usuario\");</script>";
		header("refresh: 0; url=priv/AdminUsers.php");
	}else{
		echo "<script type=\"text/javascript\">alert(\"Ya existe un usuario con ese nombre\");</script>";
		header("refresh: 0; url=priv/AdminUsers.php");
	}
}else{
	echo "<script type=\"text/javascript\">alert(\"Ya existe un usuario con ese correo\");</script>";
	header("refresh: 0; url=priv/AdminUsers.php");
}
?>