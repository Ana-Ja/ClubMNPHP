 <?php
//comenzamos una sesion
session_start();
  include_once("librerias/funciones.php");
  
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Tabl&oacute;n de Anuncios";

 include_once("plantillas/cabecera.php");
 $conexion= conexion_bd();
 
 //incluyo un recuadro para guardar la bandera de las ciudades
   include_once("librerias/recuadro_banderas_ciudad.php");
 ?>
 

<form action="anuncios.php" method="post">
<div class="paraform">
Buscar palabra: <input name="palabra">
<input type="submit" name="buscador" value="Buscar">
</div>
</form>
<?php
$filtro="";
//if ($_POST['buscador'] && $_POST['palabra']!="") {
 if (isset($_POST['palabra']) && $_POST['palabra']!="") {
	  // Tomamos el valor ingresado
	  $filtro = " and cuerpo_anuncio like '%" .$_POST['palabra']. "%'";
	  echo "Buscar por buscador ". $filtro;
	 
		  //$sql = "SELECT * FROM anuncios WHERE cuerpo_anuncio like '%$buscar%' ORDER BY id_anuncio DESC limit 5";
      

}
 
 //recibo los anuncios de la Bd y los paises a los que pertenece
 //uso el ctype_digit para asegurarnos que nos llegan digitos, pq alguien ha podido modificar la url añadiendo letras
 //ademas tengo que tner en cuenta si tengo la cookie del pais creada
 echo "get pais" .$_GET["pais"] . " cookie".$_COOKIE["ciudad_preferida"];
if (isset($_GET["pais"]) && ctype_digit($_GET["pais"]) || $_COOKIE["ciudad_preferida"]) {
	
		$filtro .= " and  pais.id_pais=";
	
	if ($_COOKIE["ciudad_preferida"]) {
		
		$filtro.= $_COOKIE["ciudad_preferida"];
		$pais= $_COOKIE["ciudad_preferida"];
	} else {
		$filtro.=$_GET["pais"];
		$pais= $_GET["pais"];
	}
	echo "filtro antes delect ". $filtro;
    $sql="Select * from anuncios, pais where anuncios.id_pais= pais.id_pais " . $filtro . " order by id_anuncio desc limit 5";
	echo "<p> Ultimos 5 anuncios recibidos de " ;
	echo dame_nombrepais( $pais). '  [<a href="eliminar_cookie.php">Ver todos</a>]' ."</p> <br/>";
	
 } else {
	 if ($filtro!=""){
		 $sql="Select * from anuncios, pais where anuncios.id_pais= pais.id_pais" . $filtro .  " order by id_anuncio desc limit 5";	
	 }else {
	 $sql="Select * from anuncios, pais where anuncios.id_pais= pais.id_pais order by id_anuncio desc limit 5";	
	 }
	 echo "<p> Ultimos 5 anuncios recibidos de todas las ciudades...." . '  [<a href="eliminar_cookie.php">Ver todos</a>]' . "</p> <br/>";
 }
echo $sql;
$rs= mysql_query($sql);
//compruebo si tengo anuncios
if (mysql_numrows($rs)>0) {
   while ($fila=mysql_fetch_array($rs)) {
	   //para cada anuncio
	   echo "<div class='lineaanuncio'>";
	   echo "<p><b>". $fila["titulo_anuncio"] . "</b><br />";
	  echo  $fila["cuerpo_anuncio"] . "</p>";
	
	  echo "<div class='datosadicionales'>";
	  
	  echo '<a href="anuncios.php?pais=' . $fila["id_pais"] . '" >'. genera_imagen_ciudad($fila["imagen_pais"]).  '</a>';
	  echo "<br>". $fila["nombre_pais"];
	  echo "</div>";
	  echo "</div>";
   }
} else {
	echo "<p> No se han encontrado anuncios </p>";
	
}


		
 include_once("plantillas/lateral.php");
 ?>    

  
   <?php
 include_once("plantillas/pie.php");
 ?>