<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		

		 $(document).ready(function() {
		 	var form = document.getElementById("form_id");
		 	document.getElementById("comunidad").addEventListener("click", ObtenerComunidad);
		 });
		 function ObtenerComunidad() {
		 	//realizo la conexión con la bbdd
			$mysqli = new mysqli("localhost", "root", "", "municipios");
			
			//hago la consulta
			$consulta = "select * from comunidades";

			
			if ($resultado= $mysqli->query($consulta)){
				echo "<option value=0>";
				echo "<option value='".$resultado['id']."' >".$resultado['comunidad'];

			}	


		 }
	</script>	 
</head>
<body>
	<form id = "form_id">
	<select type="text" id= "comunidad" >
	
	</select>
	</form>

</body>
</html>