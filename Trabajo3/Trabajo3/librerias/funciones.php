<?php
require_once("DataObject.class.php");
include_once ("Usuarios.class.php");
   
 include_once ("EntradaLog.class.php");
 include_once ("Asociados.class.php");

  include_once ("Noticias.class.php");
 include_once ("Ciudad.class.php"); 
 
 
session_start() ;
define("PAGE_SIZE_ANUN",5);
define("DB_DSN","mysql:dbname=Asociacion");
define("DB_USERNAME","Asociacion");
define("DB_PASSWORD","2011Asociacion");
define("PAGE_SIZE_USUARIOS",10);
define("PAGE_SIZE_FOTOS",12);
define("PAGE_SIZE_NOTICIAS",12);
define("DIR_DOCUMENTA","Documentacion/");
define("DIR_FOTOS","galley_images/");

function parametro_plantilla($variable){
  if (isset($GLOBALS[$variable])) {
		  echo $GLOBALS[$variable];
	  } else {
		  echo "No hay dato cargado" . $variable;
	  }
}

function conexion_bd() {
 //conectamos con la BD
 $conexion = mysql_connect("localhost", "root","");
 mysql_select_db("Asociacion");
 return $conexion;
	
}



//funcio que devuelve el nombre de la ciudad
//requiere tener una conexion abierta en la pagina
function dame_nombreciudad($id) {
	//if (ctype_digit($_GET["ciudad"])) {
	  $sql= "Select nombre_ciudad from ciudades where id_ciudad=". $id;
	  $rs= mysql_query($sql);
	  if (mysql_numrows($rs)>0) {
	    $fila= mysql_fetch_array($rs);
	    return $fila["nombre_ciudad"];
	  }
	  	return " ciudad desconocido";
//	 
//	} else {
//		return false;
//	}
}

//funcio para generar la imagen de la bandera de un ciudad
//recibe la url o archivo de la imagen
function genera_imagen_ciudad($archivo) {
	$nombre=explode('.',$archivo);
	$a='<img border="0" src="imagenes/' . $archivo. '" title="' . $nombre[0] . '" width="32" height="32" alt="bandera" />';
	
	return	 $a;
	
}
//me dice si estoy con un usuaruo autenticado
function estas_autenticado() {
	$conexion=conexion_bd() ;
	
	if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["apellidos_usuario"]) && isset($_SESSION["email_usuario"]) && isset($_SESSION["contrasena_usuario"])) {
			//si las variable estan creadas es que el usuario esta autenticado
			//vamos a crear mas nivel de seguridad. No solo existen las variables si no que la contraseña y el mail es la correcta
			$sql="Select nombre from usuarios where email='". $_SESSION["email_usuario"]. "' and contrasena='". $_SESSION["contrasena_usuario"]. "'";
		
			
			if ($registro_usuario=mysql_query($sql)) {
				//solo deberia haber encontrado un usuario
			   if (mysql_num_rows($registro_usuario)==1){
			    	$usuario_encontrado= mysql_fetch_array($registro_usuario);
					//ese usuario tenga el mismo nombre que la variable nombre
			 	    if ($usuario_encontrado["nombre"]=$_SESSION["nombre_usuario"]) {
						
					   return true;
				    }
			   }
			} 
	}
			//si algo falla, sale por false, algo ha ido mal
			return false;
 
}

function muestra_usuario() {
	
   if (estas_autenticado()) {
	 
	echo '<div id="nuestrousuario">';
	echo '<img src="imagenes/usuario.jpg" width="32" height="32" alt="Usuario"/>Bienvenido: <b>'. $_SESSION["nombre_usuario"].'</b>';
	echo "</div>";
					  }
}
function validateField($fieldName, $missingFields) {
	if (in_array($fieldName, $missingFields)) {
		echo 'class="error"';
	}
}
function setSelected(DataObject $obj, $fieldName, $fieldValue){
	
	if ($obj->getvalue($fieldName)== $fieldValue) {
		echo ' selected="selected"';
	}
}
//funcion para comprobar que se ha conectado un miembro. Se la llamará desde cada pagina en el area de miembros
//Si esta conectado se crea un objeto Log con los datos para grabar una nueva pagina
	function checkLogin() {
		session_start();
	    
		if (isset($_SESSION["member"] )) {

		if (!$_SESSION["member"] or !$_SESSION["member"]=Usuario::getUsuario($_SESSION["member"]->getValue("id_usuario"))) {
			
				$_SESSION["member"]="";
				header("location:../registrarse/login.php");
				
				exit;
	    } else {
			
			$logEntry=new EntradaLog (array(
				"id_usuario"=> $_SESSION["member"]->getValue("id_usuario"),
				"url"=> basename($_SERVER["PHP_SELF"])
				));
			
			$logEntry->grabar();
			return true;
		}
		}
		return false;																									  
	}
function muestra_cajausuario() {
	
   if (checkLogin()) {
	    
           echo '<div id="nuestrousuario">';
	       echo '<img src="'.$GLOBALS["raiz"]. 'imagenes/usuario.jpg" width="32" height="32" alt="Usuario" />Bienvenido: <b>'. $_SESSION["member"]->getValue("username").'</b>';
	       echo "</div>";
					  }
}
function setChecked(DataObject $obj, $nombre, $valor) {
	if ($obj->getValue($nombre)==$valor) {
		echo ' checked="checked"';
	}
}
function muestraDia($fecha) {

	
    $dia= substr($fecha,8,10);
	
   $mes = substr($fecha,5,2);
   
    $anio =substr($fecha,0,4);
	
    $texfecha=$dia . "/" . $mes . "/" .$anio;
	return $texfecha;
   
   }
?>