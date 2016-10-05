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
	function guardarUsuario($nombrefoto) {
	
		include_once './clases/usuario.class.php';
		require_once("./clases/postClass.php");
		$thisPost = new Post_Block;
		include_once './includes/kint/kint.class.php';
		d($_POST);
		if ($thisPost->postBlock($_POST['postID'])) {
			$token = md5(time());
			$usuario = new Usuario($_POST["nombre"],$_POST["apellidos"],$_POST["mail"],$nombrefoto,$_POST["pass1"], $token);
			$id =  $usuario->salvar(); //si ha ido bien, ne devuelve el id
			if ( $id<>0 );
		   		echo "Insertado con exito<br/>";
		   		//con esto recupero el id del registro insertado. Tiene que preguntarse justo despues del insert
		   						
				
				$de = array("jarauta.ana@gmail.com", "Registro Facebu");
				$a = array($_POST["mail"], $_POST["nombre"]);
				$asunto= "Nuevo registro";
				$mensaje= "Pinche en este enlace para activar su cuenta <br/><a href='http://localhost/ANA/Facebu/plantilla/activacion.php?id=".$id ."&ref=".$token."'>Activar usuario</a>";
				
				echo (enviarCorreo($de, $a, $asunto, $mensaje) ==1) ? "<br/>Enviado correctamente": "<br/>Problemas en el envio de correo";
				echo "<script>window.location='./login.php';</script>";
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

	function ObtenerAmigos($id) {
		include_once './clases/contacto.class.php';
		return $contactos = Contacto::getAmigos($id);

	}

	function comprobarFoto() {
			include_once './includes/kint/kint.class.php';
    		d($_FILES);
			$tipo_archivo = $_FILES['foto']['type']; 
			$tamano_archivo = $_FILES['foto']['size']; 
			$texto_error="";
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo <= 1000000))) { 
		   	//echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de {$tamano_archivo}  Kb máximo.</td></tr></table>"; 
		    $texto_error="La extensión o el tamaño de los archivos no es correcta(jpeg, gif,png).";
			}
			if ($_FILES['foto']['error']) {
			          switch ($_FILES['foto']['error']){
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
			if ($texto_error!="") {
				echo $texto_error;
				exit;
			}
			if ((isset($_FILES['foto']['name'])&&($_FILES['foto']['error'] == UPLOAD_ERR_OK))) {
				include_once('./clases/ManejoImagenes.class.php');
				$mythumb100 = new thumb();
				$mythumb100->loadImage($_FILES["foto"]["tmp_name"]);
				//una forma mas sencilla de cambiar el nombre a la foto es concatenar el idusuario."-".nombrefichero
				$nuevo_nombre = $mythumb100->cambioNombre(extractName($_FILES['foto']['name'])).extractExtension($_FILES['foto']['name']);
				$name = './images/people/110/'.$nuevo_nombre;
				$mythumb100->resize($name,100, 'width');
				$mythumb100->save($name, $quality = 90);
				$mythumb50 = new thumb();
				$mythumb50->loadImage($_FILES["foto"]["tmp_name"]);
				$name = './images/people/50/'.$mythumb50->cambioNombre(extractName($_FILES['foto']['name']))
					."_t".extractExtension($_FILES['foto']['name']);
				$mythumb50->resize($name,50, 'width');
				$mythumb50->save($name, $quality = 90);
			} 
			return $nuevo_nombre;
	}
	function extractName($fotoName){
		//obtengo la posición del último .
		$pos = strrpos($fotoName, ".");
		$extension = substr($fotoName, 0, $pos);
		return $extension;
	}

	function extractExtension($fotoName){
		//obtengo la posición del último .
		$pos = strrpos($fotoName, ".");
		$extension = substr($fotoName, $pos);
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