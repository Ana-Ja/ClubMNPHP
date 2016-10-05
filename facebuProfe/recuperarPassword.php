<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		Introduce correo para recueprar contraseña
		<input type="text" name="correo" />
		<input type="submit" name="recuperar" value="Recuperar Contraseña">
	</form>


	<?php
	if (isset($_POST['recuperar'])){
		include './conexion.php';
		$usuarioSelect = "select * from usuarios where correo = '".$_POST['correo']."'";
		$conexion = conectar();

		$resultado = $conexion->query($usuarioSelect);

		$usuario = $resultado->fetch_assoc();

		$token = md5(time());
		//obtengo la fecha actual para saber cuando ha pedido la contraseña
		//pasadas dos horas el enlace caducará.
		$fecha = date("Y-m-d H:i:s");

		$usuarioUpdate = "UPDATE usuarios set fechaSolicitud = '".$fecha."', token='".$token."' where id=".$usuario['id'];

		$conexion->query($usuarioUpdate);

		$mensaje = "Pulsa en este enlace para recuperar la contraseña. <a href='http://localhost/facebu/recuperarContrasena2.php?id=".$usuario['id']."&token=".$token."'>Recuperar</a>";
		include './funciones.php';
		$de = array("recuperarpass@miweb.com","Recuperar contraseña");
		$a = array($_POST['correo'],'');
		$asunto = "Contraseña olvidada";
		echo $mensaje;
		if (mandarCorreo($de, $a, $asunto, $mensaj1){e)==
			echo "se ha enviado correctamente";
		}else{
			echo "no se ha mandado el correo de activación ";
		}


	}
	?>
</body>
</html>