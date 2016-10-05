<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$personas = array("Paco Gutierrez", 
			"Helena Hernández",
			"Eneko Colmenero",
			"Elena Nito",
			"Bill Gates",
			"Steve Jobs",
			"Mark Zuckerberg");

		//var_dump($personas);
		/*Dado el array anterior formado por nombres y apellidos.
		Hacer un formulario que permita introducir una letra y devuelva
		Todas las personas cuyo apellido empiece por esa letra*/

		$letraABuscar = "G";

		//necesito recorrerme todo el array posición por posición buscando la primera letra de cada apellido
		for ($i=0;$i<=sizeof($personas)-1;$i++){
			//accedo a la persona que tengo el la posición $i y la guardo en una variable
			$persona = $personas[$i];
			//echo $persona."<br />";
			//necesito separar el nombre y el apellido de esa persona, así que parto los datos usando el espacio como separador
			$datos = explode(" ", $persona);
			//var_dump($datos);

			//del array de datos me quedo con el apellido, que está en la segunda posición
			$apellido = $datos[2];

			//miro si la primera letra del apellido es igual a la que me han introducido
			if ($letraABuscar==$apellido[0]){
				echo $persona." tiene la letra en el apellido";
			}
		}
	?>
</body>
</html>