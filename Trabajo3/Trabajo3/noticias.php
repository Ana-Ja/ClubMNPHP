<?php
 $raiz="./";
  include_once("librerias/funciones.php");
  
  
  $descripcion="Asociación de Comerciantes de Tudela";
 $keywords="Tudela, Asociación, Comerciantes" ;
  $titulo_pagina="Noticias Asociación de Comerciantes de Tudela";
 include_once("plantillas/cabecera.php");
 ?>
<?php /*?><?PHP
$static = TRUE;
$template = "Headlines";
include("../cutenews/show_news.php");

$number = "1";
include("../cutenews/show_news.php");
?> <?php */?>
 

		<?PHP
	

        $number = 3;
        include('../cutenews/show_news.php');
        ?>
    

 <?php
 include_once("plantillas/lateral.php");
 ?>    

  
   <?php
 include_once("plantillas/pie.php");
 ?>
