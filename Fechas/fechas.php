<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$hora= time(); //hora formato Unix, seg. transcurridos desde el 1 de enero de 1970
		var_dump($hora);
		echo date('d-m-Y', $hora)."<br/>";
		echo date('d-m-Y H/i/s', $hora)."<br/>";
		//si quiero escribir texto tengo que escaparlas pq hay letras que tiene sentido en el formato
		echo date('d-F-Y \a \l\a\s H:i:s', $hora)."<br/>";
		echo date('d-m-Y', $hora)." a las ".date('H:i:s', $hora)."<br/>";
		echo "semana ".date('W', $hora)."<br/>";
		//a date si le pasas una fecha tiene que estar en formato Unix, por eso uso la funcion strtotime 
		echo "El 5 de marzo era la semana ".date('W', strtotime("2015/03/05"))."<br/>";
		//calculo de diferencia entre dos fechas
		$fecha1 = date("d-m-Y");
		$fecha2 = date("2015-01-01");
		$intervalo = date_diff(date_create($fecha1), date_create($fecha2));
		echo "Han pasado ".$intervalo->d."dias <br/>";
	?>

</body>
</html>