<?php
//creo una clase con nombre Persona
class Persona{

	//atributos o propiedades de la clase
	public $nombre;
	public $apellido;
	public $altura;
	private $direccion;
	private $fechaNac;

	function __construct($nombre="", $apellido="", $altura=0, $direccion="", $fechaNac=null){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->altura = $altura;
		$this->direccion = $direccion;
		$this->fechaNac = $fechaNac;
	}
	static function ordenar_altura($a, $b)
		    {
		        $al = $a->altura;
		        $bl = $b->altura;
		        if ($al == $bl) {
		            return 0;
		        }
		        return ($al > $bl) ? +1 : -1;
		    }

    

    
    public function getDireccion()
    {
        return $this->direccion;
    }

    private function _setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    private function _setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getNombre()
    {
    	return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        //valido que el nombre no sea vacio
    	if (strlen($nombre)>0){
    		$this->nombre= $nombre;
    	} else {
    		return false;
    	}
        return $this;
    }
}
?>