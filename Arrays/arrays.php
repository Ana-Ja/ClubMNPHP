<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$alumnos  = array("Ana","pepe", "cristina", "Jorge", "luisa" );
		for ($i=0; $i<=count($alumnos)-1;$i++){  //sizeof($alumnos)
			echo $alumnos[$i]." esta en la posicion ".$i."<br/>";
				}
		$clientes[1]= "Paco";
		$clientes[5]="Eva";
		echo "La longitud de clientes es ".count($clientes)."<br/>";
		var_dump($clientes);
		foreach ($clientes as $key => $value) {
			echo "el indice es ".$key. " y el valor es ".$value."<br/>";
		}
	?>
	
</body>
</html>