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
			$buscaCat = "select * from categorias";
			$categorias = $conexion->query($buscaCat);
    	    $arrayCategorias = array();
    		    while ($fila = $categorias->fetch_assoc()){
    		    	$fila = array_map("utf8_encode",$fila);
    		    	$cate = new Categoria();
    			    $cate->id = $fila['id'];
    			    $cate->nombre = ($fila["nombre"]);
    			    $cate->descripcion = ($fila["descripcion"]);

    		    	array_push($arrayCategorias, $cate);
    		    }
    		  $conexion->close();
    		    return $arrayCategorias;
	}
}