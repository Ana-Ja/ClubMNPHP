<?php




class Usuario {
	private $id;
	public $nombre;
	public $apellidos;
	public $foto;


	function __construct( $nombre = "", $apellidos = "", $foto=""){
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->foto = $foto;
		
	}

	public static function getUsuario($id){
			include_once './includes/conexion.php';
		    $conexion = conectar();
			$buscausu = "select nombre, foto,apellidos from usuarios  where id = ".$id ;
		    $usuario = $conexion->query($buscausu);
		    //echo $buscausu;
		    $usuario = $usuario->fetch_assoc();
		    $user = new Usuario();
		    $user->id = $id;
		    $user->nombre = $usuario["nombre"];
		    $user->apellidos = $usuario["apellidos"];
		    $user->foto = $usuario["foto"];
		    return $user;


	}
}
