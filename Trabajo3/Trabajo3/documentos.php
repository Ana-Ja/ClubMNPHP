<?php

$raiz="./";

include_once("librerias/funciones.php");
 
  
 $descripcion="Documentos Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Documentos, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Documentaci&oacute;n";

 include_once("plantillas/cabecera.php");
 

        $direc =DIR_DOCUMENTA;
		if (!($handle=opendir($direc))) die("No se puede abrir el directorio");
		?>
        <p>Estos son los ficheros que puedes descargarte:</p><br/>
        <ul class="ventajas">
        <?php
        
		While ($fichero=readdir($handle)) {
			if ($fichero !="." && $fichero !="..")
				echo '<li><a class="avanzar" href="descargar.php?doc=' .$fichero. '">'.$fichero.'</a></li>';
		}
		closedir($handle);
               
?>
</ul>
<?php
include_once("plantillas/lateral.php");
 
 include_once("plantillas/pie.php");
 ?>