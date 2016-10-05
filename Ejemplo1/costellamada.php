<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>
	<?php
		$duracion = 12;
		$coste=1;
		if ($duracion == 0){
			$coste=0;
		} else if ($duracion >0 && $duracion <=1 ){
			$coste+= 2;
		} else if ($duracion >1){
			$duracio_real = $duracion-1;
			$coste=$coste + $duracion;
		}
		echo "Duracion: ".$duracion;
		echo "<br> Coste: ".$coste;
	?>
</h1>

</body>
</html>	
