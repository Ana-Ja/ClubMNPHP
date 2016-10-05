<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multidimensionales2</title>
</head>
<body>
	<?php
		
		
		//PARA ESTE TIPO DE SITUACIONES USAMOS LOS ARRAYS MULTIDIMENSIONALES.
		//UN ARRAY MULTIDIMENSIONAL ES AQUEL EN EL QUE CADA POSICIÓN ES A SU VEZ OTRO ARRAY

		$alumnos = array (
					array ("Paco", "Lucia", "Daniel", "Montse",	"Luis",	"Ana"),
					array (18, 26, 48, 32, 17, 36),
					array ("632145874", "654874365","654123987","785632148","659873215","693219874")
				);

		$alumnos2 = array(
						array("Paco",18,"632145874"),
						array("Lucia",26,"654874365"),
						array("Daniel",48,"654123987"),
						array("Montse",32,"785632148"),
						array("Luis",17,"659873215"),
						array("Ana",36,"693219874")
					);

		for ($i=0;$i<=sizeof($alumnos2)-1;$i++){
			echo $alumnos2[$i][0]." tiene ".$alumnos2[$i][1]." años y su teléfono es ".$alumnos2[$i][2]."<br>";
		}

		for ($i=0;$i<=sizeof($alumnos2)-1;$i++){
			for ($j=0;$j<=sizeof($alumnos2[$i])-1;$j++){
				echo $alumnos2[$i][$j]." ";
			}
			echo "<br>";
		}

		

	?>
</body>
</html>