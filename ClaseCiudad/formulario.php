<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	include './Ciudad.php';
	if (!isset($_POST["enviar"])){
	?>
		<form action="" method="POST">
			Nombre<input type="text" name="nombre[]" value ="Pamplona"/>
			Habitantes<input type="text" name="habitantes[]" value ="25555"/ />
			Longitud<input type="text" name="longitud[]" value ="25.2222"/>
			Latitud<input type="text" name="latitud[]" value ="58.12457"//><br/>

			Nombre2<input type="text" name="nombre[]" value ="Valladolid"/>
			Habitantes2<input type="text" name="habitantes[]" value ="40000"/ />
			Longitud2<input type="text" name="longitud[]" value ="45.2222"/>
			Latitud2<input type="text" name="latitud[]" value ="57.12457"//><br/>

			Nombre3<input type="text" name="nombre[]" value ="Sevilla"/>
			Habitantes3<input type="text" name="habitantes[]" value ="23000"/ />
			Longitud3<input type="text" name="longitud[]" value ="78.2222"/>
			Latitud3<input type="text" name="latitud[]" value ="25.12457"//><br/>
			<input type="submit" value="Acceder" name="enviar"/>
		</form>
	<?php
	}

	if (isset($_POST["enviar"])){
		//obtengo los datos del formulario
		$ciudad1 = new Ciudad($_POST['nombre'][0],$_POST['habitantes'][0] , $_POST['longitud'][0], $_POST['latitud'][0]);
		$ciudad2 = new Ciudad($_POST['nombre'][1],$_POST['habitantes'][1] , $_POST['longitud'][1], $_POST['latitud'][1]);
		$ciudad3 = new Ciudad($_POST['nombre'][2],$_POST['habitantes'][2] , $_POST['longitud'][2], $_POST['latitud'][2]);

		$ciudades = array($ciudad1,$ciudad2, $ciudad3);
		//visualizo datos
		foreach ($ciudades as $key => $ciudad) {
			echo $ciudad->nombre. " tiene ".$ciudad->habitantes." y su longitud es ".$ciudad->getLongitud()." y su latitud es ".$ciudad->getLatitud()."<br/>";
		}
		echo "<br/>";
		var_dump($ciudad1);
		print_r(json_encode($ciudad1));  //no me enseña las asginaturas pq son privadas
		var_dump($ciudad2);
		print_r(json_encode($ciudad2));  //no me enseña las asginaturas pq son privadas
		var_dump($ciudad3);
		print_r(json_encode($ciudad3));  //no me enseña las asginaturas pq son privadas
		//ordenar por habitantes
		$a[] = $ciudad1;
		$a[] = $ciudad2;
		$a[] = $ciudad3;

		usort($a, array("Ciudad", "ordenar_habitantes"));
		echo "<br/><h2>Ordenado con usort y lo visualizo en json</h2><br/>";
		foreach ($a as $item) {
		  //  echo $item->altura . "\n";
			echo "<br/>";
		    print_r(json_encode($item));
		}
		
	}
	
	?>
</body>
</html>