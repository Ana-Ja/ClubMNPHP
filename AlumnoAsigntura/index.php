<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	include './Asignatura.php';
	include './Alumno.php';
	$alumno1 = new Alumno("ana", "jarauta", "Micalle", "5555555", "123456789");
	$alumno2 = new Alumno("eva", "perez", "Lavida", "43434343", "43432432423");
	$alumno3 = new Alumno("pepe", "casas", "La Muerte", "2222222", "125327679");
	$asignatura1 = new Asignatura("matematicas", $descripcion="matematicas aplicadas", 5, "01/01/2015", "01/05/2015");
	$asignatura2 = new Asignatura("lenguaje", $descripcion="lenguaje aplicadas",20, "01/01/2015", "01/05/2015");
	$alumno1->matricular($asignatura1);
	$alumno1->matricular($asignatura2);

	var_dump($alumno1);
	var_dump($alumno1->getAsignatura()[1] ); //accedo a una asignatura del array asignaturas
	echo "Datos de la 2 asignatura del alumno ";
	var_dump($alumno1->DatosAsignatura(1)) ;
	echo "<br/>";
	print_r(json_encode($alumno1,3));  //no me enseña las asginaturas pq son privadas

	echo "<br/>Tiene asignatura matematicas? ";
	echo ($alumno1->consultar("matematicas")) ? "SI" : "NO";
	?>
</body>
</html>
