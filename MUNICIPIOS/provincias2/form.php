<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	</head>
<body>
	<form action="paso2.php">
	<?php
		//realizo la conexión con la bbdd
		$mysqli = new mysqli("localhost", "root", "", "municipios");
		
		//hago la consulta
		$consulta = "select * from comunidades";

		
		if ($resultado= $mysqli->query($consulta)){

			echo 'Comunidad: <select name="comunidad" id="comunidad" onChange="cargarProvincia()">';
			echo '<option value="0">--------</option>';
			while ($fila = $resultado->fetch_assoc()) {
				//<option value="4744">Olejua</option>
				echo '<option value="'.$fila['id'].'">'.utf8_encode($fila['comunidad']).'</option>';
				var_dump($fila);
			}
			echo '</select>';
		}
	?>
	<input type="submit" value="Siguiente Paso">
	</form>
	
		
</body>
</html>