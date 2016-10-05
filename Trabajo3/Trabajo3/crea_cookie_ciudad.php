<?php
//crea una cookie que guarda la ciudad de 1 ano
if (isset($_GET["id_ciudad"]) && ctype_digit($_GET["id_ciudad"])) {
												 
	setcookie("ciudad_preferida", $_GET["id_ciudad"], time()+(3600*24*365), "/");	
	
}	
	//redirecciono al tablon
header("location:anuncios.php");


?>