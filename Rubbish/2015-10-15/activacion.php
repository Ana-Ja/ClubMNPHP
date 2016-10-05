<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activacion de registro</title>
</head>
<body>
	<?php
		include './conexion.php';
		$mail = $_GET["mail"];
		$ref = $_GET['ref'];
		echo "correo :". $mail;
		$conexion = conectar();

		//obtengo la referencia del usaurio con ese correo
			$usuarioSelect = "Select token from usuarios where mail = '".$mail."'";
			$resultado = $conexion->query($usuarioSelect);
			$usuario = $resultado->fetch_assoc();
			$refUsuario = $usuario['token'];

			//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
			//la validación es correcta

			if ($ref==$refUsuario){
				$usuarioUpdate = "update usuarios set estado=1 where correo='".$mail."'";
				if ($conexion->query($usuarioUpdate)){
					echo "usuario activado";
				}
			}else{
				echo "Se ha producido un error al activar el usuario";
			}

	?>
</body>
</html>