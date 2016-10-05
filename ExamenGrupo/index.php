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

		
		?>
			<form action="" method="POST">
				Nombre:<input type="text" name="nombre" value ="ana"/><br/>
				Edad:<input type="text" name="edad" value ="18"/ /><br/>
				DNI:<input type="text" name="dni" value ="33419009D" /><br/>
				Sexo<input type="text" name="sexo" value ="M"//>
				Peso<input type="text" name="peso" value ="62"//>
				Altura<input type="text" name="altura" value ="1.67" /><br/><br/>

				<input type="submit" value="Acceder" name="Validar"/>
			</form>
			<?php
			

			if (isset($_POST["Validar"])){
				//obtengo los datos del formulario
				$persona1 = new Persona($_POST['nombre'],$_POST['edad'] , $_POST['dni'], $_POST['sexo'], $_POST['peso'], $_POST['altura']);
				$persona2 = new Persona($_POST['nombre'],$_POST['edad'] , $_POST['dni'], $_POST['sexo'], 0,0 );
				$persona3 = new Persona("",0,"","",0,0);
				$persona3->setNombre("Angel");
				$persona3->setEdad("4");
				$persona3->setDni("12345678Z");
				$persona3->setSexo("H");
				$persona3->setPeso("88");
				$persona3->setAltura("1.92");
			


				$personas = array($persona1,$persona2, $persona3);
				
				foreach ($personas as $key => $persona) {
					
					echo "<br/><strong>NOMBRE:</strong> " . $persona->getNombre()."<br/>";
					echo "<strong>EDAD: </strong>" . $persona->getEdad().".";
					if ($persona->esMayorEdad($persona->getEdad())) {

						echo  " Es mayor de edad "."<br/>";
					} else {
						echo  " Es menor de edad "."<br/>";
					  //echo $persona->getNombre(). "  ".$persona->esMayorEdad($persona->getEdad()) ? "Mayor de edad<br/>" : "Menor de edad<br/>";
					}
					echo "<strong>DNI:</strong> " . $persona->getDNI()."<br/>";
					echo "<strong>SEXO: </strong>" . $persona->getSexo()."<br/>";
					echo "<strong>PESO:</strong> " . $persona->getPeso()."<br/>";
					echo "<strong>ALTURA: </strong>" . $persona->getAltura().". ";
					if ($persona->calcularIMC() == 1) {
					  echo  " Tiene sobrepeso "."<br/>";
					}else if ($persona->calcularIMC() == -1) {
						echo " Está por debajo del peso ideal "."<br/>";
					}	 else  {
					    echo  " Está por debajo del peso ideal "."<br/>";
					}
					echo "<br/><br/>";
				}
				
			}
			
			?>

	
</body>
</html>