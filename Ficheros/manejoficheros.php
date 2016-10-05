<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php //Ejemplo aprenderaprogramar.com
		/* $fp = fopen("/apr2/fichero.txt", "r");
		$fp = fopen("/apr2/fichero2.txt", "w");
		$fp = fopen("http://www.aprenderaprogramar.com/texto.txt", "a+");
		$fp = fopen("ftp://ftp.elmundo.es/fichero.txt", "w");
	*/
		// Ejemplo aprenderaprogramar.com
		// Leemos la primera línea de fichero.txt
		// fichero.txt tienen que estar en la misma carpeta que el fichero php
		// fichero.txt es un archivo de texto normal creado con notepad, por ejemplo.
		$fp = fopen("fichero.txt", "r");
		$linea = fgets($fp);
		echo $linea. "<br />";
		fclose($fp);


	 // Ejemplo aprenderaprogramar.com
		// Iremos leyendo línea a línea del fichero.txt hasta llegar al fin (feof($fp))
		// fichero.txt tienen que estar en la misma carpeta que el fichero php
		// fichero.txt es un archivo de texto normal creado con notepad, por ejemplo.
		$fp = fopen("fichero.txt", "r");
		while(!feof($fp)) {
		$linea = fgets($fp);
		echo $linea . "<br />";
		}
		fclose($fp);
	

	 // Ejemplo aprenderaprogramar.com
		// Escribimos una primera línea en fichero.txt
		// fichero.txt tienen que estar en la misma carpeta que el fichero php
		$fp = fopen("fichero.txt", "a+");
		fputs($fp, "Prueba de escritura aprenderaprogramar.com\\n");
		fclose($fp);
	?>
</body>
</html>	