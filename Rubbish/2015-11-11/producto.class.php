<?php
class Producto {
	private $id;
	public $descripcion;
	public $nombre;
	public $precio;
	public $idcategoria;


	function __construct( $nombre = "",$descripcion = "", $precio = 0,$idcategoria = ""){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->idcategoria = $idcategoria;
	}

	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertproducto= "insert into productos (nombre, descripcion, precio, idcategoria) VALUES 
					('".utf8_encode($this->nombre).	
					"','".utf8_encode($this->descripcion).
					"',".$this->precio.
					",".$this->idcategoria.
					")";
		echo $insertproducto;

		
		

		if ($conexion->query($insertproducto) === true) {
			echo "guardado";
			//si quiero devolver el registro insertado puedo hacer
			$this->is = $conexion->insert_id;
			return $this;
		}else{
			return 0;
		}
		$conexion->close();
	}
	
		public static function obtenerProductos($vertodos, $idpublicacion) {
			include_once './includes/conexion.php';
			$conexion = conectar();
			$num_comentarios=0;
			//echo "Vertodos".$vertodos;
			$consulta = "Select * from productos ";
			$productos = array();
	      	
			if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

			  if ($resultado->num_rows > 0 ){
			      
			      while ($fila= $resultado->fetch_assoc()) {


			        $producto = new Productos($fila["id"],$fila["nombre"],$fila["descripcion"], $fila["precio"], $fila["idCategoria"]);
			       
			        $categoria= Categoria::getCategoria($fila["idCategoria"]);
			        $producto->idCategoria = $categoria;
			        array_push($productos, $producto);
			        //var_dump($comentarios);
			      }
			  }
			} 
			 $conexion->close(); 

			// $resultado = array($comentarios,$num_comentarios);  
			 $resultado = array($productos);
			 return  $resultado;
		}
		public static function dibujar_comentarios($arrayComentarios){
			
			foreach ($arrayComentarios as $comentario) {
				//echo json_encode($comentario);
				//var_dump($comentario);
				// $usuario = Comentarios::datos_usuario($Comentarios->autor) ;
				// $_SESSION['idComentarios'] = $Comentarios->id;
				//echo "id Comentarios".$_SESSION['idPublicacion'];
			     include './bloques/plantilla_comentario.php';
			}
		}
}
?>