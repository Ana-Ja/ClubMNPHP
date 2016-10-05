<?php
$raiz="../";
  include_once($raiz."librerias/funciones.php");

if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  }
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Comerciantes, Ribera" ;
 $titulo_pagina="SUBIR ARCHIVOS";
 include_once($raiz."plantillas/cabecera.php");
?>
<script type="text/javascript">
    window.onload = function() {
    PonerFoco();
	setInterval(muestraReloj, 1000);

   }
</script>

<?php
 
 
 if (isset($_POST[enviar])) {
	processForm();
} else{
	displayForm();
}

function processForm() {
	global $raiz;
 // si existe la variable archivo y no tiene esrror
 if (isset($_FILES["archivo"]) and $_FILES["archivo"]["error"]== UPLOAD_ERR_OK) {
	//compruebo que es una imagen jpeg y la muevo a un directorio imagenes

	   $allowedExtensions = array("txt","csv","htm","html","xml", 
	  "css","doc","xls","rtf","ppt","pdf","swf","flv","avi", 
	  "wmv","mov","jpg","jpeg","gif","png"); 
	foreach ($_FILES as $file) { 
	  if ($file['tmp_name'] > '') { 
		if (!in_array(end(explode(".", 
			  strtolower($file['name']))), 
			  $allowedExtensions)) { 
		 die($file['name'].' es un tipo de fichero inválido.!<br/>'. 
		  '<a href="javascript:history.go(-1);">'. 
		  '&lt;&lt Volver</a>'); 
		} 
	  } 
	} 

	
	
 
	if ($_FILES["archivo"]["type"]== "image/pjpeg" || $_FILES["archivo"]["type"]== "image/jpeg" || $_FILES["archivo"]["type"]== "image/x-png" || $_FILES["archivo"]["type"]== "image/gif") {
		
		if (move_uploaded_file($_FILES["archivo"]["tmp_name"] ,$raiz. DIR_FOTOS . basename($_FILES["archivo"]["name"]))) {
			echo '<p><a href="subir_archivos.php">Volver </a></p>';
		} else {
			 
			echo "<p> Hay un problema con la carga del archivo. </p>". $_FILES["archivo"]["error"]; 
		}
   } else {
	   if (move_uploaded_file($_FILES["archivo"]["tmp_name"] ,$raiz. DIR_DOCUMENTA . basename($_FILES["archivo"]["name"]))) {
		  echo '<p><a href="subir_archivos.php">Volver </a></p>';
		
       } else {
		  echo "<p> Hay un problema con la carga del archivo. </p>". $_FILES["archivo"]["error"]; 
	   }
  }
																																					  
 } else {
	 switch ($_FILES["archivo"]["error"]) {
		case UPLOAD_ERR_INI_SIZE:
		  $mensaje="El archivo es más grande que lo que el servidor permite.";
		  break;
		 case UPLOAD_ERR_FORM_SIZE:
		  $mensaje="El archivo es más grande que lo que el script permite.";
		  break;
		 case UPLOAD_ERR_NO_FILE:
		  $mensaje="Ning&uacute;n archivo no fue cargado. Asegurate que elegiste un archivo para cargar";
		  break;
    	  default:
		   $mensaje="Existe algún problema.";
	 }
	echo "<p> Lo siento, hay un problema con la carga de tu archivo. $mensaje</p>"; 
	 
 }
	
}


function displayForm() {
?>
<h1>Cargando archivo</h1>	
	<br />
	<form action="subir_archivos.php" method="post" enctype="multipart/form-data" >
    	
        	<input type="hidden" name="MAX_FILE_SIZE" value ="5000000" />
            
           
            
            <label for="archivo">Nombre archivo </label>
            <div class="campoformulario">
             	<input type="file" name="archivo" id="archivo" value="" size="50"/>
            </div>
            
            
            <div class="campoformulario">
               <input type="submit" name="enviar" value="Enviar Archivo" />
           </div>
       
    </form>
<?php
}


 
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>
