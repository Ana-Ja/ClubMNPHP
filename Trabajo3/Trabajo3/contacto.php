<?php

$raiz="./";
 include_once("librerias/funciones.php");
 
 $descripcion="Contacto Asociación de Comerciantes de Tudela";
 $keywords="Tudela, Asociación, Comerciantes, Contacto" ;
 $titulo_pagina="Contacto";
 include_once("plantillas/cabecera.php");
 
 ?>
  

<script type="text/javascript">
window.onload = function() {
PonerFoco();
setInterval(muestraReloj, 1000);

}
</script>

<?php


require_once( "HTML/QuickForm.php" );
require_once( "HTML/QuickForm/Renderer/Tableless.php" );
define( "OWNER_FIRST_NAME", "Ana" );
define( "OWNER_LAST_NAME", "Jarauta" );
define( "OWNER_EMAIL_ADDRESS", "jarauta.ana@gmail.com" );
$form = new HTML_QuickForm( "form", "post", "contacto.php", "", array( "style" => "width: 30em;" ), true );
$form->removeAttribute( "name" );
$form->setRequiredNote( "" );



$form->addElement( "text", "firstName", "Nombre" );


$form->addElement( "text", "lastName", "Apellidos" );
$form->addElement( "text", "emailAddress", "Email" );
$form->addElement( "text", "subject", "Asunto del mensaje" );
$form->addElement( "textarea", "message", "Mensaje", array( "rows" => 10, "cols" => 50 ) );
$form->addElement( "submit", "sendButton", "Enviar Mensaje" );

$form->addRule( "firstName", "Por favor, introduce tus apellidos.", "required" );
$form->addRule( "firstName", "El nombre solo puede contener letras, n&uacute;meros, espacios, ap&oacute;strofos, comas y guiones.", "regex", "/^[ \'\-a-zA-Z0-9]+$/" );
$form->addRule( "lastName", "Por favor, introduce tus apellidos.", "required" );
$form->addRule( "lastName", "El apellido solo puede contener letras, n&uacute;meros, espacios, ap&oacute;strofos, comas y guiones.", "regex", "/^[ \'\-a-zA-Z0-9]+$/" );
$form->addRule( "emailAddress", "Por favor, introduce un email.", "required" );
$form->addRule( "emailAddress", "Por favor, introduce un email v&aacute;lido.", "email" );
$form->addRule( "subject", "Por favor, introduce el asunto del mensaje.", "required" );
$form->addRule( "subject", "Tu mensaje solo puede contener n&uacute;meros, espacios, ap&oacute;strofos, comas, guiones y acentos.", "regex", "/^[ \'\,\.\-a-zA-Z0-9]+$/" );
$form->addRule( "message", "Por favor, introduzca su mensaje", "required" );

if ( $form->isSubmitted() and $form->validate() ) {
  $form->process( "sendMessage" );
} else {
	
  echo "<p>Por favor, completa todos los campos, y pulsa el bot&oacute;n Enviar Mensaje .</p><br />";
  $renderer = new HTML_QuickForm_Renderer_Tableless();
  $form->accept( $renderer );
  echo $renderer->toHtml();
}

function sendMessage( $values ) {
  $recipient = OWNER_FIRST_NAME . " " . OWNER_LAST_NAME . " <" . OWNER_EMAIL_ADDRESS . ">";
  $headers = "From: " . $values["firstName"] . " " . $values["lastName"] . " <" . $values["emailAddress"] . ">";
 
  if ( mail( $recipient, $values["subject"], $values["message"], $headers ) ) {
    echo "<p>Gracias por tu mensaje! Alguien se pondr&aacute; en contacto con Vd..</p>";
  }
  else
  {
    echo '<p>Lo siento, su mensaje no ha podido ser enviado.</p>';
    echo '<p>Por favor, <a href="javascript:history.go(-1)">regresa</a> al formulario, revisa los campos e intentalo de nuevo.</p>';
  }
}

 include_once("plantillas/lateral.php");
 include_once("plantillas/pie.php");
 ?>