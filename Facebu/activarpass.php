<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activacion de contraseña</title>
</head>
<body>
	
			<form action="" method="POST">
			<div>
				Contraseña<input type="password" name="pass1" />
			</div>	
				Repetir Contraseña<input type="password" name="pass2" />
			<div>		
				<input type="submit" value="Recuperar" name="recupera"/>
			</div>	
			</form>
		<?php	
			if (isset($_POST['recupera'])) {
				include './includes/conexion.php';
				$conexion = conectar();
				$id = $_GET["id"];
				$token = $_GET['token'];
				echo "<br/>token :". $token;
			

			//obtengo la referencia del usaurio con ese correo
				$usuarioSelect = "Select token, fechaSolicitud from usuarios where id = '".$id."'";
				$resultado = $conexion->query($usuarioSelect);
				$usuario = $resultado->fetch_assoc();
				$tokenUsuario = $usuario['token'];
				echo "<br/>tokenUsuario :".$tokenUsuario;
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
					if ($token==$tokenUsuario){
						if (  $_POST["pass1"]!= "") { 
							//compruebo no solo la password, tb el token que va por la url con la que tiene ese 
							//usuario en la bd pq  en la url pueden cambiar el id y poner 1 que suele ser el administrador
							//y ten estan cambiando la bd del admin
							if ($_POST["pass1"]== $_POST["pass2"] && $_GET["token"]==$tokenUsuario ) { 
								$usuarioUpdate = "update usuarios set pass='".$_POST['pass1']."' where id='".$id."'";
								echo $usuarioUpdate ;
								if ($conexion->query($usuarioUpdate)){
									echo "Su contraseña ha sido modificada correctamente.";
									echo "<br/><a href='http://localhost/ANA/Facebu/login.php'>Pinche en este enlace para loggearse </a>";
								}
							}else{
								echo "No coinciden las contraseñas";	
							}
						} else {
						     	echo "Introduzca las contraseñas";	
						}		
					}else{
						echo "Se ha producido un error al activar el usuario";
					}

				}	
			}
			
		?>
</body>
</html>




