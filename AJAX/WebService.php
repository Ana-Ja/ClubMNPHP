<?php
	define("PI", 3.1416);
	
	$funcion = $_POST["funcion"];

	//esta funcion me ejecuta la funcion que vien por 1 argumento, 
	//con los argumentos que vienen en el array del 2 argumento
    call_user_func($funcion, $_POST);


	// if ($funcion == 'CalcularVolumen') {

	// 	$radio = $_POST["radio"];
	// 	VolumenEsfera();
	// } else if ($funcion == 'CalcularArea') {
	// 	$base = $_POST["base"];
	// 	$altura = $_POST["altura"];
	// 	$tipo = $_POST["tipo"];
	// 	$radio = $_POST["radio"];
	// 	CalcularArea($base, $altura, $tipo, $radio);
	// }

	//webService que calcula el acrea de un triagulo
	function CalcularArea($array) {  //($base, $altura, $tipo, $radio) {
		$tipo = $array['tipo'];
		$base = $array['base'];
		$altura = $array['altura'];
		if ($tipo=='R') {
			
			$area = ($base*$altura)/2;
		} else	if ($tipo=='T') {
			$area = $base*$altura;
		} else	if ($tipo=='A') {
			$radio = $array['radio'];
			$area =  PI*pow($radio,2);
		}	

		echo $area;
	}
	//webService que calcula el acrea de un triagulo
	function VolumenEsfera($array) {
		//  4/3 pi r^3
		$radio = $array["radio"];
		$volumen =4/3 * PI * pow($radio, 3);
		echo $volumen;
	}
	
?>