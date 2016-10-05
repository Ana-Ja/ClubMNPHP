<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activacion de registro</title>
</head>
<body>
	<?php
		include './includes/conexion.php';
		$id = $_GET["id"];
		$ref = $_GET['ref'];
		$conexion = conectar();
echo "SSSS";
		//obtengo la referencia del usaurio con ese correo
			$usuarioSelect = "Select token from usuarios where id = '".$id."'";
			$resultado = $conexion->query($usuarioSelect);
			$usuario = $resultado->fetch_assoc();
			$refUsuario = $usuario['token'];
			//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
			//la validación es correcta

			if ($ref==$refUsuario){
				$usuarioUpdate = "update usuarios set estado=1 where id='".$id."'";
				if ($conexion->query($usuarioUpdate)){

					$_SESSION['idLogeado']=$id;
					echo "<script>window.location ='./muro.php';</script>";

					echo "usuario activado";
				}
			}else{
				echo "Se ha producido un error al activar el usuario";
			}

	?>
</body>
</html>