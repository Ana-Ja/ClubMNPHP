
<?php	
		include './includes/conexion.php';
		$conexion = conectar();
		$idAmigo = $_GET["idAmigo"];
		$idSolicitante = $_GET["idSolicitante"];
		$token = $_GET['token'];
		echo "<br/>token :". $token;
	

	//obtengo la referencia del usaurio con ese correo
		$contactoSelect = "Select token from contactos where idAmigo = ".$idAmigo." AND idSolicitante=".$idSolicitante;
		$resultado = $conexion->query($contactoSelect);
		$contacto = $resultado->fetch_assoc();
		$tokenUsuario = $contacto['token'];
		echo $contactoSelect;
		echo "<br/>tokenContacto :".$tokenUsuario;
		
			if ($token==$tokenUsuario){
					//compruebo el token que va por la url con la que tiene ese 
					//usuario en la bd pq  en la url pueden cambiar el id y poner 1 que suele ser el administrador
					//y ten estan cambiando la bd del admin
					    $fechaAceptacion = date('Y-m-d H:i:s', time());
						$contactoUpdate = "update contactos set fechaAceptacion='".$fechaAceptacion.
						"' where idAmigo=".$idAmigo." AND idSolicitante=".$idSolicitante;
						echo $contactoUpdate ;
						if ($conexion->query($contactoUpdate)){
							header('Location: ./login.php?redirectTo=index.php');
							//echo "Su contraseña ha sido modificada correctamente.";
							//echo "<br/><a href='http://localhost/ANA/Facebu/plantilla/login.php'>Pinche en este enlace para loggearse </a>";
						}
			}else{
				echo "No coinciden los token";	
			}
			
		
	
?>


<?php
      include './bloques/pie.php';
?>                      		