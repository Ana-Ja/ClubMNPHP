<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		

		 $(document).ready(function() {
		 	var form = document.getElementById("form_id");
		 	document.getElementById("comunidad").addEventListener("change", ObtenerProvincias);
		 	
		 });

		 function ObtenerProvincias() {
		 	var comunidad = $("#comunidad").val();
		 	var params = {
				"comunidad": comunidad, 
				"funcion": "obtenerProvincias"
			};
		 	$.ajax({
		 		url: './funciones.php',//direccion donde esta el web service
		 		type: 'POST', //metpdp que se va a utilizar para el envio de datos
		 		//data:'base='+base+'&altura='+altura , //variables que quiero pasar al webservice
		 		//data: 'comunidad='+comunidad , //variables que quiero pasar al webservice
		 		data: params,
		 		//beforeSend: function() {
		 		//	$("esperar".html("Procesando, espere por favor"));
		 		//},
		 		dataType: 'html', //formato de los datos que va a devolver el websrvice
		 		success:function(result_html, textStatus,jqxhr){
		 			//data:datos que devuelve
		 			//jqxhr: informacion de la peticion
		 			//textStatus:informacion del estado
		 			$('#div_provincias').html(result_html);
		 			$('#div_ciudades').css("display", "none");
		 			document.getElementById("provincia").addEventListener("change", ObtenerCiudades);
		 		},
		 		error:function(jqxhr, textStatus, errorMessage){
		 			alert(textStatus+ "" +errorMessage);
		 		}
		 	});
		 }
		 	function ObtenerCiudades() {
		 		var provincia = $("#provincia").val();
		 		var params = {
				"provincia": provincia, 
				"funcion": "obtenerCiudades"
			};
		 		$.ajax({
		 			url: './funciones.php',//direccion donde esta el web service
		 			type: 'POST', //metpdp que se va a utilizar para el envio de datos
		 			//data:'base='+base+'&altura='+altura , //variables que quiero pasar al webservice
		 			//data: 'provincia='+provincia , //variables que quiero pasar al webservice
		 			data: params,
		 			//beforeSend: function() {
		 			//	$("esperar".html("Procesando, espere por favor"));
		 			//},
		 			dataType: 'html', //formato de los datos que va a devolver el websrvice
		 			success:function(result_html, textStatus,jqxhr){
		 				//data:datos que devuelve
		 				//jqxhr: informacion de la peticion
		 				//textStatus:informacion del estado
		 				$('#div_ciudades').html(result_html);
		 				$('#div_ciudades').css("display", "block");
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
		Comunidades: <select type="text" id="comunidad" >
	<?php
		include_once './conexion.php';
		
		
		//hago la consulta
		$consulta = "select * from comunidades";
		$conexion = conectar();
		$resultado= $conexion->query($consulta);
		
		
			while ($fila = $resultado->fetch_assoc()) {
				echo "<option value='0'>--------</option>";
				echo "<option value='".$fila['id']."' >".utf8_encode($fila['comunidad'])."</option>";
			}
		
	?>
	
	</select>
	<div id='div_provincias'></div>
	<div id='div_ciudades'></div>
	</form>

</body>
</html>