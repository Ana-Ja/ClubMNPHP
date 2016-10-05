<?php
//creo una clase con nombre Persona
class Persona{
	//atributos o propiedades de la clase
	private $nombre;

	private $edad;
	private $dni;
	private $sexo;
	private $peso;
    private $altura;
	
		function __construct($nombre="", $edad=0, $dni, $sexo="H", $peso=0, $altura=0){
			$this->nombre = $nombre;
			$this->edad = $edad;
			$this->dni = $this->validarDNI($dni);
			$this->sexo = $this->comprobarSexo($sexo);
			$this->peso = $peso;
	        $this->altura = $altura;
		}

	   public function esMayorEdad($edad ) 
		{
			if ($edad >=18) {
				return true;
			}
			return false;
		}
		public function comprobarSexo($sexo) 
		{
			if (($sexo <>"H") && ($sexo <>"M")) {
				$sexo = "H";
			}
			return $sexo ;
		}

		private function validarDNI($dni){
			$numeros = substr($dni, 0,8); 

			$letra = substr($dni, 8,1);

			$resto = $numeros%23;

			$letras = "TRWAGMYFPDXBNJZSQVHLCKE";
			if ($letras[$resto]==$letra){
				return $dni ;
			}else{
				return "INCORRECTO";
			}
		}
		public function calcularIMC() {
			$peso = $this->peso ;
			$altura = $this->altura ;
			$ideal = $altura == 0 ? 0 : $peso / (pow($altura,2));
			if ($peso <= $ideal) {
				return -1;
			} else if ($peso > $ideal) {
				return 1;
		    }	else {
		   		return 0;
		    }	
		}





    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of edad.
     *
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Sets the value of edad.
     *
     * @param mixed $edad the edad
     *
     * @return self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Gets the value of dni.
     *
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Sets the value of dni.
     *
     * @param mixed $dni the dni
     *
     * @return self
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Gets the value of sexo.
     *
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Sets the value of sexo.
     *
     * @param mixed $sexo the sexo
     *
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Gets the value of peso.
     *
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Sets the value of peso.
     *
     * @param mixed $peso the peso
     *
     * @return self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Gets the value of altura.
     *
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Sets the value of altura.
     *
     * @param mixed $altura the altura
     *
     * @return self
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }
}
?>