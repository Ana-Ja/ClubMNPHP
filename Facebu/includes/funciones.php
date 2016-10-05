<?php
	function estaLogeado(){
		if (!isset($_SESSION['idLogeado'])) {
			//si no ha iniciado sesion le mando a la pagina de login
			header('Location: ./login.php');
		}
	}

?>