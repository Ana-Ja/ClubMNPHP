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

		if (!isset($_POST["enviar"])){
		?>
			<form action="" method="POST">
				Nombre1<input type="text" name="nombre1" value ="ana"/>
				Apellido1<input type="text" name="apellido1" value ="jarauta"/ />
				Altura1<input type="text" name="altura1" /><br/>
				Nombre2<input type="text" name="nombre2" value ="eva"//>
				Apellido2<input type="text" name="apellido2" value ="perez"//>
				Altura2<input type="text" name="altura2" /><br/>
				Nombre3<input type="text" name="nombre3" value ="javier"//>
				Apellido3<input type="text" name="apellido3" value ="martinez"//>
				Altura3<input type="text" name="altura3" />
				<input type="submit" value="Acceder" name="enviar"/>
			</form>
		<?php
		}

		//pregunto si he apretado el botón de enviar
		if (isset($_POST["enviar"])){
			//obtengo los datos del formulario
			$persona1 = new Persona($_POST['nombre1'],$_POST['apellido1'] , $_POST['altura1']);

			$persona2 = new Persona($_POST['nombre2'],$_POST['apellido2'] , $_POST['altura2']);

			$persona3 = new Persona($_POST['nombre3'],$_POST['apellido3'] , $_POST['altura3']);
			// primera manera, ordena por el 1 array del multisort
			$apellido[0]=$_POST['apellido1'];
			$apellido[1]=$_POST['apellido2'];
			$apellido[2]=$_POST['apellido3'];
			$altura[0]=$_POST['altura1'];
			$altura[1]=$_POST['altura2'];
			$altura[2]=$_POST['altura3'];
			$nombre[0]=$_POST['nombre1'];
			$nombre[1]=$_POST['nombre2'];
			$nombre[2]=$_POST['nombre3'];
			array_multisort($altura, $apellido, $nombre);
			echo "<h1>MULTISORT</h1>";
			echo "<br/><h2>Ordenado con multisort 1ª manera </h2><br/>";
			echo "Array  alturas<br/>";
			print_r($altura);
			echo "<br/>Array apellidos<br/>";
			print_r($apellido);
			echo "<br/>Array nombres<br/>";
			print_r($nombre);
			function mezclar ( $altura, $apellido, $nombre){
				//voy a mezclar los 3 arrays para dejar uno
				//busco el mayor tamaño de todos los arrays
				$maximo = max(sizeof($altura), sizeof($apellido),sizeof($nombre));
				$union =array( );
				for ($i=0; $i<= $maximo-1; $i++){
					$union[$i][0] = $altura[$i];
					$union[$i][1] = $apellido[$i];
					$union[$i][2] = $nombre[$i];
				}
				return $union;
			}
			echo "<br/><h2>Ahora  mezclo los 3 arrays</h2><br/>";
			print_r(mezclar ( $altura, $apellido, $nombre));


 		  //Ordenado con multisort 2ª manera y mas sencillo
			echo "<br/><h2>Ordenado con multisort 2ª manera y mas sencillo</h2><br/>";
			$persona[0][0]=$_POST['altura1'];
			$persona[0][1]=$_POST['apellido1'];
			$persona[0][2]=$_POST['nombre1'];
			$persona[1][0]=$_POST['altura2'];
			$persona[1][1]=$_POST['apellido2'];
			$persona[1][2]=$_POST['nombre2'];
			$persona[2][0]=$_POST['altura3'];
			$persona[2][1]=$_POST['apellido3'];
			$persona[2][2]=$_POST['nombre3'];
			
			array_multisort($persona);
			print_r(json_encode($persona));

			echo "<h1>COMPARANDO</h1>";
			if (($persona1->altura < $persona2->altura) && ($persona1->altura < $persona3->altura)) {
				if ($persona2->altura< $persona3->altura) {
					$array[0] = $persona1;
					$array[1] = $persona2;
					$array[2] = $persona3;
				}else {
					$array[0] = $persona1;
					$array[1] = $persona3;
					$array[2] = $persona2;
				}

			} elseif (($persona2->altura < $persona3->altura) && ($persona2->altura < $persona1->altura)) {
					if  ($persona3->altura < $persona1->altura) {
						$array[0] = $persona2;
						$array[1] = $persona3;
						$array[2] = $persona1;
					} else {
						$array[0] = $persona2;
						$array[1] = $persona1;
						$array[2] = $persona3;
					}
			}	else {
				if  ($persona1->altura < $persona2->altura)   {
					$array[0] = $persona3;
					$array[1] = $persona1;
					$array[2] = $persona2;
				} else {
					$array[0] = $persona3;
					$array[1] = $persona2;
					$array[2] = $persona1;
				}
			}

			echo "<br/><h2>Ordenado manualmente y lo visualizo en json</h2><br/>";
		print_r(json_encode($array));

		
		// Echo con usort

		$a[] = $persona1;
		$a[] = $persona2;
		$a[] = $persona3;

		usort($a, array("Persona", "ordenar_altura"));
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