<?php
	$funcion = $_POST['funcion'];
	call_user_func($funcion, $_POST);

	function obtenerProvincias($array){
		$idComunidad = $array['idComunidad'];

		$provinciasSelect = "Select * from provincias where comunidad_id=".$idComunidad;
		//echo $provinciasSelect;

		include './conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($provinciasSelect);

		$arrayProvincias = array();
		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode",$fila);
			//var_dump($fila);
			array_push($arrayProvincias, $fila);
		}
		$conexion->close();
		echo json_encode($arrayProvincias);
	}

	function obtenerMunicipios($array){
		$idProvincia = $array['idProvincia'];

		$provinciasSelect = "Select * from municipios where provincia_id=".$idProvincia;
		//echo $provinciasSelect;

		include './conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($provinciasSelect);

		$arrayMunicipios = array();
		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode",$fila);
			//var_dump($fila);
			array_push($arrayMunicipios, $fila);
		}
		$conexion->close();
		echo json_encode($arrayMunicipios);
	}

	function obtenerMunicipio($array){
		$idMunicipio = $array['idMunicipio'];

		$municipioSelect = "Select municipio, latitud, longitud from municipios where id=".$idMunicipio;
		include './conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($municipioSelect);

		$municipio = $resultado->fetch_assoc();
		$municipio = array_map("utf8_encode",$municipio);

		echo json_encode($municipio);

	}


?>