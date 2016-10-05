<?php
	$funcion = $_POST["funcion"];
	call_user_func($funcion, $_POST);

	function contarMunicipios() {
		include "conexion.php";
		$conexion = conectar();
		
		echo $fila["numMunicipios"];
	}
	function obtenerMunicipios() {
		$pagina =$_POST["pagina"];
		$items_per_pagina =$_POST["items_per_pagina"];
		$offset= ($pagina-1)* $items_per_pagina ;
		include "conexion.php";
		$conexion = conectar();

		$filastotales = "Select count(*) as numMunicipios from municipios";
		$resultado = $conexion->query($filastotales);
		$fila = $resultado->fetch_assoc();
		//$npaginas = ($resultado->fetch_assoc())/$items_per_pagina ;
		

		//limit tiene dos parametros
		//1.- offset: desplazamiento, a partir del cual
		//2. cuantos cada vez
		$municipiosSelect = "Select * from municipios limit ".$offset.",".$items_per_pagina;
		$resultado = $conexion->query($municipiosSelect);
		$arrayMunicipios = array();
		array_push($arrayMunicipios, $fila); //pongo en la 1 pos del arrya el nº de municipios
		while ($fila = $resultado->fetch_assoc()){
			$fila = array_map("utf8_encode", $fila);
			array_push($arrayMunicipios, $fila);

		}
		echo json_encode( $arrayMunicipios);

	}

?>