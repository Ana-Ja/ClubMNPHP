<?php
//creo una clase con nombre Persona
class Asignatura{

	//atributos o propiedades de la clase
	public $titulo;
	public $descripcion;
	public $horas;
	public $fechaini;
    public $fechafin;

	function __construct($titulo="", $descripcion="", $horas=0, $fechaini="", $fechafin=""){
		$this->titulo = $titulo;
		$this->descripcion = $descripcion;
		$this->horas = $horas;
		$this->fechaini = $fechaini;
		$this->fechafin = $fechafin;
	}
	
}
?>