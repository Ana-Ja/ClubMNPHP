<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		

		 $(document).ready(function() {
		 	var form = document.getElementById("form_id");
		 	document.getElementById("calculartri").addEventListener("click", CalcularArea('T'), true);
		 	document.getElementById("calcularrect").addEventListener("click", CalcularArea('R'));
		 	document.getElementById("area").addEventListener("click", CalcularArea('A'));
		 });
		function  CalcularVolumen() {
			var radio = $("#radio").val();
			var params = {
				"radio": radio, 
				"funcion": "VolumenEsfera"
			};
			$.ajax({
				url: './WebService.php',//direccion donde esta el web service
				type: 'POST', //metpdp que se va a utilizar para el envio de datos
				//data:'base='+base+'&altura='+altura , //variables que quiero pasar al webservice
				data: params , //variables que quiero pasar al webservice
				//beforeSend: function() {
				//	$("esperar".html("Procesando, espere por favor"));
				//},
				dataType: 'text', //formato de los datos que va a devolver el websrvice
				success:function(data, textStatus,jqxhr){
					//data:datos que devuelve
					//jqxhr: informacion de la peticion
					//textStatus:informacion del estado
					alert(data);
				},
				error:function(jqxhr, textStatus, errorMessage){
					alert(textStatus+ "" +errorMessage);
				}
			});

		}
		function CalcularArea(tipo) {
			var base = $("#base").val();
			var altura = $("#altura").val();
			var radio = $("#radio").val();
			var tipoFigura = tipo;
			//monto array de parametros
			var params = {
				"tipo":tipoFigura,
				"base": base,
				"altura":altura,
				"radio": radio, 
				"funcion": 'CalcularArea'
			};
				//me conecto al ajax a traves de jquery
				$.ajax({
					url: './WebService.php',//direccion donde esta el web service
					type: 'POST', //metpdp que se va a utilizar para el envio de datos
					//data:'base='+base+'&altura='+altura , //variables que quiero pasar al webservice
					data: params , //variables que quiero pasar al webservice
					beforeSend: function() {
						$("#esperar").html("Procesando, espere por favor");
					},
					dataType: 'text', //formato de los datos que va a devolver el websrvice
					success:function(data, textStatus,jqxhr){
						//data:datos que devuelve
						//jqxhr: informacion de la peticion
						//textStatus:informacion del estado
						alert(data);
					},
					error:function(jqxhr, textStatus, errorMessage){
						alert(textStatus+ "" +errorMessage);
					}
				});

		}

	</script>

</head>
<body>
	<form id="form_id" action>
		<div>
			<input type="text" id ="base" placeholder="Base">
		</div>
		<div>
			<input type="text" id ="altura" placeholder="Altura">
		</div>	
		<div>
			<input type="button" id ="calculartri" value="Calcular Triangulo" >
		</div>
		<div>
			<input type="button" id ="calcularrect" value="Calcular Rectangulo" >
		</div>
		<br/>	
		<div>
			<input type="text" id ="radio" placeholder="Radio">
		</div>	
		<div>
			<input type="button" id ="area" value="Calcular Area" >
		</div>
		<div>
			<input type="button" id ="volumen" value="Calcular Volumen" onclick="CalcularVolumen()">
		</div>	
	</form>

	<div id="esperar"></div>
	
</body>
</html>