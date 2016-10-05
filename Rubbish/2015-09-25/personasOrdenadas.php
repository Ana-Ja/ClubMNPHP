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
				Nombre1<input type="text" name="nombre1" value ="a"/>
				Apellido1<input type="text" name="apellido1" value ="a"/ />
				Altura1<input type="text" name="altura1" /><br/>
				Nombre2<input type="text" name="nombre2" value ="b"//>
				Apellido2<input type="text" name="apellido2" value ="b"//>
				Altura2<input type="text" name="altura2" /><br/>
				Nombre3<input type="text" name="nombre3" value ="c"//>
				Apellido3<input type="text" name="apellido3" value ="c"//>
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
			echo "Ordenado multisort<br/>";
			array_multisort($altura, $apellido, $nombre);
			echo "Ordenado multisort<br/>";
			print_r($altura);
			print_r($apellido);
			print_r($nombre);
 		  //
			$persona[0][0]=$_POST['altura1'];
			$persona[0][1]=$_POST['apellido1'];
			$persona[0][2]=$_POST['nombre1'];
			$persona[1][0]=$_POST['altura2'];
			$persona[1][1]=$_POST['apellido2'];
			$persona[1][2]=$_POST['nombre2'];
			$persona[2][0]=$_POST['altura3'];
			$persona[2][1]=$_POST['apellido3'];
			$persona[2][2]=$_POST['nombre3'];
			echo "<br/>Ordenado multisort 2 manera<br/>";
			array_multisort($persona);
			print_r(json_encode($persona));

			if (($persona1->$altura < $persona2->altura) && ($persona1->altura < $persona3->altura)) {
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

			echo "<br/>Ordenado manualmente<br/>";
		print_r(json_encode($array));

		}

	?>
</body>
</html>