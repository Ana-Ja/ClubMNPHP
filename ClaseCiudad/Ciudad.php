<?php

class Ciudad{

	//atributos o propiedades de la clase
	public $nombre;
	public $habitantes;
	private $latitud;
	private $longitud;

	function Ciudad($nombre="", $habitantes="",  $latitud="", $longitud=""){
		$this->nombre = $nombre;
		$this->habitantes = $habitantes;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
	}
	
	static function ordenar_habitantes($a, $b)
		    {
		        $al = $a->habitantes;
		        $bl = $b->habitantes;
		        if ($al == $bl) {
		            return 0;
		        }
		        return ($al > $bl) ? +1 : -1;
		    }

    

    /**
     * Gets the value of latitud.
     *
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Sets the value of latitud.
     *
     * @param mixed $latitud the latitud
     *
     * @return self
     */
    private function _setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Gets the value of longitud.
     *
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Sets the value of longitud.
     *
     * @param mixed $longitud the longitud
     *
     * @return self
     */
    private function _setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }
}
 ?>