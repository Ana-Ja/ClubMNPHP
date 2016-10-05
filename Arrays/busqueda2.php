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

			//la función in_array devuelve un booleano diciendo si encuentra un valor en un array

			if (in_array($nombre, $alumnosMatriculados)){
				echo "Encontrado";
			}else{
				echo "No se ha encontrado";
			}

			//Busca un valor determinado en un array y devuelve la clave correspondiente en caso de éxito, o false si no lo encuentra
			$search = array_search($nombre, $alumnosMatriculados);
			
			echo $search;


		}


	?>
</body>
</html>