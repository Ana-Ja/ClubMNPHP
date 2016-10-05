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
	<form action="" id="formulario" method="POST">
				Ciudad<input type="text" name="ciudad[]" value ="Tudela"/>
				Habitantes<input type="text" name="habitantes[]" value ="60"/ />
				Provincia<input type="text" name="provincia[]" value ="Navarra"/><br/>

				Ciudad<input type="text" name="ciudad[]" value ="Madrid"/>
				Habitantes<input type="text" name="habitantes[]" value ="25555"/ />
				Provincia<input type="text" name="provincia[]" value ="Madrd"/><br/>

				Ciudad<input type="text" name="ciudad[]" value ="Fontellas"/>
				Habitantes<input type="text" name="habitantes[]" value ="20"/ />
				Provincia<input type="text" name="provincia[]" value ="Navarra"/><br/>

				Ciudad<input type="text" name="ciudad[]" value ="Pamplona"/>
				Habitantes<input type="text" name="habitantes[]" value ="800"/ />
				Provincia<input type="text" name="provincia[]" value ="Navarra"/><br/>

				Ciudad<input type="text" name="ciudad[]" value ="Estella"/>
				Habitantes<input type="text" name="habitantes[]" value ="150"/ />
				Provincia<input type="text" name="provincia[]" value ="Navarra"/><br/>

		<br/><br/>
		Provincia a Buscar:<input type="text" name="buscar" / >
		<input type="submit" name="ordenar" value ="ordenar"/>
	</form>
	<?php
	include './Ciudad.php';

	   
	
	if (isset($_POST['ordenar'])){
		$ciudad1 = new Ciudad($_POST['ciudad'][0],$_POST['habitantes'][0] , $_POST['provincia'][0]);
		$ciudad2 = new Ciudad($_POST['ciudad'][1],$_POST['habitantes'][1] , $_POST['provincia'][1]);
		$ciudad3 = new Ciudad($_POST['ciudad'][2],$_POST['habitantes'][2] , $_POST['provincia'][2]);
		$ciudad4 = new Ciudad($_POST['ciudad'][3],$_POST['habitantes'][3] , $_POST['provincia'][3]);
		$ciudad5 = new Ciudad($_POST['ciudad'][4],$_POST['habitantes'][4] , $_POST['provincia'][4]);
		$array_ciudades  = array($ciudad1, $ciudad2,$ciudad3,$ciudad4,$ciudad5 );


		
		

		
		//visualizo datos
		 foreach ($array_ciudades as $key => $ciudad) {
		 	echo $ciudad->nombre. " tiene ".$ciudad->habitantes." y su provincia es ".$ciudad->provincia."<br/>";
		 }
		 echo "<br/>";
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