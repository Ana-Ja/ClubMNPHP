<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>Introducir Ciudades</h1>
	<!-- utilizar objetos para guardar nombre, coordenadas y habitantes de ciudades.
	Las coordenadas serán atributos privados, el resto serán publicos.
	SE deberán poder crear ciudades a partir de un formulario. -->
	<script type="text/javascript">
		function anadirCiudad(){
			var div = document.createElement("div");
			div.innerHTML = 'Nombre: <input type="text" name="nombre[]" />'+
				'Provincia: <input type="text" name="provincia[]" />'+
				'Nº Habitantes: <input type="text" name="habitantes[]" />';
			document.getElementById("formulario").appendChild(div);
		}
		window.onload = function() {
			document.getElementById("nueva").onclick = anadirCiudad;
		}	
	</script>
	<form action="" id="formulario" method="POST">
		 
		<input type="button" name="nueva" id= "nueva" value="Añadir Ciudad" />
		<br/><br/>
		Provincia a Buscar:<input type="text" name="buscar" / >
		<input type="submit" name="ordenar" value ="Ordenar"/>
	</form>


	<?php
	include './Ciudad.php';
	$array_ciudades  = array( );
	if (isset($_POST['ordenar'])){
		foreach ($_POST['nombre'] as $key => $value) {
			$ciudad = new Ciudad($_POST['nombre'][$key],$_POST['habitantes'][$key] , $_POST['provincia'][$key]);
			array_push($array_ciudades, $ciudad);
		}
		

		
		//visualizo datos
		// foreach ($array_ciudades as $key => $ciudad) {
		// 	echo $ciudad->nombre. " tiene ".$ciudad->habitantes." y su provincia es ".$ciudad->provincia."<br/>";
		// }
		// echo "<br/>";
		//ordenar la provincia				

		usort($array_ciudades, array("Ciudad", "ordenar_habitantes"));
		echo "<br/><h2>Ordenado con usort y lo visualizo en json</h2><br/>";
		foreach ($array_ciudades as $item) {
		    print_r(json_encode($item));
		}


		$buscar =  $_POST['buscar'];
		if ($buscar == "") {

	    	echo "No ha introducido texto a buscar";
		}
		 echo "<h2> Ciudades que pertenecen a la provincia de ".$buscar."</h2><br/>";		
		foreach ($array_ciudades as $key => $ciudad) {
			if ($ciudad->provincia === $buscar)  {
				echo $ciudad->nombre. " tiene ".$ciudad->habitantes."<br/>";
			}
			
		}
	}

	?>

</body>
</html>