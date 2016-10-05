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
		include_once './includes/conexion.php';
		include_once './includes/enviarCorreo.php';
		include_once './clases/usuario.class.php';
		 $conexion = conectar();
		// //miro que la cuenta de usuaruoi no exista duplicado
		// $buscarUsuario= "Select id, nombre, mail from usuarios".
		//       " where mail = '".$_POST["mail"]."'" ;//AND usuarios.id=contactos.id AND ".
		//      // " fechaAceptacion = null";
		
		// echo $buscarUsuario;
		// $resultado = $conexion->query($buscarUsuario);
		
		// 	$fila= $resultado->fetch_assoc();
		// 	$nombre = $fila['nombre'];
		// 	$id = $fila['id'];
			$amigo = Usuario::getUsuarioByEmail($_POST["mail"]);
			if ($amigo == null){
				echo "No hay contactos con ese correo";
				exit;
			}
			$token = md5(time());
		   // echo "Token ".$token;
			$de = array("jarauta.ana@gmail.com", "Contacto Facebu");
			$a = array($amigo->mail,$amigo->nombre);
			$asunto= "Solicitud de amistad";
			$mensaje= "Hola. Te han enviado una solicitud de amistad. Para aceptarla
			 pulsa en este enlace <br/><a href='http://localhost/ANA/Facebu/plantilla/activarinvitacion.php?idAmigo=".$amigo->id."&idSolicitante=".$_SESSION['idLogeado']."&token=".$token."'>Activar Invitacion</a>";
			//var_dump($a);
			if (enviarCorreo($de, $a, $asunto, $mensaje) ==1){
				echo "<br/>Enviado correctamente";
				$fechasolicitud = date('Y-m-d H:i:s', time());
				//echo "<br/>FEcha ".$fechasolicitud;

				//compruebo si exste el contacto
				$buscarcontacto= "Select id from contactos".
				      " where idAmigo = ".$amigo->id." and idSolicitante=".$_SESSION['idLogeado'];//AND usuarios.id=contactos.id AND ".
				     // " fechaAceptacion = null";
				
				
				echo $buscarcontacto;
				$resultado = $conexion->query($buscarcontacto);
				

				if ($resultado->num_rows==1){

					$updateContacto= "UPDATE contactos SET  fechaSolicitud = '".$fechasolicitud. "', token = '". $token."' where idAmigo=".$amigo->id ." AND idSolicitante=".$_SESSION['idLogeado'];
					echo $updateContacto;
					$conexion->query($updateContacto);
				} else {
					$insertContacto= "INSERT INTO contactos ( IdSolicitante, idAmigo,token ) VALUES (".$_SESSION['idLogeado'].",".$amigo->id.",'".$token."') ";
					echo $insertContacto;
					$conexion->query($insertContacto);
					//comando que me devuelve el id que acabdo de insertar
					//pero tengo que pedirlo justo despues de insertarlo 
					$idContacto = $conexion->insert_id;
				}	
			} else {
				echo "<br/>Problemas en el envio de correo";
			}	
	    
	    	$conexion->close();	
	

	}

	function comprobarFoto() {
			print_r($_FILES); 
			$tipo_archivo = $_FILES['fichero']['type']; 
			$tamano_archivo = $_FILES['fichero']['size']; 
			$texto_error="";
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000))) { 
		   	//echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de {$tamano_archivo}  Kb máximo.</td></tr></table>"; 
		    $texto_error="La extensión o el tamaño de los archivos no es correcta(jpeg, gif,png).";
			}
			if ($_FILES['fichero']['error']) {
			          switch ($_FILES['fichero']['error']){
			                   case 1: // UPLOAD_ERR_INI_SIZE
			                   $texto_error+=" El archivo sobrepasa el limite autorizado por el servidor(archivo php.ini) !";
			                   break;
			                   case 2: // UPLOAD_ERR_FORM_SIZE
			                   $texto_error+=" El archivo sobrepasa el limite autorizado en el formulario HTML !";
			                   break;
			                   case 3: // UPLOAD_ERR_PARTIAL
			                   $texto_error+=" El envio del archivo ha sido suspendido durante la transferencia!";
			                   break;
			                   case 4: // UPLOAD_ERR_NO_FILE
			                   $texto_error+= " El archivo que ha enviado tiene un tamaño nulo !";
			                   break;
			          }
			}
			else {
			 // $_FILES['fichero']['error'] vale 0 es decir UPLOAD_ERR_OK
			 // lo que significa que no ha habido ningún error
			} 

			if ((isset($_FILES['fichero']['name'])&&($_FILES['fichero']['error'] == UPLOAD_ERR_OK))) {
				
				$nombre = extractName($_FILES["file"]["name"]);
				//cambio el nombre de la imagen
				$numero_aleatorio = md5(time());
				$nombre_aleatorio = $numero_aleatorio.$nombre;
				$extension = extractExtension($_FILES["file"]["name"]);
				$url = './images/people/110/'.$nombre_aleatorio.'.'.$extension; 
				//con esta funcion lo que hago es optimizar la imagen
				compress_image($_FILES["file"]["tmp_name"], $url, 80); 
				//$ruta_destino = "images/people/".$_FILES['fichero']['name'];
				//move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta_destino);
				//
				//echo "<img src='{$ruta_destino}' >";


				//cambio el nombre de la imagen
				$numero_aleatorio = md5(time());
				$nombre_nuevo = $numero_aleatorio.$_FILES["file"]["name"];
				$nombre_nuevo_t = $numero_aleatorio.$_FILES["file"]["name"]."_t";
			} 
	}
	function extractName($fileName){
		//obtengo la posición del último .
		$pos = strrpos($fileName, ".");
		$extension = substr($fileName, 0, $pos);
		return $extension;
	}

	function extractExtension($fileName){
		//obtengo la posición del último .
		$pos = strrpos($fileName, ".");
		$extension = substr($fileName, $pos);
		return $extension;
	}
	function compress_image($source_url, $destination_url, $quality) { 
		$info = getimagesize($source_url); 
		var_dump($info);
		if ($info['mime'] == 'image/jpeg'){ 
			$image = imagecreatefromjpeg($source_url); 
			imagejpeg($image, $destination_url, $quality);
		}elseif ($info['mime'] == 'image/gif') {
			$image = imagecreatefromgif($source_url); 
			imagegif($image, $destination_url);
		}elseif ($info['mime'] == 'image/png') {
			$image = imagecreatefrompng($source_url); 
			imagepng($image, $destination_url, $quality);
		}
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