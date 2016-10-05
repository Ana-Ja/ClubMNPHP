<?php
if (isset($_POST["mail"])){
    session_start();
    include './includes/conexion.php';


	//conexion a la base de datos
	
	$conexion = conectar();

	$mail = $_POST["mail"];
	$pass_usu = $_POST["pass"];
	$consulta = "select id, mail, pass,Nombre, Apellidos,estado, foto from usuarios where mail = '".$mail."'";// and pass='".$pass_usu."'" ;
	
	if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

		if ($resultado->num_rows > 0 ){
			//leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
			$fila= $resultado->fetch_assoc();
			if($fila['estado']==0){
				echo "El usuario está desactivado";
			}else if ($fila["pass"]==$pass_usu){
				$id = $fila["id"];
				//echo "Bienvenido <a href='./perfil.php' > Mi perfil</a>".$mail ;
				$_SESSION['idLogeado']=$id;
				$_SESSION['nombre']=$fila["Nombre"];
				$_SESSION['foto']=$fila["foto"];
				include_once './includes/kint/kint.class.php';
				d($_SESSION);
				echo "<script>window.location='./index.php';</script>";
				//echo "<a href='./index.php'>Ir al muro</a>";
			} else {
				echo "<script>window.location='./login.php?mode=PasswordNotExist';</script>";
			}
			$resultado->close();	
		} else {
				echo "<script>window.location='./login.php?mode=modeUserNotExist';</script>";
		}	
	} else {
		echo "Error: No fue posible ejecutar la consulta $consulta ". $conexion->error;
	}	
	$conexion->close();	

}
      
?>