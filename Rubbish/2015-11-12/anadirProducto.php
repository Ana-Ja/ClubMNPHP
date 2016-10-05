<?php
	session_start();
	echo "Estoy";
	if (isset($_GET["productoId"])) {
		include_once './admin/includes/producto.class.php';
		include_once './admin/includes/carrito.class.php';
		$producto= Producto::getProductoById($_GET["productoId"]);
		//si es e primer producto, no existe en carrito en la se3sion
		if (isset($_SESSION["carrito"])) {
			$carrito = unserialize($_SESSION["carrito"]);
		} else {
			$carrito = new Carrito();
		}
		
		$carrito->anadirProducto($producto);
		$_SESSION["carrito"]= serialize($carrito);
		var_dump($_SESSION);
	}
	var_dump($carrito);
	//despues de añadir elproducto le redirecciono al index otra vez de la pagian
	header("Location:http://localhost/ANA/TiendaVirtual");
?>