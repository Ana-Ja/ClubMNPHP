<?php
$raiz="../";
 include_once($raiz."librerias/funciones.php");
  
  //elimino la sesion
  //$_SESSION["nombre_usuario"]="";
 // $_SESSION["apellidos_usuario"]="";
//  $_SESSION["email_usuario"]="";
  $_SESSION["admin"]="";
   $_SESSION["member"]="";
  
  if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), "", time()-3600,"/");
 }
								  
  $_SESSION=array();
  
  session_destroy();
  
  //voy a la portada, sin la sesion que ha sido destruido
 header("location:../index.php"); 

 ?>