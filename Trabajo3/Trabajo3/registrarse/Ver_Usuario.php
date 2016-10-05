<?php

$raiz="../";
include_once($raiz."librerias/funciones.php");
 if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  } 
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Ver Datos Usuario";

 include_once($raiz."plantillas/cabecera.php");
?>
<script type="text/javascript">
window.onload = function() {
PonerFoco();
setInterval(muestraReloj, 1000);
}

</script>

<?php



$memberId=isset($_REQUEST["id_usuario"]) ? (int)$_REQUEST["id_usuario"]:0;

if (!$miembro=Usuario::getUsuario($memberId)) {
	echo "<h2>Error</h2>";
	echo "<div> Usuario no encontrado. </div>";
	
	exit;
}

if (isset($_POST["action"]) and $_POST["action"]=="Guardar Cambios") {
	
	Guardar();
} elseif (isset($_POST["action"]) and $_POST["action"]=="Borrar Asociado") {
	BorrarUsuario();
} else {
	VerForm(array(), array(), $miembro);
}

function VerForm($mensajesError, $camposVacios, $miembro) {
	$logEntries= EntradaLog::getEntradaLog($miembro->getValue("id_usuario"));
	echo "<h2>Datos del usuario: " .$miembro->getValueEncoded("nombre"). " " .$miembro->getValueEncoded("apellidos");
	?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a class="avanzar" href="javascript:history.go(-1)">Atr&aacute;s</a>
    
    </h2>
    <?php
	if ($mensajesError) {
		foreach($mensajesError as $mensajeError) {
			echo $mensajeError;
		 }
	} 
				 
$start= isset($_GET["start"]) ? (int)$_GET["start"]:0;
$order= isset($_GET["order"]) ? preg_replace("/[^a-zA-Z]/","",$_GET["order"]):"username";

?>
<form action="Ver_Usuario.php" method="post" style="margin-bottom:50px;" onsubmit="return validarUsuario(this.form);">
    	
        	<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $miembro->getValueEncoded("id_usuario")?> "/>
            <input type="hidden" id="start" name="start" value="<?php echo $start?> "/>
            <input type="hidden" id="order" name="order" value="<?php echo $order?> "/>
            <div class="campoformulario">
            <label for="username" <?php validateField("username", $camposVacios) ?> ><span>Elige un usuario *</span></label>
        	<input type="text" id="username" name="username" value="<?php echo $miembro->getValueEncoded("username")?> " />
            </div>
             <div class="campoformulario">
            <label for="contrasena" ><span>Nueva contrasena*</span></label>
            <input type="password" name="contrasena" id="contrasena" value="" />
            </div>
            
            <div class="campoformulario">
            <label for="email" <?php validateField("email", $camposVacios) ?> ><span>Direcci&oacute;n email *</span></label>
        	<input type="text" id="email" name="email" value="<?php echo $miembro->getValueEncoded("email")?> " onBlur="validamail(this);" />
            </div>
            
            <div class="campoformulario">
            <label for="nombre" <?php validateField("nombre", $camposVacios) ?> ><span>Nombre *</span></label>
        	<input type="text" id="nombre" name="nombre" value="<?php echo $miembro->getValueEncoded("nombre")?> " />
            </div>
            
            <div class="campoformulario">
            <label for="apellidos" <?php validateField("apellidos", $camposVacios) ?> ><span>Apellido *</span></label>
        	<input type="text" id="apellidos" name="apellidos" value="<?php echo $miembro->getValueEncoded("apellidos")?> " />
            </div>
            
            <div class="campoformulario">
            <label for="falta" <?php validateField("falta", $camposVacios) ?> ><span>Fecha Alta *</span></label>
        	<input type="text" id="falta" name="falta" value="<?php echo $miembro->getValueEncoded("falta")?> " onBlur="esFechaValida(this);"/>
            </div>
            
            <div class="campoformulario">
            <label   <?php validateField("tipo", $camposVacios) ?> ><span>Tipo Usuario: *</span></label><br />
            <div class="radio">
            <label for="Asociado" >Asociado</label>
            <input type="radio" name="tipo" id="Asociado"  value="as" <?php setChecked($miembro, "tipo", "as")?>/><br />
            </div>
             <div class="radio">
            <label for="Amigo" >Amigo</label>
            <input type="radio" name="tipo" id="Amigo"  value="am" <?php setChecked($miembro, "tipo", "am")?>/><br />
             </div>
             <div class="radio">
             <label for="Administrador" >Administrador</label>
            <input type="radio" name="tipo" id="Administrador"  value="ad" <?php setChecked($miembro, "tipo", "ad")?>/>
            </div>
            </div>
            
             <br/>
             <div style="clear:both">
             	<input type="submit" name="action" id="submitButton" value="Guardar Cambios" />
                <input type="submit" name="action" id="resetButton" value="Borrar Asociado"  style="margin-right:20px;" />
             
             </div>
             
             
             
        
    </form>
    
    
<h2>Log de acceso</h2><br/>
	<table cellspacing="0" style="width:40em;border:1px solid #666;">
    	<tr>
        	<th>Pagina Web</th>
            <th>N&deg; de visitas</th>
            <th>Ultima  visita</th>
        </tr>
        <?php
		$rowCount=0;
		foreach ($logEntries as $logEntry) {
			$rowCount++;
			?>
            <tr <?php if ($rowCount%2==0) echo 'class="alt"'?>>
            	<td><?php echo $logEntry->getValueEncoded("url")?></td>
                <td><?php echo $logEntry->getValueEncoded("numvisitas")?></td>
                <td><?php echo $logEntry->getValueEncoded("ultimoacceso")?></td>
            </tr>
            <?php
		}
		?>
    
    </table>
    <div style="width:30em ; margin-top:20px;text-align:center;">
    	<a class="avanzar" href="javascript:history.go(-1)">Atr&aacute;s</a>
    </div>
    <?php

	
	}
	
	function Guardar(){
		$camposReque=array("username", "contrasena","nombre","apellidos", "email", "falta","tipo");
		$camposVacios=array();
		$mensajesError=array();
	
	  
		$miembro= new Usuario(array(
			"id_usuario"=> isset($_POST["id_usuario"]) ? (int) $_POST["id_usuario"]:"", 				   
			"username"=> isset($_POST["username"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["username"]):"", 
			"contrasena"=>isset($_POST["contrasena"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["contrasena"]):"", 
			"nombre"=> isset($_POST["nombre"]) ? preg_replace ("/[^\-\_\sa-zA-Z0-9]/" , "", $_POST["nombre"]):"", 
			"apellidos"=> isset($_POST["apellidos"]) ? preg_replace ("/[^\-\_\sa-zA-Z0-9]/" , "", $_POST["apellidos"]):"", 
			"email"=> isset($_POST["email"]) ? preg_replace ("#^(((( [a-z\d]  [\.\-\+_] ?)*) [a-z0-9] )+)\@(((( [a-z\d]  [\.\-_] ?){0,62}) [a-z\d] )+)\.( [a-z\d] {2,6})$#i" , "", $_POST["email"]):"",
			"falta"=> isset($_POST["falta"]) ? preg_replace ("/[^\-0-9]/" , "", $_POST["falta"]):"",
			"tipo"=> isset($_POST["tipo"]) ? preg_replace ("/[^asdm]/" , "", $_POST["tipo"]):"", 
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
	
	
		if ($miembroExiste =Usuario::getByEmail($miembro->getValue("email")) and $miembroExiste->getValue("id_usuario")!=$miembro->getValue("id_usuario")) {
	     	$mensajesError[]='<p class="error" > Un miembro con esa direcci&oacute;n de email ya existe en la base de datos. Por favor, eliga otro emails o contacte con el administrador para recupera su clave.</p>';
														  
														}
        if ($miembroExiste =Usuario::getByUsername($miembro->getValue("username")) and $miembroExiste->getValue("id_usuario")!=$miembro->getValue("id_usuario"         )) {
		     $mensajesError[]='<p class="error" > Un miembro con ese usuario ya existe en la base de datos. Por favor, eliga otro.</p>';
		}	

  		
		if ($mensajesError) {
			VerForm($mensajesError, $camposVacios, $miembro);
		} else {
			$miembro->update();
			VerExito();
		}
 }
 function BorrarUsuario() {
	
	 $miembro=new Usuario(array("id_usuario"=> isset($_POST["id_usuario"]) ? (int) $_POST["id_usuario"]:""));
	 EntradaLog::BorrarUsuario($miembro->getValue("id_usuario"));
	
	 $miembro->delete();
	  
	 VerExito();
 }
 
 function VerExito() {
	 $start= isset($_REQUEST["start"]) ? (int)$_REQUEST["start"]:0;
     $order= isset($_REQUEST["order"]) ? preg_replace("/[^a-zA-Z]/","",$_REQUEST["order"]):"username";
	echo "<h2>Cambios realizados</h2>";
	 ?>
	 <p>Tus cambios han sido guardados. <a href="Ver_Usuarios.php?start=<?php echo $start?>&amp;order=<?php echo $order?>">Volver a la Lista de Usuarios</a></p>
     <?php
    
     }
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>