<?php
if (isset($_GET['comunidad'])) {
	obtenerProvincias($_GET['comunidad']);
}
if (isset($_GET['provincia'])) {
	obtenerMunicipios($_GET['provincia']);
}

function obtenerProvincias($comunidad){
	//realizo la conexión con la bbdd
	$mysqli = new mysqli("localhost", "root", "", "municipios");
	//hago la consulta
	$consulta = "select * from provincias where comunidad_id=".$comunidad;

	
	if ($resultado= $mysqli->query($consulta)){
		echo 'Provincia: <select name="provincia" id = "provincia" onChange="cargarMunicipio()">';
		echo '<option value="0">----------------</option>';
		while ($fila = $resultado->fetch_assoc()) {
			//<option value="4744">Olejua</option>
			echo '<option value="'.$fila['id'].'">'.utf8_encode($fila['provincia']).'</option>';
			var_dump($fila);
		}
		echo '</select>';
	}
}	
	function obtenerMunicipios($provincia){
		//realizo la conexión con la bbdd
		$mysqli = new mysqli("localhost", "root", "", "municipios");
		//hago la consulta
		$consulta = "select * from municipios where provincia_id=".$provincia;
       
		
		if ($resultado= $mysqli->query($consulta)){
			echo 'Municipio: <select name="municipio">';
		    echo '<option value="0">----------------</option>';
			while ($fila = $resultado->fetch_assoc()) {
				//<option value="4744">Olejua</option>
				echo '<option value="'.$fila['id'].'">'.utf8_encode($fila['municipio']).'</option>';
				var_dump($fila);
			}
			echo '</select>';
		}	

}

?>