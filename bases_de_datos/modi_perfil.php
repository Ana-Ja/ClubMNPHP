<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<?php
		include './conexion.php';
		$bd = "webempresa";
		$conexion = conectar($bd);
		$id = 4;
		$buscar_datos = "Select nombre,correo, pass from usuarios where id=".$id  ;
		$resultado = $conexion->query($buscar_datos);
		if ($resultado->num_rows>0){
			$fila= $resultado->fetch_assoc();
			$nombre = $fila['nombre'];
			$correo = $fila['correo'];
			$pass = $fila['pass'];

		}	
		?>	
		<form action="" method="POST">
			<div>
				Usuario<input type="text" name="login" placeholder="Introduce tu usuario" value= "<?php echo $nombre ?> " />
			</div>	
			<div>
				Correo<input type="text" name="correo" value= "<?php echo $correo ?> " />
			</div>		
			<div>
				Contraseña<input type="password" name="pass1" value= "<?php echo $pass ?> " />
					
				<input type="submit" value="Modificar" name="Modificar"/>
			</div>	
		</form>

		<?php
			if (isset($_POST["Modificar"])) {
				$updateUsuario= "UPDATE usuarios SET  nombre = '".$_POST["login"].
				"' ,correo ='".$_POST["correo"].
				"' ,pass ='".$_POST["pass1"].
				"' where id=".$id  ;
				echo $updateUsuario;
				$conexion->query($updateUsuario);

				$conexion->close();
			}
		?>
	
</body>
</html>
