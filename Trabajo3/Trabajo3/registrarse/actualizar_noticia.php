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
<script type="text/javascript">
window.onload = function() {
PonerFoco();
setInterval(muestraReloj, 1000);
}

</script>

<?php

$memberId=isset($_REQUEST["id_noticia"]) ? (int)$_REQUEST["id_noticia"]:0;

if (!$miembro=Noticia::getNoticia($memberId)) {
	echo "<h2>Error</h2>";
	echo "<div> Noticia no encontrada. </div>";
	
	exit;
}

if (isset($_POST["action"]) and $_POST["action"]=="Guardar Cambios") {
	
	Guardar();
} elseif (isset($_POST["action"]) and $_POST["action"]=="Borrar Noticia") {
	BorrarNoticia();
} else {
	VerForm(array(), array(), $miembro);
}

function VerForm($mensajesError, $camposVacios, $miembro) {
	
	echo "<h2>Datos de la noticia: " .$miembro->getValueEncoded("titulo"). "</h2>";
	
	if ($mensajesError) {
		foreach($mensajesError as $mensajeError) {
			echo $mensajeError;
		 }
	} 
				 
$start= isset($_GET["start"]) ? (int)$_GET["start"]:0;


?>
<form action="actualizar_noticia.php" method="post" style="margin-bottom:50px;" >
    	
        	<input type="hidden" id="id_noticia" name="id_noticia" value="<?php echo $miembro->getValueEncoded("id_noticia")?> "/>
            <input type="hidden" id="start" name="start" value="<?php echo $start?> "/>
           
            <div class="campoformulario">
            <label for="titulo" <?php validateField("titulo", $camposVacios) ?> ><span>Titulo *</span></label>
        	<input type="text" id="titulo" name="titulo" size="100"  maxlength="255" value="<?php echo $miembro->getValueEncoded("titulo")?>" />
            </div>
            
            
            <div class="campoformulario">
            <label for="noticia" <?php validateField("noticia", $camposVacios) ?> ><span>Noticia *</span></label>
            <textarea name="noticia" id="noticia" cols=80 rows=10 ><?php echo utf8_decode($miembro->getValueEncoded("noticia"))?></textarea>  
        	
            </div>
            
            <div class="campoformulario">
            <label for="id_ciudad" <?php validateField("id_ciudad", $camposVacios) ?> ><span>Ciudad *</span></label>
             <select name="id_ciudad" id="id_ciudad" size="1">
                    <?php
					$ciudades=Ciudad::getCiudad();
                    foreach($ciudades as $ciudad) { 
					    
                        echo "<option value='". $ciudad->getValueEncoded("id_ciudad") . "' ";
						if ($ciudad->getValueEncoded("id_ciudad") ==$miembro->getValueEncoded("id_ciudad") ){
							echo " selected=selected "; 
						}
						echo "> " . $ciudad->getValueEncoded("nombre_ciudad") . " </option>";
                    }
                    
                    ?>
                  
           </select>
            </div>
             <br/>
             <div style="clear:both">
             	<input type="submit" name="action" id="submitButton" value="Guardar Cambios" />
                <input type="submit" name="action" id="resetButton" value="Borrar Noticia"  style="margin-right:20px;" />
             
             </div>
             
             
             
        
    </form>
    
  
    <div style="width:30em ; margin-top:20px;text-align:center;">
    	<a class="avanzar" href="javascript:history.go(-1)">Atr&aacute;s</a>
    </div>
    <?php

	
	}
	
	function Guardar(){
		$camposReque=array("titulo", "noticia","id_ciudad");
		$camposVacios=array();
		$mensajesError=array();
	
	 $noti= utf8_encode($_POST["noticia"] );
		$miembro= new Noticia(array(
			"id_noticia"=> isset($_POST["id_noticia"]) ? (int) $_POST["id_noticia"]:"", 				   
			"titulo"=> $_POST["titulo"] ,
			"noticia"=>$noti ,
			"id_ciudad"=> isset($_POST["id_ciudad"]) ? preg_replace ("/[^0-9]/" , "", $_POST["id_ciudad"]):"",
			));
	
		foreach ($camposReque as $campoReque) {
		 if (!$miembro->getValue($campoReque)) {
			 $camposVacios[]=$campoReque;
		 }
	 }
		//print_r( $miembro);
	 if ($camposVacios) {
		 $mensajesError[]='<p class="error" > Hay alg&uacute;n campo vacio en el formulario que has enviado. Por favor, completa los campos marcados en rojo abajo y vuelve a enviar el formulario.</p>';
	 }
	
	
		

  		
		if ($mensajesError) {
			VerForm($mensajesError, $camposVacios, $miembro);
		} else {
			$miembro->update();
			VerExito();
		}
 }
 function BorrarNoticia() {
	
	 $miembro=new Noticia(array("id_noticia"=> isset($_POST["id_noticia"]) ? (int) $_POST["id_noticia"]:""));
	
	
	 $miembro->delete();
	  
	 VerExito();
 }
 
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