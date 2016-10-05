<?php
//para elimiar la cookie le pongo fecha caducidad pasada
setcookie("ciudad_preferida", $_GET["id_pais"], time()-(3600), "/");
  $_GET["pais"]="";
  $_POST['palabra']="";
   //quito los filtros que se ha posido hacer por cooki, enlace en la bandera o filtro por Buscar
	//redirecciono al tablon
header("location:anuncios.php");
?>
