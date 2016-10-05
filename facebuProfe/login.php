<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="correo" />
		<input type="text" name="pass" />
		<input type="submit" name="Login" value="Login" />

	</form>

	<?php
	if (isset($_POST['Login'])){
		include './conexion.php';

		$conexion = conectar();

		$correoUsuario = $_POST['correo'];
		$passUsuario = md5($_POST['pass']);

		//ejecuto la consulta y vuelco los datos en la variable resultado
		$consulta = "Select * from usuarios where correo='".$correoUsuario."'";
		//echo $consulta;
		$resultado = $conexion->query($consulta);

		$usuario = $resultado->fetch_assoc();

		if($usuario['estado']==0){
			echo "El usuario está desactivado";
		}else if ($usuario!=null && $usuario["pass"]==$passUsuario){
			$_SESSION['usuarioId'] = $usuario['id'];
			echo "OK <a href='./perfil.php'>Mi perfil</a>";
		}else{
			echo "error";
		}
	}

	?>
</body>
</html>