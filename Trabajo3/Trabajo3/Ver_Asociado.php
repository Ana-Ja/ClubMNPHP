<?php

$raiz="./";
include_once($raiz."librerias/funciones.php");

  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Ver Datos Asociado";

 include_once($raiz."plantillas/cabecera.php");



$memberId=isset($_GET["id_asociado"]) ? (int)$_GET["id_asociado"]:0;

if (!$miembro=Asociado::getAsociado($memberId)) {
	echo "<h2>Error</h2>";
	echo "<div> Asociado no encontrado. </div>";
	
	exit;
}
?>
<br />
<dl id="Asociado">
    <dt> Nombre Comercial:</dt><dd><?php echo $miembro->getValueEncoded("nombre_comercial")?></dd>
    <dt>Actividad:</dt><dd><?php echo $miembro->getNombreAct($miembro->getValueEncoded("id_actividad"))?></dd>
    <dt>Ciudad:</dt><dd><?php echo $miembro->getNombreCiu($miembro->getValueEncoded("id_ciudad"))?></dd>
    <dt>Direcci&oacute;n:</dt><dd><?php echo $miembro->getValueEncoded("direccion")?></dd>
    <dt>Tel&eacute;fono:</dt><dd><?php echo $miembro->getValueEncoded("telefono")?></dd>
    <dt>Correo:</dt><dd><?php echo $miembro->getValueEncoded("correo")?></dd>
    
    
</dl>

<br />

<a class="avanzar" href="javascript:window.history.back();">&laquo; Volver atr&aacute;s</a>





<?php
    
    
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>