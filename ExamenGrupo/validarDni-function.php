<?php
	function validarDNI($dni){
		$numeros = substr($dni, 0,8); 

		$letra = substr($dni, 8,1);

		$resto = $numeros%23;

		$letras = "TRWAGMYFPDXBNJZSQVHLCKE";
		//echo "le corresponde la letra ".$letras[$resto];
		if ($letras[$resto]==$letra){
			return true;
		}else{
			return false;
		}
	}



?>