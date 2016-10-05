<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	if (!isset($_POST["enviar"])){
	?>
		<form action="" method="POST">
			Usuario<input type="text" name="login" placeholder="Introduce tu usuario"/>
			Contraseña<input type="password" name="password" />
			<input type="submit" value="Acceder" name="enviar"/>
		</form>
	<?php
	}
	?>

	<?php
		//pregunto si he apretado el botón de enviar 
		if (isset($_POST["enviar"])){
			//obtengo los datos del formulario
			$usuario = $_POST['login'];
			$pass = $_POST['password'];	

			if ($usuario == "user" && $pass=="1234"){
				echo "Hola ".$usuario." bienvenido a casa!!!";
			}else{
				echo "Los datos no son correctos";
			}
		}
		
	?>
</body>
</html>