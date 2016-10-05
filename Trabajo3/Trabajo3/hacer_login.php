<?php
$raiz="./";
 include_once("librerias/funciones.php");
 
 
//cpmpruebo que recibo los datpos de login
if (!isset($_POST["email"] ) || !isset($_POST["contrasena"]) ) {
//  echo "No se han recibido todos los datos para autenticarse";
    header("location: login.php?errorlogin=1");
  
} elseif ($_POST["email"]=="" || $_POST["contrasena"]=="") {
	//echo "El mail o contrasena no pueden estar vac&iacute;as";
	header("location: login.php?errorlogin=2");
} else {
	 
	  //valido que algun usuario tienen este mail y contrana
	  $sql="Select * from usuarios where email= '". $_POST["email"] . "' ";
	   $conexion= conexion_bd();
	   if ( !$registro_usuario=mysql_query($sql)) {
		   //echo "hubo un error en la B.D.";
		   header("location: login.php?errorlogin=3");
	   } else {
		  if (mysql_num_rows($registro_usuario)!=1){
			//  echo "no hay un usuario con esos datos";
			header("location: login.php?errorlogin=4");
		  } else {
			$usuario_encontrado=mysql_fetch_array($registro_usuario);
			
			if ($usuario_encontrado["contrasena"]!= md5($_POST["contrasena"])){
			//	echo "la contraseña almacenada no corresponde con este usuario";
			header("location: login.php?errorlogin=5");
			} else {
				//echo "Login valido";
				//iniciamos la sesion de este usuario guardando algun dato de este usuario en variables de sesion
			//	session_start();  lo meto dentro del scrip funciones.php y como este scrip se llama al principio
				$_SESSION["email_usuario"]=$_POST["email"];
				$_SESSION["nombre_usuario"]=$usuario_encontrado["nombre"];
				$_SESSION["contrasena_usuario"]=$usuario_encontrado["contrasena"];
		    	$_SESSION["apellidos_usuario"]=$usuario_encontrado["apellidos"];
				$_SESSION["admin"]=$usuario_encontrado["admin"];
				//redirijo al usuario a la portada
		     	 header("location:index.php");
			}
		  }
		   
	   }
}
?>