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
		echo "correo :". $correo;
		$bd = "webempresa";
		$conexion = conectar($bd);

		$updateUsuario= "UPDATE usuarios SET  estado = 1 where correo='".$correo."'" ;
		echo $updateUsuario;
		$conexion->query($updateUsuario);

		$conexion->close();
	?>
</body>
</html>