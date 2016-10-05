<?php
define('BD_SERVIDOR' , "localhost");
define('BD_USUARIO' , "root");
define('BD_PASS' , "");
function conectar($bd) {
	$conexion = new mysqli(BD_SERVIDOR, BD_USUARIO,BD_PASS, $bd);
	//echo  "conexion".$conexion;
	 if ($conexion != null){
	 	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
	 } 
	return $conexion ;
}

?>