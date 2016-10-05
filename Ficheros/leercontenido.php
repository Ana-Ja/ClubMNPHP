<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	function leer_contenido_completo($url){
   //abrimos el fichero, puede ser de texto o una URL
	   $fichero_url = @fopen ($url, "r") or die("El fichero no se ha podido abrir");
	   $texto = "";
	   //bucle para ir recibiendo todo el contenido del fichero en bloques de 1024 bytes
	   while ($trozo = !feof($fichero_url)){
	      $texto .= fgets($fichero_url , 100);
	   }
	   return $texto;
	}
	$url="http://www.google.es";
	//echo leer_contenido_completo("fichero.txt");
	$contenido = leer_contenido_completo($url);
	//ahora lo copio a un fichero 2
	$fp = fopen("fichero2.txt", "w");
		fputs($fp, $contenido);
		fclose($fp);
?>
</body>
</html>