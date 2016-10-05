<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php

	/*maximo de un array */
	$array =array(25,30,40,5);
	$array_multi = array(array(25,30,40,5),
				array(24,36,43,3),
				array(25,38,40,7),
				array(25,33,49,5))	;
	
	echo "El maximo es ".maximo($array)."<br />";

	//tener en cuenta que estoy ejecutando dos vces la funcion/
	//seria mejor pasar a una variable el resultado de la funcion , y despues pintar los dos elementos
	//de esa nueva variables-array

	echo "maximo multiarray ".maximo_multi($array_multi)[0]."<br />";
	echo "Indice maximo multiarray ".maximo_multi($array_multi)[1]."<br />";

	function maximo($array){
		$maximo = $array[0];
		for ($i=0; $i<= sizeof($array)-1; $i++){
			if ($array[$i]>=$maximo) {
				$maximo = $array[$i];
			}
		}
		return $maximo;
	}

	function maximo_multi($array_multi){
		$max_multi = maximo($array_multi)[0];
		$posicion ="";
		foreach ($array_multi as $key => $value) {
			
			$max_par = maximo($value);
			if ($max_par>=$max_multi) {
				$max_multi = $max_par;
				$posicion = $key;
			}
		}
		return array($max_multi, $key);
	}
?>	
</body>
</html>