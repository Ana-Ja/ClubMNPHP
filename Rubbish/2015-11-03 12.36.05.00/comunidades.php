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
		 	document.getElementById("calcularrect").addEventListener("click", TipoArea);
		 	document.getElementById("area").addEventListener("click", TipoArea);
		 	document.getElementById("volumen").addEventListener("click", CalcularVolumen);
		 });
	</script>	 
</head>
<body>
	<form id = "form_id">
	<select type="text" id= "comunidad" >
	
	</select>
	</form>

</body>
</html>