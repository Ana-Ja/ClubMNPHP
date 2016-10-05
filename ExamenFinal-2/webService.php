<?php

    $funcion = $_POST["funcion"];
    call_user_func($funcion, $_POST);

	function ObtenerPaquetes($array) {
		$hotel = $array['hotel'];
		include_once './conexion.php';
		
		//hago la consulta
		$consulta = "select idHotel, idPaquete, ndias, nombre from hotelpaquetes, paquetes where idHotel=".$hotel. " and hotelpaquetes.idPaquete= paquetes.id";
		$conexion = conectar();
		$resultado= $conexion->query($consulta);
		
		$array_paquetes = array();
		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode", $fila);
			array_push($array_paquetes, $fila);
		}
		echo json_encode($array_paquetes);
	}
?>