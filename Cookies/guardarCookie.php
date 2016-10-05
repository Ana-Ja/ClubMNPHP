<?php
	$nombreCookie = "usuario";
	$valorCookie = "5";
	setcookie($nombreCookie, $valorCookie, time()+3600, "/");
	$nombreCookie = "isUsuario";
	$valorCookie = "20";
	setcookie($nombreCookie, $valorCookie, time()+3600, "/");

?>