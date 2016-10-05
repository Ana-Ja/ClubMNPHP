<?php




class Usuario {
	public $id;
	public $nombre;
	public $apellidos;
	public $foto;
	public $mail;
	private $pass;
	public $token;

	function __construct( $nombre = "", $apellidos = "", $mail="", $foto="", $pass="",$token=""){
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->mail = $mail;
		$this->foto = $foto;
		$this->pass = $pass;
		$this->token = $token;
	}
	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertUsuario = "insert into usuarios (Nombre,Apellidos, mail,foto,pass,token) VALUES 
					('".utf8_encode($this->nombre).					
					"','".utf8_encode($this->apellidos).	
					"','".$this->mail.
					"','".$this->foto.
					"','".$this->pass.
					"','".$this->token.
					"')";
		echo $insertUsuario;
		if ($conexion->query($insertUsuario) === true) {

			return $conexion->insert_id;   //devileve 0 si no se ha insertado nada;
		}else{
			return 0;
		}
		$conexion->close();
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
