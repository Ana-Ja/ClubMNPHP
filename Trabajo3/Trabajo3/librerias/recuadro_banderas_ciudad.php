<?php
//si no tengo cookie de ciudad de preferencia no muestro el recuadro y visualizo un enlace
//para eliminar la cookie
	
if  (!isset($_COOKIE["ciudad_preferida"])) {
	?>
<div id="recuadrocookieciudad">
<div class="mensaje">Seleccione su ciudad de preferencia para filtrar por ella</div>
<?php

$ssql="Select * from ciudades where imagen_ciudad<>''";
$rs_todos_ciudad=mysql_query($ssql);
while ($fila=mysql_fetch_array($rs_todos_ciudad)) {
	
    echo '<div class="itemciudad">';
	//creo un enlace con la bandera seleccionada pare ir a un pagina que me creo la cookie con ese ciudad;
	echo '<a href="crea_cookie_ciudad.php?id_ciudad=' .$fila["id_ciudad"]. '">';
	echo genera_imagen_ciudad($fila["imagen_ciudad"]);
	echo "</a>";
	echo "</div>";
	
}


?>
</div>
<?php
} else {
	//es que ya tengo la cookie de la ciudad y saco mensaje para poder eliminar la cookie
	echo '<div id="recuadrocookieciudad">';
	echo "Tu cookie almacenada permite ver anuncios de " .dame_nombreciudad( $_COOKIE["ciudad_preferida"]);
	echo ' [<a href="eliminar_cookie.php">Eliminar cookie</a>]';
	echo "</div>";
}
?>