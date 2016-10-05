<?php
    include_once './bloques/cabecera_login.php';
    include_once './includes/funciones.php';
    require_once("./clases/postClass.php");
    $thisPost = new Post_Block;
?>
<h1>Registro</h1>
<div class="panel panel-default text-center">
	<form action="" method="POST" id="login-form" enctype="multipart/form-data">
		<div class="panel-body">
			Nombre<input type="text" name="nombre"  class="form-control" value= "<?php echo isset($_POST["nombre"]) ? $_POST["nombre"]: "" ?> " />
		
			Apellidos<input type="text" name="apellidos" class="form-control" value= "<?php echo isset($_POST["apellidos"]) ? $_POST["apellidos"]: "" ?> " />
		
			Correo<input type="text" name="mail" class="form-control" value= "<?php echo isset($_POST["mail"]) ? $_POST["mail"]: "" ?> " />
		
			Contraseña<input type="password" name="pass1" class="form-control"/>
		
			Repetir Contraseña<input type="password" name="pass2"  class="form-control"/>
			 <?php $thisPost->startPost(); ?>
			<INPUT type="hidden" name="size"  VALUE='1000000'>
			<INPUT type="file" name="foto"  class="form-control">
			
			<input type="submit" value="Registrarse" name="Registrar" class="btn btn-primary"/>
		</div>	
		
		<a href="olvidopass.php" class="forgot-password">Forgot password?</a>
	</form>
</div>	
<?php
	//}
	include './includes/conexion.php';
	include './includes/enviarCorreo.php';
	$conexion = conectar();
	if (isset($_POST["Registrar"])) {
		if ($_POST["nombre"]!= "" && $_POST["mail"]!= "" && $_POST["pass1"]!= "") { 
			if ($_POST["pass1"]== $_POST["pass2"]) { 
				$nombrefoto=ComprobarFoto();
				if (guardarUsuario($nombrefoto)==1) {
				//inserto el usuario en la base de datos
				// $time = md5(time());
				// //miro que la cuenta de usuaruoi no exista duplicado
				// $buscarUsuario = "Select id from usuarios where mail = '".$_POST["mail"]."'";
				// $insertUsuario = "insert into usuarios (Nombre,Apellidos, mail, pass, token) VALUES 
				// 	('".$_POST["nombre"].					
				// 	"','".$_POST["apellidos"].	
				// 	"','".$_POST["mail"].
				// 	"','".$_POST["pass1"].
				// 	"','".$time."')";
				// echo $insertUsuario;
				// echo $buscarUsuario;
				// $resultado = $conexion->query($buscarUsuario);
				// if ($resultado->num_rows==0){
				// 	if ($conexion->query($insertUsuario) === true) {
						// echo "Insertado con exito<br/>";
						// //con esto recupero el id del registro insertado. Tiene que preguntarse justo despues del insert
						// $token = md5(time());
						// $id = $conexion->insert_id;   //devileve 0 si no se ha insertado nada
						// $de = array("jarauta.ana@gmail.com", "Registro Facebu");
						// $a = array($_POST["mail"], $_POST["nombre"]);
						// $asunto= "Nuevo registro";
						// $mensaje= "Pinche en este enlace para activar su cuenta <br/><a href='http://localhost/ANA/Facebu/plantilla/activacion.php?id=".$id ."&ref=".$time."'>Activar usuario</a>";
						
						// echo (enviarCorreo($de, $a, $asunto, $mensaje) ==1) ? "<br/>Enviado correctamente": "<br/>Problemas en el envio de correo";
						// echo "<script>window.location='./login.php';</script>";
					// }	
			  //   } else {
			  //    	echo "Ya existe un usuario con esa cuenta de usuario";
			  //   }	
			   } else {
			   	echo "Problemas al insertar el usurario";
			   } 
			   
			} else {
			     echo "No coinciden las contraseñas";	
			}
		} else {
		     	echo "Faltan datos";	
		}
	}
	

?>
<?php
    include_once "./bloques/pie_login.php";
?>