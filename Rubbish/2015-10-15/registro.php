<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>

	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	
</head>
<body>
	<?php

		//if (!isset($_POST["Registrar"])){
	?>
	<form action="" method="POST">
	<div>
		Nombre<input type="text" name="nombre"  value= "<?php echo isset($_POST["nombre"]) ? $_POST["nombre"]: "" ?> " />
	</div>	
	<div>
		Apellidos<input type="text" name="apellidos" value= "<?php echo isset($_POST["apellidos"]) ? $_POST["apellidos"]: "" ?> " />
	</div>
	<div>
		Correo<input type="text" name="mail" value= "<?php echo isset($_POST["mail"]) ? $_POST["mail"]: "" ?> " />
	</div>		
	<div>
		Contraseña<input type="password" name="pass1" />
	</div>	
		Repetir Contraseña<input type="password" name="pass2" />
	<div>		
		<input type="submit" value="Registrarse" name="Registrar"/>
	</div>	
	<a href="./olvidopass.php">Pulse aqui si ha olvidado la contraseña </a><br/>
	<a href="./login.php">Inicio Sesion </a><br/>
	</form>
<?php
	//}
	include './conexion.php';
	include './enviarCorreo.php';
	$conexion = conectar();
	if (isset($_POST["Registrar"])) {
		if ($_POST["nombre"]!= "" && $_POST["mail"]!= "" && $_POST["pass1"]!= "") { 
			if ($_POST["pass1"]== $_POST["pass2"]) { 

				//inserto el usuario en la base de datos
				$time = md5(time());
				//miro que la cuenta de usuaruoi no exista duplicado
				$buscarUsuario = "Select id from usuarios where mail = '".$_POST["mail"]."'";
				$insertUsuario = "insert into usuarios (nombre,apellidos, mail, pass, token) VALUES 
					('".$_POST["nombre"].					
					"','".$_POST["apellidos"].	
					"','".$_POST["mail"].
					"','".$_POST["pass1"].
					"','".$time."')";
				echo $insertUsuario;
				echo $buscarUsuario;
				$resultado = $conexion->query($buscarUsuario);
				if ($resultado->num_rows==0){
					if ($conexion->query($insertUsuario) === true) {
						echo "Insertado con exito<br/>";
						//con esto recupero el id del registro insertado. Tiene que preguntarse justo despues del insert
						$id = $conexion->insert_id;   //devileve 0 si no se ha insertado nada
						$de = array("jarauta.ana@gmail.com", "registro web");
						$a = array($_POST["mail"], $_POST["nombre"]);
						$asunto= "Nuevo registro";
						$mensaje= "Pinche en este enlace para activar su cuenta <br/><a href='http://localhost/ANA/Facebu/activacion.php?mail=".$_POST["mail"]."&ref=".$time."'>Activar usuario</a>";
						//var_dump($a);
						echo (enviarCorreo($de, $a, $asunto, $mensaje) ==1) ? "<br/>Enviado correctamente": "<br/>Problemas en el envio de correo";

					}	
			    } else {
			     	echo "Ya existe un usuario con esa cuenta de usuario";
			    }	
			    
			    $conexion->close();	
			} else {
			     echo "No coinciden las contraseñas";	
			}
		} else {
		     	echo "Faltan datos";	
		}
	}
	

?>
</body>
</html>
</body>
</html>