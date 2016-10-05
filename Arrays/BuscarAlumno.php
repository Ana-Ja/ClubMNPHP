<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" >
		Alumno: <input type="text" name="alumno" /><br />		
		<input type = "submit" value="Enviar" name="enviar"/><br />
	</form>
	<?php
	 if (isset($_GET["enviar"])) {
		$alumnos  = array("Ana","Pepe", "Cristina", "Jorge", "Luisa" );

		//existe una funcion in_array(valor, array)  que busca un valor en un array y devuelve true o false
		//$nombre=$_GET["alumno"];
		//if (in_array($nombre, $alumnos)){ echo "encontrado"}
		//echo array_search($nombre, $alumnos);   si lo encuentra te devuelve la posisicon y si no false
		$encontrado = false;
		for ($i=0; $i<=count($alumnos)-1;$i++){  //sizeof($alumnos)
			if ($_GET["alumno"]== $alumnos[$i])  {
				$encontrado= true;
			}

		}

		if ($encontrado) {
			echo "<br/>Alumno Encontrado";
		} else {
		  echo "<br/>Alumno no encontrado";
		}
	}	
	?>
</body>
</html>