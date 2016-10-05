<?php
	function conectar(){
		$conexion = new mysqli("localhost", "root", "", "municipios");

		return $conexion;
	}



?>