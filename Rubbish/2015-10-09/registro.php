<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

		//if (!isset($_POST["Registrar"])){
	?>
	<form action="" method="POST">
	<div>
		Usuario<input type="text" name="login" placeholder="Introduce tu usuario" value= "<?php echo isset($_POST["login"]) ? $_POST["login"]: "" ?> " />
	</div>	
	<div>
		Correo<input type="text" name="correo" value= "<?php echo isset($_POST["correo"]) ? $_POST["correo"]: "" ?> " />
	</div>		
	<div>
		Contraseña<input type="password" name="pass1" />
	</div>	
		Repetir Contraseña<input type="password" name="pass2" />
	<div>		
		<input type="submit" value="Acceder" name="Registrar"/>
	</div>	
	</form>
<?php
	//}
	include './conexion.php';
	include './enviarCorreo.php';
	$bd = "webempresa";
	$conexion = conectar($bd);
	if (isset($_POST["Registrar"])) {
		if ($_POST["login"]!= "" && $_POST["correo"]!= "" && $_POST["pass1"]!= "") { 
			if ($_POST["pass1"]== $_POST["pass2"]) { 
				//miro que la cuenta de usuaruoi no exista duplicado
				$buscarUsuario = "Select id from usuarios where correo = '".$_POST["correo"]."'";
				$insertUsuario = "insert into usuarios (nombre, correo, pass, estado) VALUES ('".$_POST["login"]."','".$_POST["correo"]."','".$_POST["pass1"]."','0')";
				echo $insertUsuario;
				$resultado = $conexion->query($buscarUsuario);
				if ($resultado->num_rows==0){
					if ($conexion->query($insertUsuario) === true) {
						echo "Insertado con exito<br/>";
						$de = array("jarauta.ana@gmail.com", "registro web");
						$a = array($_POST["correo"], $_POST["login"]);
						$asunto= "Nuevo registro";
						$mensaje= "Pinche en este enlace para activar su cuenta <br/>"
						."<a href='http://localhost/ANA/Correos/activacion.php?correo=".$_POST["correo"].">Activar</a>";
						echo "<br/>".$mensaje;
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