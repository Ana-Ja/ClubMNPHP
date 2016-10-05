<?php
class Publicacion {
	private $id;
	public $titulo;
	public $texto;
	public $autor;
	private $fecha;
	private $visibilidad;
	public $foto;

	function __construct($titulo="", $texto = "", $autor = "", $fecha=null, $visibilidad= null, $foto=""){
		$this->titulo = $titulo;
		$this->texto = $texto;
		$this->autor = $autor;
		$this->fecha = $titulo;
		$this->visibilidad = $visibilidad;
		$this->foto = $foto;
		
	}

	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertUsuario = "insert into publicaciones (titulo,texto, idUsuario) VALUES 
					('".utf8_encode($this->titulo).					
					"','".utf8_encode($this->texto).	
					"','".$this->autor."')";
		echo $insertUsuario;
		if ($conexion->query($insertUsuario) === true) {

			return 1;
		}else{
			return 0;
		}
		$conexion->close();
	}
	function select() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$consulta = "select * from publicaciones ";
		if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

		  if ($resultado->num_rows > 0 ){
		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      
		      while ($fila= $resultado->fetch_assoc()) {
		      	$buscausu = "select nombre, foto from usuarios  where id = ".$fila["idUsuario"];
		      	$resultado2 = $conexion->query($buscausu);
		      	//echo $buscausu;
				$usuario = $resultado2->fetch_assoc();
				$_SESSION['idPublicacion'] = $fila["id"];
		        include './bloques/plantilla_publicacion.php';
		      }
		  }
		 } 
		 $conexion->close();  
	}

}
?>