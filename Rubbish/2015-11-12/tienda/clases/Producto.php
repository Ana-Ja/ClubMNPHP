<?php
class Producto{

	public $id;
	public $nombre;
	public $descripcion;
	public $precio;
	public $categoria;

	function __construct($nombre="", $descripcion="", $precio=0, $categoria=0){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->categoria = $categoria;
	}

	function guardar(){
		//tengo que ver si es producto nuevo o antiguo
		if ($this->id!=""){
			$guardarProducto = "UPDATE productos set nombre='".$this->nombre."', descripcion='".$this->descripcion."', precio='".$this->precio."' WHERE id=".$this->id;
		}else{
			$guardarProducto = "INSERT INTO productos (nombre, descripcion, precio, id_categoria) VALUES ('".$this->nombre."','".$this->descripcion."',".$this->precio.", ".$this->categoria.")";
		}
		
		include_once '../includes/conexion.php';

		$conexion = conectar();
		$resultado = $conexion->query($guardarProducto);

		$this->id = $conexion->insert_id;
		return $this;
	}

	public static function deleteProductoById($id){
		$productoDelete = "delete from productos where id=".$id;
		include_once '../includes/conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($productoDelete);
	}
	
	public static function getProductoById($id){
		$productoSelect = "select * from productos where id=".$id;
		include_once '../includes/conexion.php';
		$conexion = conectar();
		$resultado = $conexion->query($productoSelect);
		$prod = $resultado->fetch_assoc();

		$producto = new Producto();
		$producto->id=$prod['id'];
		$producto->nombre = $prod['nombre'];
		$producto->descripcion = $prod['descripcion'];
		$producto->precio = $prod['precio'];
		$producto->categoria = $prod['id_categoria'];
		return $producto;
	}

	public static function obtenerProductos(){
		$selectProductos = "select * from productos";
		include_once '../includes/conexion.php';
		include_once '../clases/categoria.class.php';
		$conexion = conectar();
		$resultado = $conexion->query($selectProductos);

		$arrayProductos=array();
		while ($fila = $resultado->fetch_assoc()) {
			$producto = new Producto($fila['nombre'],$fila['descripcion'],$fila['precio'],$fila['id_categoria']);
			$categoria = categoria::getCategoria($fila['id_categoria']);
			//var_dump($categoria);
			$producto->id=$fila['id'];
			$producto->categoria=($categoria);
			array_push($arrayProductos, $producto);
		}
		return $arrayProductos;
	}
}



?>