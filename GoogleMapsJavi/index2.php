<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="./gmaps.js"></script>


	<script type="text/javascript">
	var map;

	var recorrido=[];

    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
      });



      map.addListener("click", function(e){
      		map.setCenter(e.latLng);
      });


      map.setContextMenu({
		  control: 'map',
		  options: [{
		    title: 'Marcar como origen',
		    name: 'add_origin',
		    action: function(e) {
		    	this.setCenter(e.latLng.lat(), e.latLng.lng());
		   		var punto = [e.latLng.lat(),e.latLng.lng()];
		   		//añado las coordendas a la lista
		   		var htmlPunto = "<li>lat:"+e.latLng.lat()+",lng:"+e.latLng.lng()+"</li>"
		   		$("#lista-puntos").append(htmlPunto);
		   		recorrido.push(punto);
			      this.addMarker({
			        lat: e.latLng.lat(),
			        lng: e.latLng.lng(),
			        title: 'Origen'
			      });
		    }
		  },{
		  	title: 'Punto de paso',
		  	name:'point',
		  	action: function(e){
		  		this.setCenter(e.latLng.lat(), e.latLng.lng());
		  		var punto = [e.latLng.lat(),e.latLng.lng()];
		   		var htmlPunto = "<li>lat:"+e.latLng.lat()+",lng:"+e.latLng.lng()+"</li>"
		   		$("#lista-puntos").append(htmlPunto);
		   		recorrido.push(punto);
			      this.addMarker({
			        lat: e.latLng.lat(),
			        lng: e.latLng.lng(),
			        title: 'Punto'
			      });

		  	}
		  } 
		  ,{
		    title: 'Marcar como destino',
		    name: 'add_destiny',
		    action: function(e) {
		    	var punto = [e.latLng.lat(),e.latLng.lng()];
		   		var htmlPunto = "<li>lat:"+e.latLng.lat()+",lng:"+e.latLng.lng()+"</li>"
		   		$("#lista-puntos").append(htmlPunto);
		   		recorrido.push(punto);
			      this.addMarker({
			        lat: e.latLng.lat(),
			        lng: e.latLng.lng(),
			        title: 'Destino'
			      });
		      this.setCenter(e.latLng.lat(), e.latLng.lng());
		      dibujarRuta();
		    }
		  }]
		});


    });

	function cambioComunidad(){
		//accedo al elemento con id comunidades mediante jquery
		var idComunidad = $("#comunidades").val();

		//tengo que obtener las provincias de dicha comunidad
		var parametros = {
				"funcion":"obtenerProvincias",
				"idComunidad":idComunidad
			}
		$.ajax({
			url: './webservice.php', //dirección donde se encuentra el webservice
			type: 'POST', //método que se va a utilizar para el envío de los datos
			data: parametros, //variables que quiero pasar al webservice
			dataType: 'json', //formato de los datos que va a devolver el webservice
			success: function(data, textStatus, jqxhr){
				//alert (JSON.stringify(data));
				//alert (data.length);
				//data es un array con las provincias
				var selectProvincias = "<option value='0'>------</option>";
				for (var i=0;i<data.length;i++){
					//alert (data[i]['id']+"-"+ data[i]['provincia']);
					selectProvincias = selectProvincias+ "<option value='"+data[i]['id']+"'>"+data[i]['provincia']+"</option>";
				}
				//alert (selectProvincias);
				$("#provincias").html(selectProvincias);
			},
			error: function (jqxhr, textStatus, errorMessage){
				alert(textStatus+" "+errorMessage);
			}
		});
	}

	function obtenerMunicipios(){
		var idProvincia = $("#provincias").val();

		var parametros = {
				"funcion":"obtenerMunicipios",
				"idProvincia":idProvincia
			}
		$.ajax({
			url: './webservice.php', //dirección donde se encuentra el webservice
			type: 'POST', //método que se va a utilizar para el envío de los datos
			data: parametros, //variables que quiero pasar al webservice
			dataType: 'json', //formato de los datos que va a devolver el webservice
			success: function(data, textStatus, jqxhr){
				var selectMunicipios = "<option value='0'>------</option>";
				for (var i=0;i<data.length;i++){
					//alert (data[i]['id']+"-"+ data[i]['provincia']);
					selectMunicipios = selectMunicipios+ "<option value='"+data[i]['id']+"'>"+data[i]['municipio']+"</option>";
				}
				$("#municipios").html(selectMunicipios);
			},
			error: function (jqxhr, textStatus, errorMessage){
				alert(textStatus+" "+errorMessage);
			}
		});
	}

	function municipioSeleccionado(){
		var idMunicipio = $("#municipios").val();

		var parametros = {
				"funcion":"obtenerMunicipio",
				"idMunicipio":idMunicipio
			}
		$.ajax({
			url: './webservice.php', //dirección donde se encuentra el webservice
			type: 'POST', //método que se va a utilizar para el envío de los datos
			data: parametros, //variables que quiero pasar al webservice
			dataType: 'json', //formato de los datos que va a devolver el webservice
			success: function(data, textStatus, jqxhr){
				if (municipioOrigen.length==0){
					municipioOrigen=[data['latitud'],data['longitud']];
				}else{
					municipioDestino=[data['latitud'],data['longitud']];
					dibujarRuta2();
				}

				//map.setCenter(data['latitud'],data['longitud']);
				var latlng = new google.maps.LatLng(data['latitud'],data['longitud']);
				map.panTo(latlng);
				map.setZoom(9);
				map.addMarker({
				  lat: data['latitud'],
				  lng: data['longitud'],
				  title: data['municipio'],
				  click: function(e) {
				    alert('Estás visitando '+data['municipio']);
				  }
				});
			},
			error: function (jqxhr, textStatus, errorMessage){
				alert(textStatus+" "+errorMessage);
			}
		});
	}


	function dibujarRuta(){
		//var latlngOrigen = new google.maps.LatLng();
		//var latlngDestino = new google.maps.LatLng();

		for (var i=0;i<recorrido.length-1;i++){
			map.drawRoute({
			  origin: [recorrido[i][0],recorrido[i][1]],
			  destination: [recorrido[i+1][0],recorrido[i+1][1]],
			  travelMode: 'driving',
			  strokeColor: '#131540',
			  strokeOpacity: 0.6,
			  strokeWeight: 6
			});
		}
	}

	function limpiarMapa(){
		map.removeMarkers();
		map.cleanRoute();
	}


	</script>
</head>
<body>
	Selecciona comunidad
	<?php
		include './conexion.php';
		$comunidadesSelect = "SELECT * from comunidades";
		$conexion = conectar();
		$resultado = $conexion->query($comunidadesSelect);

	?>
	<select name="comunidades" id="comunidades" onchange="cambioComunidad()">
		<?php
			while ($fila = $resultado->fetch_assoc()) {
				$idComunidad = utf8_encode($fila['id']);
				$nombreComunidad = utf8_encode($fila['comunidad']);
				echo '<option value="'.$idComunidad.'">'.$nombreComunidad.'</option>';
			}
		?>
	</select>

	<div id="contenedorProvincias">
		<select name="provincias" id="provincias" onchange="obtenerMunicipios()">
			
		</select>
	</div>
	<div id="contenedorMunicipios" onchange="municipioSeleccionado()">
		<select name="municipios" id="municipios">
			
		</select>
	</div>
	<div id="map" style="float:left;height:500px;width:50%"></div>
	<div id="puntos" style="float:left;width:50%">
		Puntos:
		<ul id="lista-puntos">
			
		</ul>
	</div>
	<div style="clear:both">
		<button onclick="limpiarMapa()" >Limpiar</button>
	</div>
	
</body>
</html>