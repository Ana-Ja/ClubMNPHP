<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activacion de contraseña</title>
</head>
<body>
	
	<?php
		include './conexion.php';
		$conexion = conectar();
		if (!isset($_POST["Recuperar"])) {
			$mail = $_GET["mail"];
			$ref = $_GET['ref'];
			echo "correo :". $mail;
		

		//obtengo la referencia del usaurio con ese correo
			$usuarioSelect = "Select id,token, fechaSolicitud from usuarios where mail = '".$mail."'";
			$resultado = $conexion->query($usuarioSelect);
			$usuario = $resultado->fetch_assoc();
			$refUsuario = $usuario['token'];
			$id = $usuario['id'];
			//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
			//la validación es correcta
			//compruebo que no han pasado dos horas
			$fechaSolicitud2 =  strtotime($usuario['fechaSolicitud'])+ ( 120 * 60);
			$fechaSolicitud =  strtotime($usuario['fechaSolicitud']);
			echo "Fecha solicitud ".strtotime($usuario['fechaSolicitud']);
			echo "Fecha solicitud +120===".$fechaSolicitud2;
			if ($fechaSolicitud>$fechaSolicitud2){
				echo "Su enlace ha caducado";
			}else{
		?>
			<form action="" method="POST">
			<div>
				Contraseña<input type="password" name="pass1" />
			</div>	
				Repetir Contraseña<input type="password" name="pass2" />
			<div>		
				<input type="submit" value="Recuperar" name="Recuperar"/>
			</div>	
			</form>
		<?php	
				if (isset($POST['Recuperar'])) {
					if ($ref==$refUsuario){
						$usuarioUpdate = "update usuarios set pass='".$_POST['pass']."' where id='".$id."'";
						echo $usuarioUpdate ;
						if ($conexion->query($usuarioUpdate)){
							echo "Contraseña modificada";
						}
					}else{
						echo "Se ha producido un error al activar el usuario";
					}
				}
			
			}
		}	

		?>
</body>
</html>




