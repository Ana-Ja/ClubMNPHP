<?php

$raiz="./";
include_once($raiz."librerias/funciones.php");
 
 

$memberId=isset($_GET["id_noticia"]) ? (int)$_GET["id_noticia"]:0;

if (!$miembro=Noticia::getNoticia($memberId)) {
	echo "<h2>Error</h2>";
	echo "<div> Noticia no encontrada. </div>";
	exit;
}

echo "<p>".$miembro->getValueEncoded("noticia")."</p>";


?>