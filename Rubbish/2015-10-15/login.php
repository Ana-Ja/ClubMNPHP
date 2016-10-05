<?php session_start(); ?>
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
		Mail<input type="text" name="mail" placeholder="Introduce tu mail"/>
		Contraseña<input type="password" name="pass" />
		<input type="submit" value="Acceder" name="enviar"/>
	</form>
<?php
	//}

	//pregunto si he apretado el botón de enviar 
	if (isset($_POST["enviar"])){


	//conexion a la base de datos
	include './conexion.php';
	$conexion = conectar();

	// if ($conexion === false){
	// 	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
	// } 
	$mail = $_POST["mail"];
	$pass_usu = $_POST["pass"];
	
	$consulta = "select mail, pass from mails where mail = '".$mail."'";// and pass='".$pass_usu."'" ;
	echo $consulta."<br/>";
	if ($resultado =$conexion->query($consulta)) {; //el rdo es un array con las filas en un array
		if ($resultado->num_rows > 0 ){
			//leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
			$fila= $resultado->fetch_assoc();
			if ($fila["pass"] === $pass_usu) {
				echo "Bienvenido <a href='./perfil.php' > Mi perfil</a>".$mail ;
				$_SESSION['mailLogeado']=$mail;

			} else {
				echo "Mail o Contraseña no valida " ;
			}
			$resultado->close();	
		} else {
				echo "mail no encontrado.";
			}	
	} else {
		echo "Error: No fue posible ejecutar la consulta $consulta ". $conexion->error;
	}	
	$conexion->close();	

	}		
?>
	
</body>
</html>