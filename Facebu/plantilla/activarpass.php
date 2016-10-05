<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Social Network Template</title>

    <!-- App Styling Bundle -->
    <link href="css/default.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login">
    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                <h1>Recuperar Contraseña</h1>
                <div class="panel panel-default text-center">
                    <form id="login-form" action="" method="POST">
	                    <div class="panel-body">
	            			<div>
	            				<input class="form-control"  type="password" name="pass1"  placeholder="Contraseña" />
	            			</div>	
	            				<input class="form-control" type="password" name="pass2" placeholder="Repetir Contraseña" />
	            			<div>		
	            				<input  type="submit" value="Recuperar" name="recupera" class="btn btn-primary"/>
	            			</div>
	            		</div>		
            		</form>
                    		<?php	
                    			if (isset($_POST['recupera'])) {
                    				include './includes/conexion.php';
                    				$conexion = conectar();
                    				$id = $_GET["id"];
                    				$token = $_GET['token'];
                    				//echo "<br/>token :". $token;
                    			

                    			//obtengo la referencia del usaurio con ese correo
                    				$usuarioSelect = "Select token, fechaSolicitud from usuarios where id = '".$id."'";
                    				$resultado = $conexion->query($usuarioSelect);
                    				$usuario = $resultado->fetch_assoc();
                    				$tokenUsuario = $usuario['token'];
                    				//echo "<br/>tokenUsuario :".$tokenUsuario;
                    				//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
                    				//la validación es correcta
                    				//compruebo que no han pasado dos horas
                    				$fechaSolicitud2 =  strtotime($usuario['fechaSolicitud'])+ ( 120 * 60);
                    				$fechaSolicitud =  strtotime($usuario['fechaSolicitud']);
                    			//	echo "Fecha solicitud ".strtotime($usuario['fechaSolicitud']);
                    			//	echo "Fecha solicitud +120===".$fechaSolicitud2;
                    				if ($fechaSolicitud>$fechaSolicitud2){
                    					echo "Su enlace ha caducado";
                    				}else{
                    					if ($token==$tokenUsuario){
                    						if (  $_POST["pass1"]!= "") { 
                    							//compruebo no solo la password, tb el token que va por la url con la que tiene ese 
                    							//usuario en la bd pq  en la url pueden cambiar el id y poner 1 que suele ser el administrador
                    							//y ten estan cambiando la bd del admin
                    							if ($_POST["pass1"]== $_POST["pass2"] && $_GET["token"]==$tokenUsuario ) { 
                    								$usuarioUpdate = "update usuarios set pass='".$_POST['pass1']."' where id='".$id."'";
                    								//echo $usuarioUpdate ;
                    								if ($conexion->query($usuarioUpdate)){
                    									echo "Su contraseña ha sido modificada correctamente.";
                    									echo "<br/><a href='http://localhost/ANA/Facebu/plantilla/login.php'>Pinche en este enlace para loggearse </a>";
                    								}
                    							}else{
                    								echo "No coinciden las contraseñas";	
                    							}
                    						} else {
                    						     	echo "Introduzca las contraseñas";	
                    						}		
                    					}else{
                    						echo "Se ha producido un error al activar el usuario";
                    					}

                    				}	
                    			}
                    			
                    		?>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Vendor Scripts Bundle -->
<script src="js/vendor.min.js"></script>

<!-- App Scripts Bundle -->
<script src="js/scripts.min.js"></script>
</html>



