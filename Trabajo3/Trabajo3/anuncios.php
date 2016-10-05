<?php

$raiz="./";

 
 
include_once("librerias/funciones.php");
 
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Tabl&oacute;n de Anuncios";

 include_once("plantillas/cabecera.php");
 $conexion= conexion_bd();

 //incluyo un recuadro para guardar la bandera de las ciudades
   include_once("librerias/recuadro_banderas_ciudad.php");
 ?>
<script type="text/javascript">
window.onload = function() {
document.getElementById("palabra").focus();

}
</script>
<form action="anuncios.php" method="post">
<div id="Asociados">
Buscar palabra: <input name="palabra" id="palabra" />
<input type="submit" name="buscador" value="Buscar" />
</div>
</form>

<?php
$filtro="";
$sql="";
$start=isset($_GET["start"])?(int) $_GET["start"]:0;

//compruebo si me han introducido busqueda y empiezo a crear la sql
$hoy=date('Y-m-d');


 if (isset($_POST['palabra']) && $_POST['palabra']!="") {
	  //CUENTA EL NUMERO DE PALABRAS 
   $trozos=explode(" ",$_POST['palabra']); 
   $numero=count($trozos); 
  if ($numero==1) { 
	 //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 
	 $filtro = " ( cuerpo_anuncio like '%" .$_POST['palabra']. "%'  or titulo_anuncio like '%" .$_POST['palabra']. "%')";
	
   } elseif ($numero>1) { 
	//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 
	//busqueda de frases con mas de una palabra y un algoritmo especializado 
	
	$sql="SELECT * , MATCH ( titulo_anuncio , cuerpo_anuncio) AGAINST ( '". $_POST['palabra']. "' ) AS Puntos FROM anuncios, ciudades WHERE MATCH ( titulo_anuncio , cuerpo_anuncio) AGAINST ( '". $_POST['palabra']. "' ) and fbaja>'$hoy' and anuncios.id_ciudad= ciudades.id_ciudad  ";
   }
 }
 
 //ahora miro si tengo o bien una cookie o bien me han seleccionado una bandera en la imagen
 if (isset($_GET["ciudad"]) && ctype_digit($_GET["ciudad"]) ) {
	   if ($filtro=="") {
		   $filtro = "  ciudades.id_ciudad=" . $_GET["ciudad"];
	   }else {
		 $filtro .= " and  ciudades.id_ciudad=". $_GET["ciudad"];
	   }
	   $ciudad=$_GET["ciudad"];
 }
  if ($_COOKIE["ciudad_preferida"]) {
	  
   if ($filtro=="") {
		 $filtro = "  ciudades.id_ciudad=" . $_COOKIE["ciudad_preferida"];
	 }else {
	   $filtro .= " and  ciudades.id_ciudad=".  $_COOKIE["ciudad_preferida"];
	 }
	 $ciudad= $_COOKIE["ciudad_preferida"];
  }
  // si tengo algo en $sql, es que me ha entrado por busqueda de dos palabras
  if ($sql!="") {
	  if ($filtro=="") {
		  $sql.= " order by Puntos";
	  }else {
		  $sql.= " and ". $filtro . " order by Puntos";
	  }
	 echo "<p> Anuncios que contienen la/s palabra/s " . $_POST['palabra']. '  [<a href="eliminar_cookie.php">Ver todos</a>]' . "</p> <br />";  
  } else {
	   if ($filtro=="") {
		 $sql="Select * from anuncios, ciudades where fbaja>'$hoy' and anuncios.id_ciudad= ciudades.id_ciudad  order by anuncios.falta desc ";
		 echo "<p> Ultimos 5 anuncios recibidos de todas las ciudades...." . '  [<a href="eliminar_cookie.php">Ver todos</a>]' . "</p> <br />";
	   }else {
		  $sql="Select * from anuncios, ciudades where fbaja>'$hoy' and anuncios.id_ciudad= ciudades.id_ciudad and " . $filtro . " order by anuncios.falta desc ";
  	      echo "<p> Ultimos 5 anuncios recibidos de " ;
	
	      echo dame_nombreciudad( $ciudad). '  [<a href="eliminar_cookie.php">Ver todos</a>]' ."</p> <br />";
	   }
  }

   

 
 
 //leo el nº total de anuncios
 
  $num= mysql_query($sql);
 if (mysql_numrows($num)>0) {
	 $totalRows=mysql_numrows($num);

	 $sql.= " limit $start,". PAGE_SIZE_ANUN;
 }

$rs= mysql_query($sql);
//compruebo si tengo anuncios
if (mysql_numrows($rs)>0) {
	
   while ($fila=mysql_fetch_array($rs)) {
	   //para cada anuncio
	   echo "<div class='lineaanuncio'>";
	   echo "<p><b>". $fila["titulo_anuncio"] . "</b><br />";
	  echo  $fila["cuerpo_anuncio"] . "</p>";
	
	  echo "<div class='datosadicionales'>";
	  
	  echo '<a href="anuncios.php?ciudad=' . $fila["id_ciudad"] . '" >'. genera_imagen_ciudad($fila["imagen_ciudad"]).  '</a>';
	  echo "<br />". $fila["nombre_ciudad"];
	  echo "</div>";
	  if ( $_SESSION["tipo"]=='ad') {
	      echo '[<a href="borrar_anuncio.php?id='. $fila["id_anuncio"] . '">Borrar</a>]';
	  }
	  echo "</div>";
   }
   //para movernos adelante y atras
   ?>
   <div style="width:30em;margin-top:20px; text-align:center;">
  <?php if ($start>0) {?>
   <a class="avanzar" href="anuncios.php?start=<?php echo max($start-PAGE_SIZE_ANUN,0) ?> ">&lt;&lt;P&aacute;gina anterior</a>
  <?php } ?>
  &nbsp;
  <?php if ($start+ PAGE_SIZE_ANUN< $totalRows) {?>
   <a class="avanzar" href="anuncios.php?start=<?php echo min($start+PAGE_SIZE_ANUN,$totalRows) ?> ">P&aacute;gina siguiente&gt;&gt;</a>
  <?php } ?>
  </div>
<?php
} else {
	echo "<p> No se han encontrado anuncios </p>";
	
}
 include_once("plantillas/lateral.php");
 
 include_once("plantillas/pie.php");
 
mysql_close();
?>
