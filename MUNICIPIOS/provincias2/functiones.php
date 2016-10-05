<?php
obtenerProvincias($_GET['comunidad']);

function obtenerProvincias($comunidad){
	//realizo la conexión con la bbdd
	$mysqli = new mysqli("localhost", "root", "", "municipios");
	//hago la consulta
	$consulta = "select * from provincias where comunidad_id=".$comunidad;

	
	if ($resultado= $mysqli->query($consulta)){
		echo 'Provincia: <select name="provincia">';
		while ($fila = $resultado->fetch_assoc()) {
			//<option value="4744">Olejua</option>
			echo '<option value="'.$fila['id'].'">'.utf8_encode($fila['provincia']).'</option>';
			var_dump($fila);
		}
		echo '</select>';
	}

}

?>