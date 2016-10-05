<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" id="global-css" href="../estilos.css" type="text/css" media="all" />
	<title>Explode</title>
</head>
<body>
<header>
	<?php
	$dias= "Lunes, Martes, Miercoles, jueves, viernes, sÁbado, domingo";
	echo $dias;
	$a= explode(",", $dias);
	
	$vocales = 0;
	$arrayFrom=array("á", "é", "í","ó","ú");
	$arrayTo=array("a", "e","i", "o", "u");

	$temp2 =mb_strtolower($dias); //esta funcion soluciona las vocales acentuadas
	echo $temp2;

	$dias2 = str_replace($arrayFrom, $arrayTo, $temp2);
	//$dias = str_replace("é||´´E", "a", $dias);
	//si estan acentuadas las vocales no las contaria
	for ($i=0; $i<=strlen($dias2)-1; $i++){
		if (in_array($dias2[$i], $arrayTo)){
			$vocales++;
		}
		
	}
	echo "<br/>Existen ".$vocales."<br/>";
    var_dump($a);
	?>
</header>
</body>
</html>