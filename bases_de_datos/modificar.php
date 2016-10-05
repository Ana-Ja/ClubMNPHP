<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar registros</title>
</head>
<body>
	<?php
		include './conexion.php';
		$bd = "webempresa";
		$conexion = conectar($bd);

		$updateUsuario= "UPDATE usuarios SET  nombre = 'luis' where id=3" ;
		echo $updateUsuario;
		$conexion->query($updateUsuario);

		$conexion->close();
	?>
</body>
</html>