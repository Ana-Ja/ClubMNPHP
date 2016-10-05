<?php
if (isset($_POST['comunidad'])) {
	obtenerProvincias($_POST['comunidad']);
}
function obtenerProvincias($_POST['comunidad']) {

	include_once './conexion.php';
	
	
	//hago la consulta
	$consulta = "select * from provincias where comunidad_id=".$_POST['comunidad'];
	$conexion = conectar();
	$resultado= $conexion->query($consulta);
	
	
		while ($fila = $resultado->fetch_assoc()) {
			echo "<option value='0'>--------</option>";
			echo "<option value='".$fila['id']."' >".utf8_encode($fila['provincia'])."</option>";
		}

}


?>