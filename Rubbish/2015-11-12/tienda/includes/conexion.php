<?php
function conectar(){
	$servidorBD = "localhost";
	$usuarioBD = "root";
	$passBD = "";
	$bd = "tienda";
	$conexion = new mysqli($servidorBD, $usuarioBD, $passBD, $bd);
	return $conexion;
}

?>