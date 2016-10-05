<?php
if (isset($_POST['comunidad'])) {
	obtenerProvincias($_POST['comunidad']);
}
if (isset($_POST['provincia'])) {
	obtenerCiudades($_POST['provincia']);
}
function obtenerProvincias($comunidad) {

	include_once './conexion.php';
	echo "Provincias: <select type='text' id='provincia' >";
	
	//hago la consulta
	$consulta = "select * from provincias where comunidad_id=".$comunidad;
	$conexion = conectar();
	$resultado= $conexion->query($consulta);
	
	
		while ($fila = $resultado->fetch_assoc()) {
			echo "<option value='0'>-------------</option>";
			echo "<option value='".$fila['id']."' >".utf8_encode($fila['provincia'])."</option>";
		}

}

function obtenerCiudades($provincia) {
echo "provincia".$provincia;
	include_once './conexion.php';
	echo "Ciudades: <select type='text' id='ciudad' >";
	
	//hago la consulta
	$consulta = "select * from provincias where provincia_id=".$provincia;
	echo $consulta;
	$conexion = conectar();
	$resultado= $conexion->query($consulta);
	
	
		while ($fila = $resultado->fetch_assoc()) {
			echo "<option value='0'>-------------</option>";
			echo "<option value='".$fila['id']."' >".utf8_encode($fila['municipio'])."</option>";
		}

}
?>