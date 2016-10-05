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
				'Longitud: <input type="text" name="longitud[]" />'+
				'Latitud: <input type="text" name="latitud[]" />'+
				'Nº Habitantes: <input type="text" name="habitantes[]" />';
			document.getElementById("formulario").appendChild(div);
		}
		window.onload = function() {
			document.getElementById("nueva").onclick = anadirCiudad;
		}	
	</script>
	<form action="" id="formulario" method="POST">
		
		<input type="button" name="nueva" id= "nueva" value="Añadir Ciudad" />
		<input type="submit" name="Enviar"/>
	</form>


	<?php
	include './Ciudad.php';
	if (isset($_POST['Enviar'])){
		$array_ciudades  = array( );
		foreach ($_POST['nombre'] as $key => $value) {
			$ciudad = new Ciudad($_POST['nombre'][$key],$_POST['habitantes'][$key] , $_POST['longitud'][$key], $_POST['latitud'][$key]);
			array_push($array_ciudades, $ciudad);
		}
		//$ciudad1 = new Ciudad($_POST['nombre'][0],$_POST['habitantes'][0] , $_POST['longitud'][0], $_POST['latitud'][0]);
		//$ciudad2 = new Ciudad($_POST['nombre'][1],$_POST['habitantes'][1] , $_POST['longitud'][1], $_POST['latitud'][1]);
		//$ciudad3 = new Ciudad($_POST['nombre'][2],$_POST['habitantes'][2] , $_POST['longitud'][2], $_POST['latitud'][2]);

		//$ciudades = array($ciudad1,$ciudad2, $ciudad3);
		//visualizo datos
		foreach ($array_ciudades as $key => $ciudad) {
			echo $ciudad->nombre. " tiene ".$ciudad->habitantes." y su longitud es ".$ciudad->getLongitud()." y su latitud es ".$ciudad->getLatitud()."<br/>";
		}
		echo "<br/>";
	}

	?>

</body>
</html>