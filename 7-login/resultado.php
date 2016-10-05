<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		//obtengo los datos del formulario
		$usuario = $_GET['login'];
		$pass = $_GET['password'];	

		if ($usuario == "user" && $pass=="1234"){
			echo "Hola ".$usuario." bienvenido a casa!!!";
		}else{
			echo "Los datos no son correctos";
		}

	?>
</body>
</html>