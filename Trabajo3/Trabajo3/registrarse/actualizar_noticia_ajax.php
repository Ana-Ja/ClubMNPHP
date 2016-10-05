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
<?php /*?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php */?>
 <script type="text/javascript" language="JavaScript" src="../js/tratanoticia.js"></script>
 
<script type="text/javascript">
window.onload = function() {
PonerFoco();
setInterval(muestraReloj, 1000);
Calendar.setup({
        inputField: "fbaja",
        ifFormat:   "%Y-%m-%d",
        button:     "selector"
        });
}

</script>


<?php

$memberId=isset($_REQUEST["id_noticia"]) ? (int)$_REQUEST["id_noticia"]:0;

if (!$miembro=Noticia::getNoticia($memberId)) {
	echo "<h2>Error</h2>";
	echo "<div> Noticia no encontrada. </div>";
	
	exit;
}




	
	echo "<h2>Datos de la noticia: " .utf8_decode($miembro->getValueEncoded("titulo")). "</h2>";
	 
				 
$start= isset($_GET["start"]) ? (int)$_GET["start"]:0;


?>
<form action="actu_ajax.php" method="post" id="noticiasajax" style="margin-bottom:50px;" >
    	
        	<input type="hidden" id="id_noticia" name="id_noticia" value="<?php echo $miembro->getValueEncoded("id_noticia")?> "/>
            <input type="hidden" id="start" name="start" value="<?php echo $start?> "/>
             <input type="hidden" id="accion" name="accion" value="alta"/>
           
            <div class="campoformulario">
            <label for="titulo"  ><span>Titulo *</span></label>
        	<input type="text" id="titulo" name="titulo" size="100"  maxlength="255" value="<?php echo utf8_decode($miembro->getValueEncoded("titulo"))?>" />
            </div>
            
            
            <div class="campoformulario">
            <label for="noticia" ><span>Noticia *</span></label>
            <textarea name="noticia" id="noticia" cols="80" rows="10" ><?php echo  utf8_decode($miembro->getValueEncoded("noticia"))?></textarea>  
        	

            </div>
            
            <div class="campoformulario">
            <label for="id_ciudad"   ><span>Ciudad *</span></label>
             <select name="id_ciudad" id="id_ciudad" size="1">
                    <?php
					$ciudades=Ciudad::getCiudad();
                    foreach($ciudades as $ciudad) { 
					    
                        echo "<option value='". $ciudad->getValueEncoded("id_ciudad") . "' ";
						if ($ciudad->getValueEncoded("id_ciudad") ==$miembro->getValueEncoded("id_ciudad") ){
							echo " selected='selected' "; 
						}
						echo "> " . $ciudad->getValueEncoded("nombre_ciudad") . " </option>";
                    }
                    
                    ?>
                  
           </select>
            </div>
            <div class="paraform">
                   Fecha Caducidad: <input type="text" name="fbaja" id="fbaja" readonly="readonly" value="<?php echo $miembro->getValueEncoded("fbaja")?>" /><img src="<?php echo $raiz; ?>images/img.gif" id="selector" alt="calendario"/>
            </div>
             <br/>
             <div style="clear:both">
             	<input type="submit" name="action" id="submitButton" value="Guardar Cambios" onclick="Modi()" />
                <input type="submit" name="action" id="resetButton" value="Borrar Noticia"  style="margin-right:20px;"  onclick="Borra()"  />
                <span id="resultados"></span>
             </div>
             
             
             
        
    </form>
    
  
    <div style="width:30em ; margin-top:5px;text-align:center;">
    	<a class="avanzar" href="javascript:history.go(-1)">Atr&aacute;s</a>
    </div>
    <?php

	

	


 
 function VerExito() {
	 $start= isset($_REQUEST["start"]) ? (int)$_REQUEST["start"]:0;
     
	echo "<h2>Cambios realizados</h2>";
	
	 ?>
     
	 <p>Tus cambios han sido guardados. <a href="Ver_Noticias.php?start=<?php echo $start?>">Volver a la Lista de Noticias</a></p>
     <?php
    
     }
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>