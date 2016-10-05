<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		include './conexion.php';
		$bd = "webempresa";
		$conexion = conectar($bd);
		$insertUsuario = "insert into usuarios (nombre, usuario, pass) VALUES ('pepe', 'pepe',1234')";
		if ($conexion->query($insertUsuario) === true) {
			echo "Insertado con exito";
	     } else {
	     	echo "Error en la inserccion";
	     }		



	?>
</body>
</html>