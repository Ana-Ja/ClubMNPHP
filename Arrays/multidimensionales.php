<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multidimensionales</title>
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

		for ($j=0;$j<=sizeof($alumnos[0])-1;$j++){
			echo $alumnos[0][$j]." tiene ".$alumnos[1][$j]." años y su teléfono es ".$alumnos[2][$j]."<br>";
		}

	?>
</body>
</html>