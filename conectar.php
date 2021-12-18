<?php
	$localhost="localhost";
	$root="root";
	$clave="";
	$baseDeDatos="proyectounidad";
	$port="3360";
	$conexion = mysqli_connect($localhost, $root, $clave, $baseDeDatos,$port);
	if($conexion->connect_error) die ("Error en la conexion con el servidor");
	
?>