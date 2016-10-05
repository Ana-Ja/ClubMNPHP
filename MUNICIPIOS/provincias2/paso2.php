<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	</head>
<body>
	<form action="paso3.php">
	<?php
		//realizo la conexión con la bbdd
		$mysqli = new mysqli("localhost", "root", "", "municipios");
		
		//hago la consulta
		$consulta = "select * from provincias where comunidad_id=".$_GET['comunidad'];

		
		if ($resultado= $mysqli->query($consulta)){

			echo 'Provincia: <select name="provincia" id="provincia">';
			echo '<option value="0">--------</option>';
			while ($fila = $resultado->fetch_assoc()) {
				//<option value="4744">Olejua</option>
				echo '<option value="'.$fila['id'].'">'.utf8_encode($fila['provincia']).'</option>';
				var_dump($fila);
			}
			echo '</select>';
		}
	?>
	<input type="submit" value="Siguiente Paso">
	</form>
	
		
</body>
</html>