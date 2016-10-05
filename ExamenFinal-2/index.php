<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Examen Final Prueba 3</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function() {
		 	$("#hotel").change(ObtenerPaquetes);

		 	console.log ("aqui");
		 	
		});

		 function ObtenerPaquetes() {
		 	var hotel = $("#hotel").val();
		 	var params = {
				"hotel": hotel, 
				"funcion": "ObtenerPaquetes"
			};
		 	$.ajax({
		 		url: 'webService.php',//direccion donde esta el web service
		 		type: 'POST', //metpdp que se va a utilizar para el envio de datos
		 		data: params,
		 		dataType: 'json', //formato de los datos que va a devolver el websrvice
		 		success:function(data, textStatus,jqxhr){
		 			var texto="";
		 			texto = "Paquetes: <select type='text' id='paquete' >";
		 			texto= texto +  "<option value='0'>-------------</option>";
		 			
		 			for (var i in data) {
		 				texto= texto + "<option value='" + data[i].id +"' >" +data[i]['nombre'] +"</option>";
		 			}
		 			alert(JSON.stringify(data));
		 			$('#div_paquetes').html(texto);
		 		},
		 		error:function(jqxhr, textStatus, errorMessage){
		 			alert(textStatus+ "" +errorMessage);
		 		}
		 	});
		 }

		

	</script>	 
</head>
<body>
	<form id ="form_id">
		Hoteles: <select type="text" id="hotel" >
		<?php
			include_once './conexion.php';
			$consulta = "select * from hotel";
			$conexion = conectar();
			$resultado= $conexion->query($consulta);
			
			echo "<option value='0'>--------</option>";
				while ($fila = $resultado->fetch_assoc()) {
					echo "<option value='".$fila['id']."' >".utf8_encode($fila['nombre'])."</option>";
				}
		?>
		</select>
		<div id='div_paquetes'></div>
	
	</form>
</body>
</html>