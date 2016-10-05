<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Examen Final Prueba 1</title>
</head>
<body>
		<?php
		include_once 'cliente.class.php';
		include_once 'vehiculo.class.php';
		include_once 'alquiler.class.php';
		
		?>
			<form action="" method="POST">
				<fieldset>
				<legend>Datos Vehiculo:</legend>
				Marca:<input type="text" name="marca" value ="seat"/><br/>
				Modelo:<input type="text" name="modelo" value ="ibiza"/><br/>
				Matricula:<input type="text" name="matricula" value ="7745-FCC"/><br/>
				</fieldset>

				<fieldset>
				<legend>Datos Cliente:</legend>
				Nombre:<input type="text" name="nombre" value ="Luis" /><br/>
				DNI:<input type="text" name="dni" value ="12345678Z" /><br/>
				Codigo:<input type="text" name="codigo" value ="CCCCC" /><br/>
				Telefono:<input type="text" name="telefono" value ="5555555" /><br/>
				</fieldset>

				<fieldset>
				<legend>Datos Alquiler:</legend>
				Fecha:<input type="text" name="fecha" value ="2015/11/13" /><br/>
				</fieldset>
				<br/>
				<input type="submit" value="Grabar" name="Validar"/>
			</form>
			<?php
			

			if (isset($_POST["Validar"])){
				//obtengo los datos del formulario
				$vehiculo = new Vehiculo($_POST['marca'],$_POST['modelo'] , $_POST['matricula']);
				$cliente = new Cliente($_POST['nombre'],$_POST['dni'] , $_POST['codigo'], $_POST['telefono']);
				//////////////////////////////////////////////////////////////////////////////
				//  realmente aqui debieramos grabar el id del vehiculo y el id del cliente //
				//  pero como no lo estamos creando con bd, guardo el nombre cliente y la   //
				//  marca del ccoche              											//
				//////////////////////////////////////////////////////////////////////////////
				$alquiler = new Alquiler($_POST['nombre'],$_POST['marca'] , $_POST['fecha']);
			
					echo "<br/><i><strong>DATOS VEHICULO:</i></strong> ";
					echo "<br/><strong>MARCA:</strong> " . $vehiculo->getMarca()."<br/>";
					echo "<strong>MODELO: </strong>" . $vehiculo->getModelo().".";
					echo "<br/><strong>MATRICULA:</strong> " . $vehiculo->getMatricula()."<br/>";

					echo "<br/><i><strong>DATOS CLIENTE:</i></strong> ";
					echo "<br/><strong>NOMBRE: </strong>" . $cliente->getNombre()."<br/>";
					echo "<strong>DNI:</strong> " . $cliente->getDNI()."<br/>";
					echo "<strong>CODIGO: </strong>" . $cliente->getCodigo()."<br/>";
					echo "<strong>TELEFONO:</strong> " . $cliente->getTelefono()."<br/>";

					echo "<br/><i><strong>DATOS ALQUILER:</i></strong> ";
					echo "<br/><strong>FECHA:</strong> " . $alquiler->getFecha()."<br/>";


					echo "<br/><br/>";
			}
				
			
			
			?>

	
</body>
</html>