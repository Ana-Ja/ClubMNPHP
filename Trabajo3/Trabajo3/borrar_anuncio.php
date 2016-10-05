<?php
include_once("librerias/funciones.php");
 

 $conexion= conexion_bd();
//recibimos la variable
 $id=$_GET['id'];


//borramos los registros pertenecientes a la id
mysql_query("delete from anuncios where id_anuncio='$id'");
header("location: anuncios.php"); 

?>