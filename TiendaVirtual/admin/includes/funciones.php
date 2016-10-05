<?php

function grabarProducto(){
	include_once './includes/producto.class.php';
	require_once("./includes/postClass.php");
	$thisPost = new Post_Block;
	if ($thisPost->postBlock($_POST['postID'])) {
		$producto = new Producto($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["categoria"]);
		var_dump($_POST);
		$producto->id = $_POST["productId"];
		$producto->salvar();
	    // No existe doble post
	    // Procesamos la información
	} 
}
?>