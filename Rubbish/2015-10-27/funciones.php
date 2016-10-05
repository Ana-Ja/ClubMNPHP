<?php
	function estaLogeado(){
		if (!isset($_SESSION['idLogeado'])) {
			//si no ha iniciado sesion le mando a la pagina de login
			header('Location: ./login.php');
		} else if (isset($_GET["redirectTo"])) {
			//header('Location: ./'.$_GET["redirectTo"]);
			echo "<script>window.location='./index.php';</script>";
		}
	}
	function guardarPublicacion() {
	
		include_once './clases/publicacion.php';
		require_once("./clases/postClass.php");
		$thisPost = new Post_Block;
		if ($thisPost->postBlock($_POST['postID'])) {
			$publicacion = new Publicacion($_POST["titulo"],$_POST["texto"],$_SESSION["idLogeado"],$_POST["visibilidad"]);
			$publicacion->salvar();
		    // No existe doble post
		    // Procesamos la información
		} 
		
		
	}
	function guardarComentario() {
	
		include_once './clases/comentarios.class.php';
		require_once("./clases/postClass.php");
		$thisPost = new Post_Block;
		if ($thisPost->postBlock($_POST['postID'])) {
			$comentario = new Comentario($_POST["texto"],$_POST["idPublicacion"],$_SESSION["idLogeado"]);
			$comentario->salvar();
		    // No existe doble post
		    // Procesamos la información
		} 
		
		
	}

	function enviarInvitacion() {
		include './includes/conexion.php';
		include './includes/enviarCorreo.php';
		$conexion = conectar();
		//miro que la cuenta de usuaruoi no exista duplicado
		$buscarUsuario= "Select id, nombre, mail from usuarios".
		      " where mail = '".$_POST["mail"]."'" ;//AND usuarios.id=contactos.id AND ".
		     // " fechaAceptacion = null";
		
		echo $buscarUsuario;
		$resultado = $conexion->query($buscarUsuario);
		
			$fila= $resultado->fetch_assoc();
			$nombre = $fila['nombre'];
			$id = $fila['id'];
			$token = md5(time());
		   // echo "Token ".$token;
			$de = array("jarauta.ana@gmail.com", "cambio contraseña");
			$a = array($fila["mail"],$nombre);
			$asunto= "Nuevo registro";
			$mensaje= "Pinche en este enlace para aceptar la invitacion <br/><a href='http://localhost/ANA/Facebu/plantilla/activarinvitacion.php?idAmigo=".$id."&idSolicitante=".$_SESSION['idLogeado']."&token=".$token."'>Activar Invitacion</a>";
			//var_dump($a);
			if (enviarCorreo($de, $a, $asunto, $mensaje) ==1){
				echo "<br/>Enviado correctamente";
				$fechasolicitud = date('Y-m-d H:i:s', time());
				//echo "<br/>FEcha ".$fechasolicitud;

				//compruebo si exste el contacto
				$buscarcontacto= "Select id from contactos".
				      " where idAmigo = ".$id." and idSolicitante=".$_SESSION['idLogeado'];//AND usuarios.id=contactos.id AND ".
				     // " fechaAceptacion = null";
				
				echo $buscarcontacto;
				$resultado = $conexion->query($buscarcontacto);
				

				if ($resultado->num_rows==1){

					$updateContacto= "UPDATE contactos SET  fechaSolicitud = '".$fechasolicitud. "', token = '". $token."' where idAmigo=".$id ." AND idSolicitante=".$_SESSION['idLogeado'];
					echo $updateContacto;
					$conexion->query($updateContacto);
				} else {
					$insertContacto= "INSERT INTO contactos ( IdSolicitante, idAmigo,token ) VALUES (".$_SESSION['idLogeado'].",".$id.",'".$token."') ";
					echo $insertContacto;
					$conexion->query($insertContacto);
				}	
			} else {
				echo "<br/>Problemas en el envio de correo";
			}	
	    
	    $conexion->close();	
			
		
	

	}
	// function obtenerPublicaciones() {
	// 	include_once './clases/publicacion.php';
	 	
	// 	 Publicacion::select();
	// 	// include_once './includes/conexion.php';
	// 	// $conexion = conectar();
	// 	// $consulta = "select * from publicaciones " ; //where idUsuario = '".$_SESSION["idLogeado"]."'";
		
	// 	// if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

	// 	//   if ($resultado->num_rows > 0 ){
	// 	//       //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      
	// 	//       while ($fila= $resultado->fetch_assoc()) {
	// 	//       	$buscausu = "select nombre, foto from usuarios  where id = ".$fila["idUsuario"];
	// 	//       	$resultado2 = $conexion->query($buscausu);
	// 	//       	//echo $buscausu;
	// 	// 		$usuario = $resultado2->fetch_assoc();
	// 	// 		$_SESSION['idPublicacion'] = $fila["id"];
	// 	//         include './bloques/plantilla_publicacion.php';
	// 	//       }
	// 	//   }
	// 	//  } 
	// 	//  $conexion->close();  
	// }
	function obtenerComentarios ($vertodos){
		include_once './clases/comentarios.class.php';
		
		$num_comentarios= Comentario::select($vertodos);
		return $num_comentarios;
	}

	//////////////////////////////////////////////////// 
	//Convierte fecha de mysql a normal 
	//////////////////////////////////////////////////// 
	function cambiaf_a_normal($fecha){ 
	   	ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	   	return $lafecha; 
	} 

	//////////////////////////////////////////////////// 
	//Convierte fecha de normal a mysql 
	//////////////////////////////////////////////////// 

	function cambiaf_a_mysql($fecha){ 
	   	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
	   	return $lafecha; 
	}

?>