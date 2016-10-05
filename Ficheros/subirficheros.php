<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	/* en esta pagina web hay buena informacion http://es.ccm.net/faq/286-php-subir-archivos */
	/*AQUI HAY ENLACES PARA PROTEGER LA SUBIDA DE DATOS https://norfipc.com/inf/como-subir-fotos-imagenes-servidor-web.php*/
	<FORM  ENCTYPE="multipart/form-data" action="uploader.php" method="POST">
	          <INPUT type=hidden name=MAX_FILE_SIZE  VALUE=1000000>
	          <INPUT type=file name="fichero">
	          <INPUT type=submit value="Enviar">
	</FORM>

 
	
	
</body>
</html>