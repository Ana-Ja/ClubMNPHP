<?php
    session_start();
	include './includes/conexion.php';
	include './includes/funciones.php';
	estaLogeado();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
</head>
<body>
	<?php

	//conexion a la base de datos
	
	$conexion = conectar();

	$mail = $_POST["mail"];
	$pass_usu = $_POST["pass"];
	$consulta = "select id, mail, pass,nombre, apellidos,estado from usuarios where mail = '".$mail."'";// and pass='".$pass_usu."'" ;
	
	if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

		if ($resultado->num_rows > 0 ){
			//leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
			$fila= $resultado->fetch_assoc();
			if($fila['estado']==0){
				echo "El usuario está desactivado";
			}else if ($fila["pass"]==$pass_usu){
				$id = $fila["id"];
				//echo "Bienvenido <a href='./perfil.php' > Mi perfil</a>".$mail ;
				$_SESSION['idLogeado']=$id;
				echo "<strong>Bienvenido:</strong>";
				echo "<br/>Nombre: ".$fila['nombre'];
				echo "<br/>Apellidos: ".$fila['apellidos'];
				echo "<br/>Mail: ".$fila['mail'];
				echo "<a href='http://localhost/ANA/Facebu/muro.php'>Ir al muro</a>";
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

	
      
	?>
</body>
</html>