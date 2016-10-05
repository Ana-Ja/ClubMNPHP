<?php
	class Carrito {
		public $productos;
		public $total;
		function __construct( $productos = null, $total =  0){
			if (sizeof($productos)>0) {
				$this->productos = $productos;
			} else {
				$this->productos = array();
			}
			
				$this->total = $total;

		}

		public function anadirProducto($producto) {
			array_push($this->productos, $producto);
			$this->total += $producto->precio ;
		

		}
		
		public function verTotal() { 

			session_start();
			if (isset($_SESSION["carrito"])) {
			 $carrito = unserialize($_SESSION["carrito"]);
			 echo $carrito->total."€";
			}else {
				echo "0€";
			}
		}
	
	
	}

?>