<?php
$raiz="./";
 include_once("librerias/funciones.php");
 
 $descripcion="Login Asociación de Comerciantes de Tudela";
 $keywords="Tudela, Asociación, Comerciantes, Login" ;
 $titulo_pagina="Login";
 include_once("plantillas/cabecera.php");
 
 //voy a recibir unos codigos de error y de acuerdo a ellos muestro mensajes de error
 if (isset($_GET["errorlogin"])) {
	echo '<p class="formerror" ><b>Error de acceso: </b>';
	if ($_GET["errorlogin"]=="1") {
		echo "No se han recibido todos los datos para autenticarse";
  
	}elseif ($_GET["errorlogin"]=="2"){
		echo "El mail o contrase&ntilde;a no pueden estar vac&iacute;as";
 } elseif ($_GET["errorlogin"]=="3"){
		echo "Hubo un error en la B.D.";		
 } elseif ($_GET["errorlogin"]=="4"){ 
	    echo "No hay un usuario con esos datos";
 } elseif ($_GET["errorlogin"]=="5"){ 
		echo "La contrase&ntilde;a almacenada no corresponde con este usuario";																						  } else {
		echo "Error desconocido";
		}
	echo "</p>";
				 }
 ?>
 <p>Por favor, introduzca el email y contrase&ntilde;a</p>
	<form action="hacer_login.php" method="post">
        <div class="campoformulario">
            <span>Email:</span>
            <input type="text" name="email" size="20" />
        </div>
        <div class="campoformulario">
            <span>Contrase&ntilde;a:</span>
            <input type="password" name="contrasena" size="20"  />
        </div>
        <div class="campoformulario">
            <input type="submit" value="Enviar" id="Enviar" />
        </div>
    </form>
   

 <?php
 include_once("plantillas/lateral.php");
 include_once("plantillas/pie.php");
 ?>