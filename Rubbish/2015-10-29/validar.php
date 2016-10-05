<?php
if (isset($_POST["mail"])){
    session_start();
    include './includes/conexion.php';


	//conexion a la base de datos
	
	$conexion = conectar();

	$mail = $_POST["mail"];
	$pass_usu = $_POST["pass"];
	if (isset( $_POST["recordar"])) {
		$recordar = 1;
	} else 
	 	$recordar = 0;
	
	$redirectTo = $_POST["redirectTo"];
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

				//si ha marcado recordar creo dos cookies; id y tokenId
				if ($recordar==1) {
					$cookieName="usuarioId";
					$cookieValue=$fila["id"];
					$token = md5($fila["id"].time().$fila["Nombre"]);
					$usuarioUpdate = "UPDATE usuarios SEt cookieToken ='". $token. "' where id=".$fila["id"];
					echo $usuarioUpdate ;
					$conexion->query($usuarioUpdate);
					setcookie($cookieName, $cookieValue, time()+(3600*24*7), "/");
					$cookieName="cookieToken";
					$cookieValue=$token;
					setcookie($cookieName, $cookieValue, time()+(3600*24*7), "/");
				}

				include_once './includes/kint/kint.class.php';
				d($_SESSION);
				// if ($redirectTo!="") {
				// 	echo "<script>window.location='./".$redirectTo.".php';</script>";
				// } else {
				// 	echo "<script>window.location='./index.php';</script>";
				// }
				echo "<script>window.location='./index.php?redirectTo=".$redirectTo."';</script>";
				
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