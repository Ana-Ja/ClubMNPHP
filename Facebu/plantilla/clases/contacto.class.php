<?php

class Contacto {
	public $id;
	public $idSolicitante;
	public $idAmigo;
	public $fechaSolicitud;
	public $FechaAceptacion;
	public $fechaFin;
	public $token;

	function __construct( $idSolicitante = "", $idAmigo = "", $token=""){
		$this->idSolicitante = $idSolicitante;
		$this->idAmigo = $idAmigo;
		$this->token = $token;
	}
	function salvar() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertUsuario = "insert into contactos (idSolicitante,idAmigo,token) VALUES 
					('".$this->idSolicitante.
					"','".$this->idAmigo.
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
	public static function getAmigosold($id){
			include_once './includes/conexion.php';
			include_once './clases/usuario.class.php';
		    $conexion = conectar();
			$buscacontacto= "select * from contactos  where idSolicitante = ".$id.
							" union select idSolicitante from contactos where idAmigo = ".$id;
		    
		    //echo $buscacontacto;
		    $contactos = array();
		    //echo $buscausu;
		    if ($resultado =$conexion->query($buscacontacto)) { //el rdo es un array con las filas en un array

    		    if ($resultado->num_rows > 0 ){
    		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
    		      
    		        while ($amigo= $resultado->fetch_assoc()) {
				    	$contacto = new Contacto();
				    	$contacto->id = $amigo["id"];
				    	$contacto->idSolicitante = Usuario::getUsuario($amigo["idSolicitante"]);
				    	$contacto->idAmigo = Usuario::getUsuario($amigo["idAmigo"]);
				    	$contacto->fechaSolicitud = $amigo["fechaSolicitud"];
				    	$contacto->fechaAceptacion = $amigo["fechaAceptacion"];
				    	$contacto->fechaFin = $amigo["fechaFin"];
				    	array_push($contactos, $contacto);
				    } 
				}
			}
			$conexion->close();  
			return $contactos;	   

	}
	public static function getAmigos($id){
			include_once './includes/conexion.php';
			include_once './clases/usuario.class.php';
		    $conexion = conectar();
			$buscacontacto= "select idAmigo from contactos  where idSolicitante = ".$id;
		    $i=0;
		    //echo $buscacontacto;
		    $contactos = array();
		    //echo $buscausu;
		    if ($resultado =$conexion->query($buscacontacto)) { //el rdo es un array con las filas en un array

    		    if ($resultado->num_rows > 0 ){
    		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
    		      	
    		        while ($amigo= $resultado->fetch_assoc()) {
    		        	$contactos[$i]=  Usuario::getUsuario($amigo["idAmigo"]);
    		        	$i++;				    	
				    } 
				}
			}
			$buscacontacto= " select idSolicitante from contactos where idAmigo = ".$id;
			    if ($resultado =$conexion->query($buscacontacto)) { //el rdo es un array con las filas en un array

	    		    if ($resultado->num_rows > 0 ){
	    		      
	    		        while ($amigo= $resultado->fetch_assoc()) {
	    		        	$contactos[$i]=  Usuario::getUsuario($amigo["idSolicitante"]);
	    		        	$i++;				    	
					    } 
					}
				}
			$conexion->close(); 
			// include_once './includes/kint/kint.class.php';
 		//     		 d($contactos);
			return $contactos;	   

	}
	public static function  getAmigosComunes($id, $misAmigos) {
					include_once './includes/conexion.php';
					include_once './clases/usuario.class.php';
					//busco los amigos de el amigo id que me envian
					$amigosdeamigo=Contacto::getAmigos($id);
					include_once './includes/kint/kint.class.php';
 		    		 d($misAmigos);
 		    		 d($amigosdeamigo);

					$amigoscomunes = array();
					//ahora comparo los dos arrays de objetos
				    $x=0;
					// for ($i=0;$i<=sizeof($misAmigos)-1;$i++){
					// 	for ($j=0;$i<=sizeof($amigosdeamigo)-1;$j++){
					// 		echo "Aqui".$misAmigos[$i];
					// 		 if ($misAmigos[$i]->id == $amigosdeamigo[$j]->id){
					// 		 	$amigoscomunes[$x]=$misAmigos[$i];
					// 		 	$x++;
					// 		 }	
					// 	} 
					// }
					foreach ($misAmigos as $key => $amigo) {
						foreach ($amigosdeamigo as $key => $amigo2) {
							if ($amigo->id == $amigo2->id){
								$amigoscomunes[$x]=$amigo;
								$x++;
							}	
						}		
					}	
					 d($amigoscomunes);
					return $amigoscomunes;	
	}
	
}
