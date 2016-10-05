<?php
$raiz="../";
include_once($raiz."librerias/funciones.php");
session_start();
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela, Login" ;
 $titulo_pagina="Login Asociaci&oacute;n de Comerciantes de la Ribera";

 include_once($raiz."plantillas/cabecera.php");

if (isset($_POST["action"]) and $_POST["action"]=="login") {
		procesarForm();
} else {
		verForm(array(), array(), new Usuario(array()));
}

function verForm($mensajesError, $camposVacios, $miembro) {
	
	if ($mensajesError) {
		foreach($mensajesError as $mensajeError) {
			echo $mensajeError;
		 }
		} else {
	?>
	<p>Para acceder a esta opci&oacute;n, por favor, entre su contrase&ntilde;a y pulse el bot&oacute;n Enviar.</p>
    <p>Si todav&iacute;a no est&aacute;s registrado, haz  <a href="<?php echo $raiz; ?>register.php">clic aqu&iacute;.</a></p>
    <?php } ?>
<script type="text/javascript">
window.onload = function() {
PonerFoco();
 setInterval(muestraReloj, 1000);

}
</script>
    <form action="login.php" method="post" style="margin-bottom:50px;" onsubmit="return validarLogin(this);">
    
    	<input type="hidden" name="action" value="login" />
        
        <div class="campoformulario">
        <label for="username" <?php validateField("username", $camposVacios) ?> ><span>Usuario: </span></label>
        <input type="text" name="username" id="username" value="<?php echo $miembro->getValueEncoded("username")?>" />
        </div>
        <div class="campoformulario">
        <label for="contrasena" <?php if ($camposVacios) echo 'class="error"' ?> ><span>Contrasena:</span> </label>
        <input type="password" id="contrasena" name="contrasena" value="" />
        </div>
        
        
        	<br/>
            <input type="submit" name="envio" id="envio" value="Enviar" />
            
         
        
    </form>
    <?php
		
	}
	function ProcesarForm() {
		$camposReque=array("username", "contrasena");
		$camposVacios=array();
		$mensajesError=array();
		
		$miembro= new Usuario(array(
			"username"=> isset($_POST["username"]) ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["username"]):"", 
			"contrasena"=> isset($_POST["contrasena"])  ? preg_replace ("/[^\-\_a-zA-Z0-9]/" , "", $_POST["contrasena"]):""				         ));
							 
		foreach($camposReque as $campoReque) {
			if (!$miembro->getValue($campoReque) ) {
				$camposVacios[]=$campoReque;
			}
		}
		
		if ($camposVacios) {
			$mensajesError[] = '<p class ="error"> Existen campos vacios en el formulario que has enviado. Por favor, completa los campos marcados en rojo y vuelve a enviarlos. </p>';
		} elseif (!$miembroLogeado=$miembro->autenticarse()){
			$mensajesError[] = '<p class ="error">Lo siento, usuario o contrase&ntilde;a desconocida. Por favor, comprueba tus datos y vuelvelo a intentar </p>';
		
		}
	
		if ($mensajesError) {
			VerForm($mensajesError, $camposVacios, $miembro);
		} else {
		//	print_r($miembroLogeado);
			$_SESSION["member"]=$miembroLogeado;
			$_SESSION["admin"]=$_SESSION["member"]->getValue("admin");
			$_SESSION["tipo"]=$_SESSION["member"]->getValue("tipo");
			
			VerGracias();
		//	print_r(Usuario::getUsuario($_SESSION["member"]->getValue("id_usuario")));
			
				//redirijo al usuario a la portada
		     	 //header("location:index.php");
			
		}
	}
      function VerGracias() {
			
			?>
			<br /><p>BIENVENIDO. Haz clic aqu&iacute; para acceder al <a href ="../index.php">Area de <?php echo $_SESSION["member"]->getTipo("tipo");?>.</a> </p>
            <?php
			 
		}	
  include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
		
?>