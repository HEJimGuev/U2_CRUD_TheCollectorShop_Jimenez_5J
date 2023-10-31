<?php

/**
* mysql_connect está en desuso
* usando mysqli_connect en su lugar
 */

$Localhost = 'localhost';
$basededatosNombre = 'bdthecsjimenez';
$basededatosUsuario = 'root';
$basededatosContrasena = '';

$mysqli = mysqli_connect($Localhost, $basededatosUsuario, $basededatosContrasena, $basededatosNombre); 
	
?>
