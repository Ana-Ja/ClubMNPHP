<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	/*Dado un array de números, devolver el máximo, el mínimo y la media*/
	$numeros = array(18,5,8,23,4,53,8,1,69,98,7);

	$max = $numeros[0];
	$min = $numeros[0];
	$suma = $numeros[0];

	for ($i=1;$i<=sizeof($numeros)-1;$i++){
		//miro si el elemento en la posición i es mayor que max y menor que min
		if ($numeros[$i]>$max){
			$max = $numeros[$i];
		}

		if ($numeros[$i]<$min){
			$min = $numeros[$i];
		}

		//incremento la suma
		$suma = $suma + $numeros[$i];
	}

	echo "El máximo es ".$max."<br/>";
	echo "El mínimo es ".$min."<br/>";
	echo "La media es ".($suma/sizeof($numeros));

	




	?>
</body>
</html>