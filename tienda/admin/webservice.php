<?php
	$funcion = $_POST['funcion'];
	call_user_func($funcion, $_POST);

	function obtenerCategorias($array){
		
		$categoriasSelect = "Select * from categorias ";
		//echo $categoriasSelect;

		include '../includes/conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($categoriasSelect);

		$arrayCategorias = array();
		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode",$fila);
			//var_dump($fila);
			array_push($arrayCategorias, $fila);
		}
		$conexion->close();
		echo json_encode($arrayCategorias);
	}

	function obtenerProductos($array){
		$categoriasSelect = "Select productos.id, productos.nombre as nombreProducto, precio, categorias.nombre as nombreCategoria from productos inner join categorias on productos.id_categoria = categorias.id";
		//echo $categoriasSelect;

		include '../includes/conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($categoriasSelect);

		$arrayProductos = array();
		while ($fila = $resultado->fetch_assoc()) {
			$fila = array_map("utf8_encode",$fila);
			//var_dump($fila);
			array_push($arrayProductos, $fila);
		}
		$conexion->close();
		echo json_encode($arrayProductos);
	}

	function obtenerProductos2($array){
		include '../clases/Producto.php';
		$productos = Producto::obtenerProductos();
		//var_dump($productos);
		echo json_encode($productos);
	}


?>