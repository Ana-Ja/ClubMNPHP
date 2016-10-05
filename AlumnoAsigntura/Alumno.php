<?php
//creo una clase con nombre Persona
class Alumno{

	//atributos o propiedades de la clase
	public $nombre;
	public $apellido;
	public $direccion;
	public $telefono;
    public $dni;
    private $asignatura;

	function __construct($nombre="", $apellido="", $direccion="", $telefono="", $dni=""){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
		$this->dni = $dni;
        $this->asignatura = array();
	}
	

    public function matricular($asignatura)
    {
        array_push($this->asignatura, $asignatura);

        return $this;
    }

    public function consultar($titulo)
    {
       // for ($i=0; $i<= sizeof($this->asignatura)-1; i++){
        foreach ($this->asignatura as $key => $value) {
            foreach ($value as $clave => $valor) {
               if ($valor ==$titulo) {
                    return true;
               } else {
                  return false;
               }
            }    
        }
        
    }


    public function DatosAsignatura($indice)
    {
        return $this->asignatura[$indice]  ;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of asignatura.
     *
     * @return mixed
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }


    /**
     * Sets the value of asignatura.
     *
     * @param mixed $asignatura the asignatura
     *
     * @return self
     */
    private function _setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;

        return $this;
    }
}
?>