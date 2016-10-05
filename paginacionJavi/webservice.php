<?php
	$funcion = $_POST["funcion"];

	call_user_func($funcion,$_POST);
	

	function obtenerMunicipios($array){
		include_once 'conexion.php';
		$offset = ($array['pagina']-1)*$array['items_por_pagina'];
		$items = $array['items_por_pagina'];

		$municipiosCount = "Select Count(*) as numMunicipios from municipios";
		$conexion = conectar();
		$resultado = $conexion->query($municipiosCount);

		$fila = $resultado->fetch_assoc();
		

		$municipiosSelect = "Select * from municipios limit ".$offset.", ".$items;

		$resultado = $conexion->query($municipiosSelect);
		$arrayMunicipios = array();
		array_push($arrayMunicipios, $fila);

		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode",$fila);
			array_push($arrayMunicipios, $fila);
		}

		echo json_encode($arrayMunicipios);

	}



?>