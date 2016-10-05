<?php

    $funcion = $_POST["funcion"];

	//esta funcion me ejecuta la funcion que vien por 1 argumento, 
	//con los argumentos que vienen en el array del 2 argumento
    call_user_func($funcion, $_POST);

	function obtenerCategorias($array) {
		include_once './conexion.php';
		//echo "Provincias: <select type='text' id='provincia' >";
		
		//hago la consulta
		$consulta = "select * from categorias ";
		$conexion = conectar();
		$resultado= $conexion->query($consulta);
		
		$array_categorias = array();
			while ($fila = $resultado->fetch_assoc()) {
				//antes de meter al array las filas, les aplico la funcion utf9 para quitar acentos
				//que dan problemas en json_encode
				$fila = array_map("utf8_encode", $fila);
				array_push($array_categorias, $fila);
			}
			echo json_encode($array_categorias);
	}
	function listaProductos($array)  {
		include "producto.class.php";
		$num_pagina = $array["num_pagina"];
		$num_elementos = $array["num_ele"];
		$resultado = Producto::obtenerProductos($num_pagina,$num_elementos);
		//var_dump( $resultado);
		echo json_encode($resultado);
		//hago la consulta
	}

	
?>

