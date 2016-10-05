<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	print_r($_FILES); 
	$tipo_archivo = $_FILES['fichero']['type']; 
	$tamano_archivo = $_FILES['fichero']['size']; 
	if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000))) { 
   	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de {$tamano_archivo}  Kb máximo.</td></tr></table>"; 
	}
	if ($_FILES['fichero']['error']) {
	          switch ($_FILES['fichero']['error']){
	                   case 1: // UPLOAD_ERR_INI_SIZE
	                   echo"El archivo sobrepasa el limite autorizado por el servidor(archivo php.ini) !";
	                   break;
	                   case 2: // UPLOAD_ERR_FORM_SIZE
	                   echo "El archivo sobrepasa el limite autorizado en el formulario HTML !";
	                   break;
	                   case 3: // UPLOAD_ERR_PARTIAL
	                   echo "El envio del archivo ha sido suspendido durante la transferencia!";
	                   break;
	                   case 4: // UPLOAD_ERR_NO_FILE
	                   echo "El archivo que ha enviado tiene un tamaño nulo !";
	                   break;
	          }
	}
	else {
	 // $_FILES['fichero']['error'] vale 0 es decir UPLOAD_ERR_OK
	 // lo que significa que no ha habido ningún error
	} 

	if ((isset($_FILES['fichero']['name'])&&($_FILES['fichero']['error'] == UPLOAD_ERR_OK))) {
		$ruta_destino = "Uploads/".$_FILES['fichero']['name'];
		move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta_destino);
		echo "<img src='{$ruta_destino}' >";
	} 

	

	?>
</body>
</html>

