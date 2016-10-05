<?php
class categoria {
	public $id;
	public $nombre;
	public $descripcion;

	function __construct( $nombre = "", $descripcion = ""){
		$this->nombre = $nombre;
		$this->apellidos = $descripcion;
	}	// 
	function salvar() {
		include_once './includes/conexion.php';
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
			include_once './includes/conexion.php';
		    $conexion = conectar();
			$buscausu = "select * from categorias  where id = ".$id ;
		    $categoria = $conexion->query($buscausu);
		    //echo $buscausu;
		    $categoria = $categoria->fetch_assoc();
		    $cate = new Categoria();
		    $cate->id = $id;
		    $cate->nombre = $categoria["nombre"];
		    $cate->apellidos = $categoria["descripcion"];
		    return $cate;


	}
}