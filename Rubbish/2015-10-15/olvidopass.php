<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Olvido contraseña</title>
</head>
<body>
	<form action="" method="POST">
	<p>Introduzca su correo y le enviaremos un mail de activacion<p/>
	<div>
		Correo<input type="text" name="mail" value= "Introduzca su mail " />
	</div>	
	<div>		
		<input type="submit" value="Enviar" name="Registrar"/>
	</div>	
	</form>
	<?php
		//}
		include './conexion.php';
		include './enviarCorreo.php';
		$conexion = conectar();
		if (isset($_POST["Registrar"])) {
			if ( $_POST["mail"]!= "" ) { 
				

					//inserto el usuario en la base de datos
					$time = md5(time());
					//miro que la cuenta de usuaruoi no exista duplicado
					$buscarUsuario = "Select id, nombre from usuarios where mail = '".$_POST["mail"]."'";
					
					echo $buscarUsuario;
					$resultado = $conexion->query($buscarUsuario);
					if ($resultado->num_rows>0){
						$fila= $resultado->fetch_assoc();
						$nombre = $fila['nombre'];
						$id = $fila['id'];
						echo "Insertado con exito<br/>";
						$de = array("jarauta.ana@gmail.com", "cambio contraseña");
						$a = array($_POST["mail"],$nombre);
						$asunto= "Nuevo registro";
						$mensaje= "Pinche en este enlace para cambiar su contraseña <br/><a href='http://localhost/ANA/Facebu/activarpass.php?mail=".$_POST["mail"]."&ref=".$time."'>Activar contraseña</a>";
						//var_dump($a);
						if (enviarCorreo($de, $a, $asunto, $mensaje) ==1){
							echo "<br/>Enviado correctamente";
							$fechasolicitud = date('Y-m-d H:i:s', time());
							echo "FEca ".$fechasolicitud;
							$updateUsuario= "UPDATE usuarios SET  fechaSolicitud = '".$fechasolicitud."' where id=".$id ;
							echo $updateUsuario;
							$conexion->query($updateUsuario);

						} else {
							echo "<br/>Problemas en el envio de correo";
						}	
							

							
				    } else {
				     	echo "No existe un usuario con ese mail";
				    }	
				    
				    $conexion->close();	
				
			} else {
			     	echo "Faltan datos";	
			}
		}
		

	?>
</body>
</html>