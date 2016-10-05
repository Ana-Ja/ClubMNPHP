<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<div>
		Nombre: <input type="text" name="nombre" />
		</div>
		<div>
		Apellidos: <input type="text" name="apellidos" />
		</div>
		<div>
		Correo: <input type="text" name="correo" />
		</div>
		<div>
		Contraseña: <input type="password" name="pass1" />
		</div>
		<div>
		Repite contraseña: <input type="password" name="pass2" />
		</div>
		<div>
		<input type="submit" name="registrar" value="Registrar" />
		</div>
	</form>

	<?php
		if (isset($_POST['registrar'])){
			//valido que las dos contraseñas sean iguales
			if ($_POST['pass1']==$_POST['pass2']){
				//inserto el usuario en la base de datos
				$time = md5(time());
				$insertarUsuario = "insert into usuarios (nombre, apellidos, correo, pass, token) ".
						"VALUES ('".$_POST['nombre']."', '".$_POST['apellidos']."', '".$_POST['correo']."','".md5($_POST['pass1'])."','".$time."')";
				
				include './conexion.php';

				$conexion = conectar();

				//primero miro que la cuenta de correo no exista
				$buscarUsuario = "select id from usuarios where correo='".$_POST['correo']."'";
				
				$resultado = $conexion->query($buscarUsuario);
				//echo $buscarUsuario;
				if ($resultado->num_rows==0){
					if ($conexion->query($insertarUsuario)){
						$idUsuario = $conexion->insert_id;
						echo "registrado correctamente";

						//tendré que mandar el correo de activación
						include './funciones.php';
						$de = array("registro@miweb.com","Registro Web");
						$a = array($_POST['correo'],$_POST['nombre']);
						$asunto = "Nuevo registro";
						$mensaje = "Gracias por registrarte, para activar el usaurio pulsa en el siguiente enlace <a href='http://localhost/facebu/activar.php?id=".$idUsuario."&token=".$time."'>Activar usuario</a>";
						echo $mensaje;
						if (mandarCorreo($de, $a, $asunto, $mensaje)==1){
							echo "se ha enviado correctamente";
						}else{
							echo "no se ha mandado el correo de activación ";
						}
					}
				}else{
					echo "ya existe un usuario con esa cuenta de correo";
				}

				$conexion->close();
			}
		}

	?>
</body>
</html>