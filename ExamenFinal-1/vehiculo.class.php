<?php
class Vehiculo{

    //atributos o propiedades de la clase
    private $marca;
    private $modelo;
    private $matricula;

    function __construct($marca="", $modelo="", $matricula=""){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
    }
    public function getMarca()
    {
        return $this->marca;
    }

    public function _setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
    public function getModelo()
    {
        return $this->modelo;
    }

    public function _setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function _setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }
}
?>