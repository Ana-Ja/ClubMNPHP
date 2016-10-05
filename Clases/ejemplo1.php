<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		//quiero utilizar la clase persona
		include './Persona.php';

		//creo un objeto/variable de la clase Persona
		$persona1 = new Persona("pedro","perez");
		var_dump($persona1);

		$persona2 = new Persona();
		$persona2->nombre="Lucia";
		$persona2->apellido="Gutierrez";
		$persona2->altura = 1.60;
		var_dump($persona2);


		$arrayPersonas = array($persona1, $persona2);

		
	?>
</body>
</html>