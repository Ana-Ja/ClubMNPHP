<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#paginacion{
			list-style: none;
		}
		#paginacion li {
		    display: inline;
		    margin: 5px;
		    background-color: lightgrey;
		    padding: 2px 5px 2px 5px;
		    border-radius: 5px;
		}

		#paginacion li a {
		    text-decoration: none;
		    color: black;
		}

		#paginacion li a:visited {
		    color: black;
		}
	</style>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<script>
	$(document).ready(cargarMunicipios);

	function cargarMunicipios(){
		<?php
			$pagina = (isset($_GET['pag'])? $_GET['pag']:1);
		?>
		var pagina=<?php echo $pagina; ?>;
		var items_por_pagina=10;
		var parametros ={
			"funcion":"obtenerMunicipios",
			"pagina":pagina,
			"items_por_pagina":items_por_pagina
		}

		$.ajax({
			url: 'webservice.php',
			type: 'POST',
			data: parametros,
			dataType: 'json',
			success: function (data,textStatus,jqxhr){
				$("#municipios").html("");
				mostrarPaginacion(data[0]);
				for (var i=1;i<=data.length;i++){
					$("#municipios").append(data[i]["id"]+"-"+data[i]['municipio']+"</br>");
				}
				
			},
			error: function(jqxhr, textStatus, errorMessage){
				alert (textStatus+" "+errorMessage);
			}
		});
	}

	function mostrarPaginacion(num){
		//alert(num['numMunicipios']);
		var paginas = Math.floor(num['numMunicipios']/10);
		
		//tengo que obtener la página actual
		<?php
			$paginaActual = (isset($_GET['pag'])? $_GET['pag']:1);
		?>
		var paginaActual = <?php echo $paginaActual; ?>;
	
		var paginacion = "<li><a href='?pag=1'>1</a></li>";
		if (paginaActual==1){
			//no existe página anterior porque estoy en la primera
			var paginaAnterior = "";
			//borro el enlace de la página 1.
			paginacion = "";
		}else if(paginaActual==2){
			paginacion = "";
			var paginaAnterior = "<li><a href='?pag="+(paginaActual-1)+"'>"+(paginaActual-1)+"</a></li>";

		}else{
			var paginaAnterior = "<li><a href='?pag="+(paginaActual-1)+"'>"+(paginaActual-1)+"</a></li>";
		}
		

		var paginaPosterior = "<li><a href='?pag="+(paginaActual+1)+"'>"+(paginaActual+1)+"</a></li>";

		paginacion +=paginaAnterior+paginaActual+paginaPosterior;

		paginacion += "<li><a href='?pag="+paginas+"'>"+paginas+"</a></li>";
		$("#paginacion").append(paginacion);
		for (var i=1;i<=paginas;i++){
			//$("#paginacion").append(i+",");
		}
	}
	</script>
</head>
<body>
	<div id="municipios" class="bloque1">
		
	</div>
	<ul id="paginacion">
		
	</ul>
</body>
</html>