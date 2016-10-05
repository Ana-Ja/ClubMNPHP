<?php
// if (isset($_POST['comunidad'])) {
// 	obtenerProvincias($_POST['comunidad']);
// }
if (isset($_POST['provincia'])) {
	obtenerCiudades($_POST['provincia']);
}

$funcion = $_POST["funcion"];

	//esta funcion me ejecuta la funcion que vien por 1 argumento, 
	//con los argumentos que vienen en el array del 2 argumento
    call_user_func($funcion, $_POST);

function obtenerProvincias($array) {
	$comunidad = $array['comunidad'];
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

function obtenerCiudades($array) {
	$provincia = $array['provincia'];
	include_once './conexion.php';
	echo "Ciudades: <select type='text' id='ciudad' >";
	
	//hago la consulta
	$consulta = "select * from municipios where provincia_id=".$provincia;
	$conexion = conectar();
	$resultado= $conexion->query($consulta);
	
	
		while ($fila = $resultado->fetch_assoc()) {
			echo "<option value='0'>-------------</option>";
			echo "<option value='".$fila['id']."' >".utf8_encode($fila['municipio'])."</option>";
		}

}
?>