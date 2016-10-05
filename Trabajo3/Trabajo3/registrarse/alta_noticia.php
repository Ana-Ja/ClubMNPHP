<?php
$raiz="../";
include_once($raiz."librerias/funciones.php");

  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Noticia, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Alta Noticia";

 include_once($raiz."plantillas/cabecera.php");

if (isset($_POST["action"]) and $_POST["action"]=="register" ) {
	processForm();
} else {
	
	displayForm(array(), array(), new Noticia(array()));
}

 function displayForm($errorMessages, $camposVacios, $miembro) {
	
	
	if($errorMessages) {
		foreach($errorMessages as $errorMessage) {
			echo $errorMessage;
		}
	} else {
?>
        <p>Los campos marcados con asteriscos (*) son obligatorios.</p>
    <?php
	}
	?>
    <script type="text/javascript">
      window.onload = function() {
      PonerFoco();
	  setInterval(muestraReloj, 1000);
	  }
	 

  

     </script>
	<form action="alta_noticia.php" method="post" accept-charset="utf-8" style="margin-bottom:50px;" onsubmit="return validarNoticia(this.form);">
    	
        	<input type="hidden" name="action" value="register" />
           <div class="campoformulario">
            <label for="titulo" <?php validateField("titulo", $camposVacios) ?> ><span>Titulo *</span></label>
        	<input type="text" id="titulo" name="titulo" size="100"  maxlength="255" value="<?php echo $miembro->getValueEncoded("titulo")?>" />
            </div>
            
            
            <div class="campoformulario">
            <label for="noticia" <?php validateField("noticia", $camposVacios) ?> ><span>Noticia *</span></label>
            <textarea name="noticia" id="noticia" cols="80" rows="10" ><?php echo $miembro->getValueEncoded("noticia")?></textarea>  
        	
            </div>
            
            <div class="campoformulario">
            <label for="id_ciudad" <?php validateField("id_ciudad", $camposVacios) ?> ><span>Ciudad</span></label>
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
           
             <br />
             <div style="clear:both">
             	<input type="submit" name="submitButton" id="submitButton" value="Enviar Detalles" />
                <input type="reset" name="resetButton" id="resetButton" value="Limpiar Detalles"  style="margin-right:20px;" />
             
             </div>
             
             
             
        
    </form>
 <?php
 
	
}
 function processForm() {
	 
	 $requiredFields= array("titulo", "noticia");
	 $camposVacios=array();
	 $errorMessages=array();
	 $noti=utf8_encode($_POST["noticia"]);
	 $miembro=new Noticia(array(
			"id_noticia"=> isset($_POST["id_noticia"]) ? (int) $_POST["id_noticia"]:"", 				   
			"titulo"=> $_POST["titulo"] ,
			"noticia"=>$noti ,
			"id_ciudad"=> isset($_POST["id_ciudad"]) ? preg_replace ("/[^0-9]/" , "", $_POST["id_ciudad"]):"",
			));
	 
	

	
	 foreach ($requiredFields as $requiredField) {
		
		 
		 if (!$miembro->getValue($requiredField)) {
			 $camposVacios[]=$requiredField;
		 }
	 }
	  	
	 if ($camposVacios) {
		 $errorMessages[]='<p class="error" > Hay alg&uacute;n campo vacio en el formulario que has enviado. Por favor, completa los campos marcados en rojo abajo y vuelve a enviar el formulario.</p>';
	 }
		if ($errorMessages) {
			displayForm($errorMessages, $camposVacios, $miembro);
		} else {
			$miembro->insert();
			 VerExito();
			
			$_POST["action"]=" ";
			
		}
 }
 function VerExito() {
	
     
	echo "<h2>Alta realizada</h2>";
	
	 ?>
     
	 <p> [<a href="alta_noticia.php">Volver Alta de Noticias</a>]&nbsp;[<a href="../misnews.php">Volver Listado de Noticias</a>]</p>
     <?php
    
     }
  include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
 ?>
