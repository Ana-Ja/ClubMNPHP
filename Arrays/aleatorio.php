<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$refranes = array(
		"Al que madruga Dios le ayuda", 
		"No por mucho madrugar amanece más temprano", 
		"Crea fama y échate a dormir", 
		"Cuando el río suena agua lleva", 
		"No dejes para mañana lo que puedas hacer hoy", 
		"Cría cuervos y te sacarán los ojos", 
		"A buen entendedor pocas palabras bastan", 
		"Quien con niños se acuesta mojado se levanta", 
		"A caballo regalado no le mires el diente", 
		"Más vale pájaro en mano que ciento volando", 
		"Ande yo caliente y ríase la gente");

	//primer paso obtener un número aleatorio entre 0 y el tamaño del array
	$pos = mt_rand(0, sizeof($refranes)-1);

	echo $refranes[$pos]."<br/>";

	//otra manera de obtener un nº aleatorio es dividir la hora entre el tamaño del array pq asi sabemos
	//que el resto no sera mayor que el tamaño del array
	$segundos = time();
	$pos = $segundos%sizeof($refranes);

	echo $refranes[$pos];


	?>
</body>
</html>