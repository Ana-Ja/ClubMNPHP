<?php
class Alquiler{

    //////////////////////////////////////////////////////////////////////////////
    // Aqui debieramos grabar el idCliente y el IdCoche del alquiler            //
    // Aunque en el ejemplo de la pantalla como no tenemos ID's estoy pasando   //
    // como parametros al constructor el nombre cliente y marca del coche       //
    //////////////////////////////////////////////////////////////////////////////
    private $idCliente;
    private $idCoche;
    private $fAlquiler;

    function __construct($idCliente="", $idCoche="", $fAlquiler=""){
        $this->idCliente = $idCliente;
        $this->idCoche = $idCoche;
        $this->fAlquiler = $fAlquiler;
    }
    public function getCliente()
    {
        return $this->idCliente;
    }

    public function _setCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }
    public function getCoche()
    {
        return $this->idCoche;
    }

    public function _setCoche($idCoche)
    {
        $this->idCoche = $idCoche;

        return $this;
    }
    public function getFecha()
    {
        return $this->fAlquiler;
    }

    public function _setFecha($fAlquiler)
    {
        $this->fAlquiler = $fAlquiler;

        return $this;
    }
}
?>