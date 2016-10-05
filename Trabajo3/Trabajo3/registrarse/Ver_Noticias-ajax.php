<?php



$raiz="../";
include_once($raiz."librerias/funciones.php");
if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  }  
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Noticias, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Modificar Noticias";

 include_once($raiz."plantillas/cabecera.php");

 

?>

 <script type="text/javascript" language="JavaScript" src="<?php echo $raiz; ?>js/ver_noticias.js"></script>
 <div id="detalles"></div>


<?php
 include_once($raiz."plantillas/lateral.php");
 include_once($raiz."plantillas/pie.php"); 
?>