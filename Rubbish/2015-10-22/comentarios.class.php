<?php
class Comentario {
	private $id;
	public $idpublicacion;
	public $texto;
	private $fecha;


	function __construct( $texto = "", $idpublicacion = "", $fecha=null){
		$this->texto = $texto;
		$this->idpublicacion = $idpublicacion;
		$this->fecha = $fecha;
		
	}

	function salvar() {
		
	}
	public static function select($vertodos) {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$num_comentarios=0;
		//echo "Vertodos".$vertodos;
		$consulta = "Select * from comentarios where idPublicacion = '".$_SESSION["idPublicacion"]."' order by fcomentario ";
      	if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

      	  if ($resultado->num_rows > 0 ){
      	      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
      	      $num_comentarios= $resultado->num_rows;
      	  }
      	}      
      	($vertodos == '0') ? $limit =" limit 1 ": $limit ="";
      	
      	//echo "limi ". $limit;
		$consulta1 = $consulta.$limit;
		//echo "consulta 1 ".$consulta1 ;
		if ($resultado =$conexion->query($consulta1)) { //el rdo es un array con las filas en un array

		  if ($resultado->num_rows > 0 ){
		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      while ($fila= $resultado->fetch_assoc()) {
		      	$buscausu = " Select nombre, usuarios.foto from usuarios, publicaciones  
		      	        where publicaciones.id = '".$_SESSION["idPublicacion"]."' and publicaciones.idUsuario= usuarios.id";
		      	$resultado2 = $conexion->query($buscausu);
		      	//echo $buscausu;
				$usuario = $resultado2->fetch_assoc();
		        include './bloques/plantilla_comentario.php';
		      }
		  }
		 } 
		 $conexion->close();   
		 return  $num_comentarios;
	}

}
?>