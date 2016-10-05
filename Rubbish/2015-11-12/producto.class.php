<?php
class Producto {
	public $id;
	public $descripcion;
	public $nombre;
	public $precio;
	public $idCategoria;


	function __construct( $nombre = "",$descripcion = "", $precio = 0,$idCategoria = ""){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->idCategoria = $idCategoria;
	}

	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		if ($this->id !="") {
			$guardarproducto = "UPDATE PRODUCTOS set nombre='".$this->nombre."', descripcion='".$this->descripcion."', precio=".$this->precio." where id =".$this->id;
			echo $guardarproducto;
		} else {
			$guardarproducto= "insert into productos (nombre, descripcion, precio, idCategoria) VALUES 
						('".utf8_encode($this->nombre).	
						"','".utf8_encode($this->descripcion).
						"',".$this->precio.
						",".$this->idCategoria.
						")";
			
			echo $guardarproducto;
		}
		

		if ($conexion->query($guardarproducto) === true) {
			echo "guardado";
			//si quiero devolver el registro insertado puedo hacer
			$this->is = $conexion->insert_id;
			return $this;
		}else{
			return 0;
		}
		$conexion->close();
	}
	
		public static function obtenerProductos($num_pagina, $num_elementos) {
			include_once 'conexion.php';
			include_once 'categoria.class.php';
			$conexion = conectar();
			//echo "Vertodos".$vertodos;
			$consulta = "Select  * from productos ";

			$productos = array();
	      	
			if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

			  if ($resultado->num_rows > 0 ){
			      
			      while ($fila= $resultado->fetch_assoc()) {


			        $producto = new Producto($fila["nombre"],$fila["descripcion"], $fila["precio"], $fila["idCategoria"]);
			       	$producto->id = $fila["id"];
			        $categoria= Categoria::getCategoria($fila["idCategoria"]);
			        $producto->idCategoria = $categoria;
			        array_push($productos, $producto);
			      }
			  }
			} 
			 return  $productos;
		}
		public static function getProductoById($id){
			include_once 'conexion.php';
			$conexion = conectar();
			//echo "Vertodos".$vertodos;
			$consulta = "Select  * from productos where id=". $id;
			if ($resultado =$conexion->query($consulta)) {
				 $fila= $resultado->fetch_assoc();
				 $producto = new Producto($fila["nombre"],$fila["descripcion"], $fila["precio"], $fila["idCategoria"]);
				 $producto->id = $fila["id"];
			}	
			return $producto;
		}

		public static function deleteProductoById($id){
			include_once 'conexion.php';
			$conexion = conectar();
			
			$consulta = "delete from productos where id=". $id;
			echo $consulta;
			$resultado =$conexion->query($consulta);
		}
}
?>