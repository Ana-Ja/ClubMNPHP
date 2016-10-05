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

	$max = max($numeros);
	$min = min($numeros);
	$suma = array_sum($numeros);

	echo "El máximo es ".$max."<br/>";
	echo "El mínimo es ".$min."<br/>";
	echo "La media es ".($suma/sizeof($numeros));

	?>
</body>
</html>