<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multidimensionales2</title>
</head>
<body>
	<?php
		
		$alumnos = array(
						array("Paco",18,"632145874"),
						array("Lucia",26,"654874365"),
						array("Daniel",48,"654123987"),
						array("Montse",32,"785632148"),
						array("Luis",17,"659873215"),
						array("Ana",36,"693219874")
					);


		$alumnos2 = array(
					"Paco"=>array(18,"632145874"),
					"Lucia"=>array(26,"654874365"),
					"Daniel"=>array(48,"654123987"),
					"Montse"=>array(32,"785632148"),
					"Luis"=>array(17,"659873215"),
					"Ana"=>array(36,"693219874")
					);

		//accedo directamente a uno de ellos
		//echo $alumnos2["Paco"][0];

		//quiero recorrer todos
		foreach ($alumnos2 as $clave => $valor) {
			echo $clave ." tiene ".$valor[0]." años y su telefono es ".$valor[1]."<br>";
		}
		
		//buscarme los datos de los alumno <25
		echo "<h1>Alumnos de garatia juvenil</h1><br />";
		foreach ($alumnos2 as $clave => $valor) {
			if ($valor[0]<=25){
				echo $clave ." tiene ".$valor[0]." años y su telefono es ".$valor[1]."<br>";
			}
		}
	?>
</body>
</html>