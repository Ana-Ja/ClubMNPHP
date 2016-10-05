<?php
class Cliente{

	//atributos o propiedades de la clase
	private $nombre;
	private $dni;
	private $codigo;
	private $telefono;

	function __construct($nombre="", $dni="", $codigo="", $telefono=""){
		$this->nombre = $nombre;
		$this->dni = $dni;
		$this->codigo = $codigo;
		$this->telefono = $telefono;
	}
	public function getNombre()
    {
        return $this->nombre;
    }

    public function _setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getDNI()
    {
        return $this->dni;
    }

    public function _setDNI($dni)
    {
        $this->dni = $dni;

        return $this;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function _setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function _setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
?>