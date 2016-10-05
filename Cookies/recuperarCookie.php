<?php
	echo "la cookie usuario contiene ".$_COOKIE["usuario"]."<br />";
	echo "la cookie usuario contiene ".$_COOKIE["idUsuario"]."<br />";

	//borrar cookie poniendole un tiempo del pasado
	setcookie($nombreCookie, $valorCookie, time()-1, "/");
?>