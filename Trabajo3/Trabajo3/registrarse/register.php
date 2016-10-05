<?php
$raiz="../";
include_once($raiz."librerias/funciones.php");

  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Registrate";

 include_once($raiz."plantillas/cabecera.php");
?>
    <script type="text/javascript">
      window.onload = function() {
      PonerFoco();
	  
	  }
	 
     </script>
 <?php
if (isset($_POST["action"]) and $_POST["action"]=="register" ) {
	processForm();
} else {
	displayForm(array(), array(), new Usuario(array()));
}

 function displayForm($errorMessages, $missingFields, $member) {
	
	
	if($errorMessages) {
		foreach($errorMessages as $errorMessage) {
			echo $errorMessage;
		}
	} else {
?>
    <p>Gracias por elegirnos.</p> 
	<p>Para registrarte, por favor rellena tus datos abajo y envia el formulario.</p>
    <p>Los campos marcados con asteriscos (*) son obligatorios.</p>
    <?php
	}
	?>
    
	<form action="register.php" method="post" style="margin-bottom:50px;"  onsubmit="return validarRegistro(this.form);">
    	
        	<input type="hidden" name="action" value="register" />
            <div class="campoformulario">
            <label for="username" <?php validateField("username", $missingFields) ?> ><span>Elige un usuario *</span></label>
        	<input type="text" id="username" name="username" value="<?php echo $member->getValueEncoded("username")?> " />
            </div>
            <div class="campoformulario">
            <label for="contrasena1"<?php if ($missingFields) echo 'class="error"' ?> ><span>Elige contrase&ntilde;a</span></label>
            <input type="password" name="contrasena1" id="contrasena1" value="" /><br />
            </div>
            <div class="campoformulario">
            <label for="contrasena2"<?php if ($missingFields) echo 'class="error"' ?> ><span>Repite contrase&ntilde;a</span></label>
            <input type="password" name="contrasena2" id="contrasena2" value="" />
             </div>
            <div class="campoformulario">
            <label for="email" <?php validateField("email", $missingFields) ?> ><span>Direcci&oacute;n email *</span></label>
        	<input type="text" id="email" name="email" value="<?php echo $member->getValueEncoded("email")?> " onBlur="validamail(this);" />
             </div>
            <div class="campoformulario">
            <label for="nombre" <?php validateField("nombre", $missingFields) ?> > <span>Nombre *</span></label>
        	<input type="text" id="nombre" name="nombre" value="<?php echo $member->getValueEncoded("nombre")?> " />
             </div>
            <div class="campoformulario">
            <label for="apellidos" <?php validateField("apellidos", $missingFields) ?> ><span>Apellido *</span></label>
        	<input type="text" id="apellidos" name="apellidos" value="<?php echo $member->getValueEncoded("apellidos")?> " />
             </div>
           
             <br />
             <div style="clear:both">
             	<input type="submit" name="submitButton" id="submitButton" value="Enviar Detalles"  />
                <input type="reset" name="resetButton" id="resetButton" value="Limpiar Detalles"  style="margin-right:20px;" />
             
             </div>
             
             
             
        
    </form>
 <?php
 
	
}
 function processForm() {
	 
	 $requiredFields= array("username", "contrasena", "email", "nombre", "apellidos");
	 $missingFields=array();
	 $errorMessages=array();
	 
	 $member=new Usuario(array(
			"username"=> isset($_POST["username"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["username"]):"", 
			"contrasena"=> (isset($_POST["contrasena1"]) and isset($_POST["contrasena2"]) and $_POST["contrasena1"]==$_POST["contrasena2"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["contrasena1"]):"", 
			"apellidos"=> isset($_POST["apellidos"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["apellidos"]):"", 
			"nombre"=> isset($_POST["nombre"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["nombre"]):"", 
			"email"=> isset($_POST["email"]) ? preg_replace ("#^(((( [a-z\d]  [\.\-\+_] ?)*) [a-z0-9] )+)\@(((( [a-z\d]  [\.\-_] ?){0,62}) [a-z\d] )+)\.( [a-z\d] {2,6})$#i" , "", $_POST["email"]):"",
			"falta"=> date("Y-m-d")
			));
	 
	

	
	 foreach ($requiredFields as $requiredField) {
		 if (!$member->getValue($requiredField)) {
			 $missingFields[]=$requiredField;
		 }
	 }
	  	
	 if ($missingFields) {
		 $errorMessages[]='<p class="error" > Hay alg&uacute;n campo vacio en el formulario que has enviado. Por favor, completa los campos marcados en rojo abajo y vuelve a enviar el formulario.</p>';
	 }
	  
	 if (!isset($_POST["contrasena1"]) or !isset($_POST["contrasena2"]) or !$_POST["contrasena1"] or !$_POST["contrasena2"] or ($_POST["contrasena1"]!=$_POST["contrasena2"])) {
		 
		 $errorMessages[]='<p class="error" > Por favor, asegurate que has introducido la password correctamente en ambos campos.</p>';
		}
		
        if (Usuario::getByEmail($member->getValue("email"))) {
	     	$errorMessages[]='<p class="error" > Un miembro con esa direcci&oacute;n de email ya existe en la base de datos. Por favor, eliga otro emails o contacte con el administrador para recupera su clave.</p>';
														  
														}
        if (Usuario::getByUsername($member->getValue("username"))) {
		     $errorMessages[]='<p class="error" > Un miembro con ese usuario ya existe en la base de datos. Por favor, eliga otro.</p>';
		}	

    		
		if ($errorMessages) {
			displayForm($errorMessages, $missingFields, $member);
		} else {
			$member->insert();
			displayGracias();
		}
 }
 function DisplayGracias() {
	 
	 echo "<p>Gracias, ahora eres un nuevo amigo de nuestra Asociaci&oacute;n.</p>";
	 echo '<br/><p>Para entrar, haz <a href ="login.php">clic aqui..</a></p>';
 }
  include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
 ?>
