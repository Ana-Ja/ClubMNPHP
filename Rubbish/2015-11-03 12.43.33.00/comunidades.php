<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		

		 $(document).ready(function() {
		 	var form = document.getElementById("form_id");
		 	//document.getElementById("comunidad").addEventListener("click", ObtenerComunidad);
		 });
		 
	</script>	 
</head>
<body>
	<form id = "form_id">
	<select type="text" id= "comunidad" >
	<?php
		$mysqli = new mysqli("localhost", "root", "", "municipios");
		
		//hago la consulta
		$consulta = "select * from comunidades";

		
		if ($resultado= $mysqli->query($consulta)){
			while ($fila = $resultado->fetch_assoc()) {
				echo "<option value='0'>--------</option>";
				echo "<option value='".$fila['id']."' >".utf8_encode($fila['comunidad'])."</option>";
			}
		}
	?>
	
	</select>
	</form>

</body>
</html>