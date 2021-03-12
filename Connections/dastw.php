<?php
$hostname_dastw = "localhost";//para la coneccion hacia la base de datos
$database_dastw = "proyecto";
$username_dastw = "root";
$password_dastw = "";
$conexion = mysqli_connect($hostname_dastw, $username_dastw, $password_dastw) or trigger_error(mysql_error(),E_USER_ERROR); 

?>