<?php
class Ciudad{

	public $nombre;
	public $habitantes;
	public $provincia;
	

	function __construct($nombre="",$habitantes=0,$provincia=""){
		$this->nombre = $nombre;
		$this->habitantes = $habitantes;
		$this->provincia = $provincia;
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
    
}




?>