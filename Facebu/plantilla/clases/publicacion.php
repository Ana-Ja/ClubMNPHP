<?php
class Publicacion {
	private $id;
	public $titulo;
	public $texto;
	public $autor;
	private $fecha;
	private $visibilidad;
	public $foto;

	function __construct($titulo="", $texto = "", $autor = "", $fecha= null, $visibilidad= null, $foto=""){
		$this->titulo = $titulo;
		$this->texto = $texto;
		$this->autor = $autor;
		$this->fecha = $fecha;
		$this->visibilidad = $visibilidad;
		$this->foto = $foto;
		
	}

	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertUsuario = "insert into publicaciones (titulo,texto, idUsuario,visibilidad) VALUES 
					('".utf8_encode($this->titulo).					
					"','".utf8_encode($this->texto).	
					"','".$this->autor.
					"','".$this->visibilidad.
					"')";
		echo $insertUsuario;
		if ($conexion->query($insertUsuario) === true) {

			return 1;
		}else{
			return 0;
		}
		$conexion->close();
	}
	
	public static function obtenerpublicaciones() {
		include_once './includes/conexion.php';
		include_once './clases/usuario.class.php';
		$conexion = conectar();
     
		//debo sacar las publicaciones de mis contactos y de los contactos que me han hecho solicitud
		//y las mias y las que tenga visibilidad <> a solo las veo yo
        $amigosSelect = "select * from publicaciones where (idUsuario in(
							Select idSolicitante from contactos where idamigo=".$_SESSION["idLogeado"]."
							union
							select idamigo from contactos where idSolicitante =".$_SESSION["idLogeado"].
							") and visibilidad <>2 ) or idUsuario=".$_SESSION["idLogeado"]."  order by fechaPublicacion desc";
		
		$consulta = "select * from publicaciones where idUsuario=".$_SESSION["idLogeado"]." order by fechaPublicacion desc";
		$publicaciones = array();
		if ($resultado =$conexion->query($amigosSelect)) { //el rdo es un array con las filas en un array

		  if ($resultado->num_rows > 0 ){
		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      
		      while ($fila= $resultado->fetch_assoc()) {
		  
				$publicacion = new Publicacion($fila["titulo"], $fila["texto"],$fila["idUsuario"], $fila["fechaPublicacion"]);
				$publicacion->id = $fila["id"];
				$usuario= Usuario::getUsuario($fila["idUsuario"]);
				$publicacion->autor = $usuario;
				array_push($publicaciones, $publicacion);
				//var_dump($publicaciones);
		        //include './bloques/plantilla_publicacion.php';
		        
		      }
		  }
		 } 
		 $conexion->close();  
		 return $publicaciones;
	}
	public static function dibujar_publicaciones($arrayPublicaciones){
		
		foreach ($arrayPublicaciones as $publicacion) {
			//var_dump($publicacion);
			// $usuario = Publicacion::datos_usuario($publicacion->autor) ;
			 $_SESSION['idPublicacion'] = $publicacion->id;
			//echo "id publicacion".$_SESSION['idPublicacion'];
		    include './bloques/plantilla_publicacion.php';
		}
	}
	public static function getPublicacionUsuario($id, $idUsuario){
		//obtiene los datos de publicacion de un comentario y
		//los datos del usuario del comentario que los mete en el campo autor de la publicaciones
		//pero realmente el objeto publi contiene el usuario del comentario
			include_once './includes/conexion.php';
		    $conexion = conectar();
			$buscausu = "select * from publicaciones  where id = ".$id ;
		    $publicacion = $conexion->query($buscausu);
		    //echo $buscausu;
		    $datos= $publicacion->fetch_assoc();
		    //var_dump($datos);
		    $publi = new Publicacion();
		    $publi->id = $id;
		     $publi->titulo = $datos["titulo"];
		     $publi->texto = $datos["texto"];
		     $publi->autor =  Usuario::getUsuario($idUsuario);
		     $publi->fecha = $datos["fechaPublicacion"];
		     $publi->visibilidad = $datos["visibilidad"];
		     $publi->foto = $datos["foto"];
		     include_once './includes/kint/kint.class.php';
		     d($publi);
		    return $publi;


	}
	// private static function datos_usuario($autor) {
	// 		include_once './includes/conexion.php';
	// 	    $conexion = conectar();
	// 		$buscausu = "select nombre, foto from usuarios  where id = ".$autor ;
	// 	    $resultado2 = $conexion->query($buscausu);
	// 	    //echo $buscausu;
	// 	    $leeusuario = $resultado2->fetch_assoc();
	// 	    $usuario['nombre']=  $leeusuario['nombre'];
	// 	    $usuario['foto']=  $leeusuario['foto'];
	// 	    return $usuario;
	// }
	public function getFecha() {
		//de la bd me viene como texto y con otro formato
		return date("d-m-Y", strtotime($this->fecha));
	}
	// public static function select() {
	// 	include_once './includes/conexion.php';
	// 	$conexion = conectar();
	// 	$consulta = "select * from publicaciones ";
	// 	if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

	// 	  if ($resultado->num_rows > 0 ){
	// 	      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      
	// 	      while ($fila= $resultado->fetch_assoc()) {
	// 	      	$buscausu = "select nombre, foto from usuarios  where id = ".$fila["idUsuario"];
	// 	      	$resultado2 = $conexion->query($buscausu);
	// 	      	//echo $buscausu;
	// 			$usuario = $resultado2->fetch_assoc();
	// 			$_SESSION['idPublicacion'] = $fila["id"];
	// 	        include './bloques/plantilla_publicacion.php';
	// 	      }
	// 	  }
	// 	 } 
	// 	 $conexion->close();  
	// }

}
?>