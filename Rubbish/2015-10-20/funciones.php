<?php
	function estaLogeado(){
		if (!isset($_SESSION['idLogeado'])) {
			//si no ha iniciado sesion le mando a la pagina de login
			header('Location: ./login.php');
		}
	}
	function guardarPublicacion() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$insertUsuario = "insert into publicaciones (titulo,texto, idUsuario, visibilidad) VALUES 
					('".utf8_encode($_POST["titulo"]).					
					"','".utf8_encode($_POST["texto"]).	
					"','".$_SESSION["idLogeado"].
					"','0')";
		echo $insertUsuario;
		if ($conexion->query($insertUsuario) === true) {

			return 1;
		}else{
			return 0;
		}
		$conexion->close();
	}
	function obtenerPublicaciones() {
		include_once './includes/conexion.php';
		$conexion = conectar();
		$consulta = "select * from publicaciones  where idUsuario = '".$_SESSION["idLogeado"]."'";
		
		if ($resultado =$conexion->query($consulta)) { //el rdo es un array con las filas en un array

		  if ($resultado->num_rows > 0 ){
		      //leo el registro y comparo contraseñas para evitar la inyeccion de codigo en el campo contrseña del formulario
		      
		      while ($fila= $resultado->fetch_assoc()) {
		      	$buscausu = "select nombre, foto from usuarios  where id = '".$fila["idUsuario"]."'";
		      	$resultado2 = $conexion->query($buscausu);
		      	echo $buscausu;
				$usuario = $resultado2->fetch_assoc();
		        include './bloques/publicacion.php';
		      }
		      $consulta->close(); 
		  }
		 } 
		 $conexion->close();  
	}

	//////////////////////////////////////////////////// 
	//Convierte fecha de mysql a normal 
	//////////////////////////////////////////////////// 
	function cambiaf_a_normal($fecha){ 
	   	ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	   	return $lafecha; 
	} 

	//////////////////////////////////////////////////// 
	//Convierte fecha de normal a mysql 
	//////////////////////////////////////////////////// 

	function cambiaf_a_mysql($fecha){ 
	   	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
	   	return $lafecha; 
	}

?>