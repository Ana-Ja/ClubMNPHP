<?php
define('BD_SERVIDOR' , "localhost");
define('BD_USUARIO' , "root");
define('BD_PASS' , "");
define('BD_NAME' , "facebu");
function conectar() {
	$conexion = new mysqli(BD_SERVIDOR, BD_USUARIO,BD_PASS, BD_NAME);
	//mysqli_set_charset('utf8');
	//echo  "conexion".$conexion;
	 if ($conexion == false){
	 	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
	 } 
	return $conexion ;
}

?>