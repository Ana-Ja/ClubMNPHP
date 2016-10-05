<?php




class Usuario {
	public $id;
	public $nombre;
	public $apellidos;
	public $foto;
	public $mail;


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
	function getUsuarioByEmail($correo){
			include_once './includes/conexion.php';
		    $conexion = conectar();
			$buscausu = "select * from usuarios where mail = '".$correo."'" ;
		    $resultado = $conexion->query($buscausu);
		    //echo $buscausu;
		    if ($resultado->num_rows == 0) {
		    	return null;
		    	
		    } else {
		    	$amigo = $resultado->fetch_assoc();
		    	$user = new Usuario();
		    	$user->id = $amigo["id"];
		    	$user->nombre = $amigo["Nombre"];
		    	$user->apellidos = $amigo["Apellidos"];
		    	$user->foto = $amigo["foto"];
		    	$user->mail = $amigo["mail"];
		    	return $user;
		    }
		    
		    


	}
}
