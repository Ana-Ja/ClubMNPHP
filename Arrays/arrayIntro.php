<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		/*Un array es capaz de almacenar diferentes valores en diferentes posiciones*/
		$numeros = array(18,5,8,23,4,53,8,1,69,98,7);

		/*Para acceder a los valores de un array utilizo su posición*/
		for ($i=0;$i<=sizeof($numeros)-1;$i++){
			echo "Quiero acceder a la posición ".$i." del array: ".$numeros[$i]."<br/>";
		}

	?>
</body>
</html>