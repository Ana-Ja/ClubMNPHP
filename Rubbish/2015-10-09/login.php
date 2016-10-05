<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	//if (!isset($_POST["enviar"])){
?>
	<form action="" method="POST">
		Usuario<input type="text" name="usuario" placeholder="Introduce tu usuario"/>
		Contraseña<input type="password" name="pass" />
		<input type="submit" value="Acceder" name="enviar"/>
	</form>
<?php
	//}

	//pregunto si he apretado el botón de enviar 
	if (isset($_POST["enviar"])){


	//conexion a la base de datos
	include './conexion.php';
	$bd = "webempresa";
	$conexion = conectar($bd);

	// if ($conexion === false){
	// 	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
	// } 
	$usuario = $_POST["usuario"];
	$pass_usu = $_POST["pass"];
	
	$consulta = "select usuario, pass from usuarios where usuario = '".$usuario."'";// and pass='".$pass_usu."'" ;
	echo $consulta."<br/>";
	if ($resultado =$conexion->query($consulta)) {; //el rdo es un array con las filas en un array
		if ($resultado->num_rows > 0 ){
			//leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
			$fila= $resultado->fetch_assoc();
			if ($fila["pass"] === $pass_usu) {
				echo "Bienvenido " ;
			} else {
				echo "Usuario o Contraseña no valida " ;
			}
			// while ($fila= $resultado->fetch_assoc()) {
			// 	if (($fila["usuario"] === $_POST["usuario"])  && ($fila["password"] === $_POST["password"])){
			// 		$encontrado=true;
			// 		break;
			// 	}
			// }
			//echo $encontrado ? "Usuario encontrado":"Usuario inexistente";
			$resultado->close();	
		} else {
				echo "Usuario no encontrado.";
			}	
	} else {
		echo "Error: No fue posible ejecutar la consulta $consulta ". $conexion->error;
	}	
	$conexion->close();	

	}		
?>
	
</body>
</html>