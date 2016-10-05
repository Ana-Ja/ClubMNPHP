<?php



$raiz="../";
include_once($raiz."librerias/funciones.php");

  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Noticia, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Alta Noticia";

 include_once($raiz."plantillas/cabecera.php");
 
 $miembro=new Noticia(array());
 ?>
 
 <script type="text/javascript" language="JavaScript" src="<?php echo $raiz; ?>js/tratanoticia.js"></script>



        <p>Los campos marcados con asteriscos (*) son obligatorios.</p>

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
	<form action="actu_ajax.php" method="post" id="noticiasajax" accept-charset="utf-8" style="margin-bottom:50px;" >
    	    <input type="hidden" id="id_noticia" name="id_noticia" value=""/>
        	
             <input type="hidden" id="accion" name="accion" value="alta"/>
           <div class="campoformulario">
            <label for="titulo"  ><span>Titulo *</span></label>
        	<input type="text" id="titulo" name="titulo" size="100"  maxlength="255" value="<?php echo $miembro->getValueEncoded("titulo")?>" />
            </div>
            
            
            <div class="campoformulario">
            <label for="noticia"><span>Noticia *</span></label>
            <textarea name="noticia" id="noticia" cols="80" rows="10" ><?php echo $miembro->getValueEncoded("noticia")?></textarea>  
        	
            </div>
            
            <div class="campoformulario">
            <label for="id_ciudad" ><span>Ciudad</span></label>
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
            <div class="paraform">
                   Fecha Caducidad: <input type="text" name="fbaja" id="fbaja" readonly="readonly" value="<?php echo $miembro->getValueEncoded("fbaja")?>" /><img src="<?php echo $raiz; ?>images/img.gif" id="selector" alt="calendario"/>
            </div>
             <br />
             <div style="clear:both">
             	<input type="submit" name="submitButton" id="submitButton" value="Alta Noticia" />
                

                <input type="reset" name="resetButton" id="resetButton" value="Limpiar Noticia"  style="margin-right:20px;" />
                <span id="resultados"></span>
             </div>
             
             
             
        
    </form>
 
	 
	
 <?php
  include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
 ?>
