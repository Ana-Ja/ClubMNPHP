<?php
class Categoria {
	public $id;
	public $nombre;
	public $descripcion;

	function __construct( $nombre = "", $descripcion = ""){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
	}	// 
	function salvar() {
		include_once 'conexion.php';
		$conexion = conectar();
		$insertcategoria = "insert into categorias (nombre, descripcion) VALUES 
					('".utf8_encode($this->nombre).					
					"','".utf8_encode($this->descripcion).	
					"')";
		echo $insertcategoria;
		if ($conexion->query($insertcategoria) === true) {
			return $conexion->insert_id;   //devileve 0 si no se ha insertado nada;
		}else{
			return 0;
		}
		$conexion->close();

	}
	public static function getCategoria($id){
			include_once 'conexion.php';
		    $conexion = conectar();
			$buscausu = "select * from categorias  where id = ".$id ;
		    $resultado = $conexion->query($buscausu);
		    //echo $buscausu;
		    $categoria = $resultado->fetch_assoc();
		    $cate = new Categoria();
		    $cate->id = $id;
		    $cate->nombre = utf8_encode($categoria["nombre"]);
		    $cate->descripcion = utf8_encode($categoria["descripcion"]);
		    return $cate;


	}
	public static function getCategorias() {
			include_once 'conexion.php';
		    $conexion = conectar();
			$buscacat = "select * from categorias";
		    $categorias = array();
		    	if ($resultado =$conexion->query($buscacat)) { //el rdo es un array con las filas en un array

		    	  if ($resultado->num_rows > 0 ){
		    	      
		    	      while ($fila= $resultado->fetch_assoc()) {

		    	      	$fila = array_map("utf8_encode", $fila)
		    	        $categoria = new Categoria($fila["nombre"],$fila["descripcion"]);
		    	       	$categoria->id = $fila["id"];
		    	       	$categoria->nombre = $fila["nombre"];
		    	       	$categoria->descripcion = $fila["descripcion"];
		    	        array_push($categorias, $categoria);
		    	      }
		    	  }
		    	} 
		    	 return  $categorias;
		    }
	}
}