<?php
function conectar(){
	$servidorBD = "localhost";
	$usuarioBD = "root";
	$passBD = "";
	$bd = "municipios";
	$conexion = new mysqli($servidorBD, $usuarioBD, $passBD, $bd);
	return $conexion;
}

?>