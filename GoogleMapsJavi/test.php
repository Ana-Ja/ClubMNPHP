<?php
	
		$idComunidad = 7;

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

		echo json_encode($arrayProvincias);



	


?>