<?php
function __autoload($clase){
	include_once $_SERVER['DOCUMENT_ROOT'].'/tienda/clases/Producto.php';
}

	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'].'/tienda/clases/Carrito.php';
	include_once $_SERVER['DOCUMENT_ROOT']."/tienda/clases/Producto.php";
		
	if (isset($_GET['productoId'])){
		
		$producto = Producto::getProductoById($_GET['productoId']);

		//si es el primer producto, no existe en carrito en la sessión
		if (isset($_SESSION['carrito'])){
			$carrito = unserialize($_SESSION['carrito']);
		}else{
			$carrito = new Carrito();
		}
		
		$carrito->anadirProducto($producto);
		//var_dump($carrito);
		$_SESSION['carrito'] = serialize($carrito);

	}

	header ('Location:http://localhost/tienda');

?>