<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activacion de registro</title>
</head>
<body>
	<?php
		include './conexion.php';
		$correo = $_GET["correo"];
		$ref = $_GET['ref'];
		echo "correo :". $correo;
		$bd = "webempresa";
		$conexion = conectar($bd);

		//obtengo la referencia del usaurio con ese correo
			$usuarioSelect = "Select activationCode from usuarios where correo = '".$correo."'";
			$resultado = $conexion->query($usuarioSelect);
			$usuario = $resultado->fetch_assoc();
			$refUsuario = $usuario['activationCode'];

			//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
			//la validación es correcta

			if ($ref==$refUsuario){
				$usuarioUpdate = "update usuarios set estado=1 where correo='".$correo."'";
				if ($conexion->query($usuarioUpdate)){
					echo "usuario activado";
				}
			}else{
				echo "Se ha producido un error al activar el usuario";
			}

	?>
</body>
</html>