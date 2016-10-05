<?php
function conectar(){
	$servidorBD = "localhost";
	$usuarioBD = "root";
	$passBD = "";
	$bd = "facebu";
	$conexion = new mysqli($servidorBD, $usuarioBD, $passBD, $bd);
	return $conexion;
}

?>