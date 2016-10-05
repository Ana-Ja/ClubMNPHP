<?php
//creo una clase con nombre Persona
class Persona{

	//atributos o propiedades de la clase
	public $nombre;
	var $apellido;
	var $altura;

	function __construct($nombre="", $apellido="", $altura=0){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->altura = $altura;
	}
}
?>