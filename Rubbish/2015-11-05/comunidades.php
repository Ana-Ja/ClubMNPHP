<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="./spin.min.js"></script>
	 <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
	 <script type="text/javascript" src="./gmaps.js"></script>
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
		 		dataType: 'json', //formato de los datos que va a devolver el websrvice
		 		success:function(data, textStatus,jqxhr){
		 			//data:datos que devuelve
		 			//jqxhr: informacion de la peticion
		 			//textStatus:informacion del estado
		 			var texto="";
		 			texto = "Provincias: <select type='text' id='provincia' >";
		 			texto= texto +  "<option value='0'>-------------</option>";
		 			console.log(data);
		 			//alert(JSON.stringify(data)); //convierte el JSON a string que es lo que necesita el alert
		 			//var array = JSON.parse(data);
		 			for (var i in data) {
		 			//for (var i=0; i<data.length;i++){
		 			
		 				
		 				texto= texto + "<option value='" + data[i].id +"' >" +data[i]['provincia'] +"</option>";
		 			}
		 			$('#div_provincias').html(texto);
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
		 			beforeSend: function() {
		 				$("esperando").html("Procesando, espere por favor");
		 				//$("esperando").spin({radius:3,width:2, height:2, length:4});
		 			},
		 			dataType: 'html', //formato de los datos que va a devolver el websrvice
		 			success:function(result_html, textStatus,jqxhr){
		 				//data:datos que devuelve
		 				//jqxhr: informacion de la peticion
		 				//textStatus:informacion del estado
		 				$('#div_ciudades').html(result_html);
		 				$('#div_ciudades').css("display", "block");
		 			},
		 			error:function(jqxhr, estado, errorMessage){
		 				alert(textStatus+ "" +errorMessage);
		 				console.log(estado);
		 				console.log(errorMessage);
		 			},
		 			//este codigo 'complete' se ejecuta despues del success
		 			//o despues del error
		 			complete: function(jqxhr, estado) {
		 				//el estado puede ser: success, notmodified,
		 				//timeout, error, abort, parseerror
		 				console.log(estado);
		 			},
		 			//la peticion espera la respuesta cada x milisegungos
		 			//si pasa ese tiempo saldra por error
		 			 timeout:10000
		 		});

map = new GMaps({
       div: '#map',
       lat: -12.043333,
       lng: -77.028333
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
		
		echo "<option value='0'>--------</option>";
			while ($fila = $resultado->fetch_assoc()) {
				
				echo "<option value='".$fila['id']."' >".utf8_encode($fila['comunidad'])."</option>";
			}
		
	?>
	
	</select>
	<div id='div_provincias'></div>
	<div id='div_ciudades'></div>
	<div id='esperando'></div>
	<div id='map' style="height:500px"></div>
	</form>

</body>
</html>