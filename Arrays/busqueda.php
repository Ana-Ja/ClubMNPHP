<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	Dado un array ya inicializado:
	$alumnosMatriculados = array("Ana", "Daniel", "Pedro", "Cristina", "Jorge");

	Haz un formulario que permita introducir el nombre de una persona y lo busque en el array. En caso de encontrarlo devolverá la posición del array. Si no existe, mostrará un mensaje indicándolo.

	<form action="" method="POST">
		Nombre a buscar <input type="text" name="nombre" />
		<input type="submit" name="buscar" value="Buscar" />
	</form>

	<?php
		//pregunto si se ha pulsado el botón buscar
		if (isset($_POST["buscar"])){

			$alumnosMatriculados = array("Ana", "Daniel", "Pedro", "Cristina", "Jorge");

			$nombre = $_POST["nombre"];

			//recorro el array buscando el nombre
			$ok = 0;

			for ($i=0;$i<=sizeof($alumnosMatriculados)-1;$i++){
				if ($nombre==$alumnosMatriculados[$i]){
					//LO HE ENCONTRADO!!!!!
					echo "lo he encontrado en la posición ".($i+1);
					$ok=1;
				}
			}

			if ($ok==0){
				echo "No lo he encontrado";
			}


		}


	?>
</body>
</html>