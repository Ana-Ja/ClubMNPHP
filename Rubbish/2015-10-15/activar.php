<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	//obtengo el correo del usuario que quiero activar
	$id = $_GET['id'];
	$token = $_GET['token'];
	
	include './conexion.php';
	$conexion = conectar();

	//obtengo la referencia del usaurio con ese correo
	$usuarioSelect = "Select token from usuarios where id = '".$id."'";
	$resultado = $conexion->query($usuarioSelect);
	$usuario = $resultado->fetch_assoc();
	$tokenUsuario = $usuario['token'];

	//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
	//la validación es correcta

	if ($token==$tokenUsuario){
		$usuarioUpdate = "update usuarios set estado=1 where id='".$id."'";
		if ($conexion->query($usuarioUpdate)){
			echo "usuario activado";
		}
	}else{
		echo "Se ha producido un error al activar el usuario";
	}

	


	?>
</body>
</html>