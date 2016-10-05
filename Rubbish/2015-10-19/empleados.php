<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table>
<?php
	//conexion a la base de datos
	$servidor = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "webempresa";
	$conexion = new mysqli($servidor, $usuario, $pass, $bd);
	if ($conexion === false){
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
	} 
	$consulta = "select nombre, apellidos from empleados";
	if ($resultado =$conexion->query($consulta)) {; //el rdo es un array con las filas en un array
		if ($resultado->num_rows > 0 ){
			//saca las filas una por una
			while ($fila= $resultado->fetch_assoc(result)) {
				echo "<tr><td>".utf8_encode($fila["nombre"])."</td><td>".utf8_encode($fila["apellidos"])."</td></tr>";
			}
			$consulta->close();	
		else {
				echo "NO se encontró ningún registro que coincida con su busqueda.";
			}	
	} else {
		echo "Error: No fue posible ejecutar la consulta $sql ". $conexion->error;
	}	
	$conexion->close();			
?>
	
</body>
</html>