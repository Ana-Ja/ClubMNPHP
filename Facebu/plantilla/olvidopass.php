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
                    	<h6>Introduzca su correo y le enviaremos un mail de activacion<h6/>
                    	<div>
                    		<input class="form-control" type="text" name="mail" placeholder= "Introduzca su mail " />
                    	</div>	
                    	<div>		
                    		<input type="submit" value="Enviar" name="Registrar"  class="btn btn-primary"/>
                    	</div>	
                    </div>		
                    	</form>
                    	<?php
                    		//}
                    		include './includes/conexion.php';
                    		include './includes/enviarCorreo.php';
                    		$conexion = conectar();
                    		if (isset($_POST["Registrar"])) {
                    			
                    					
                    					//miro que la cuenta de usuaruoi no exista duplicado
                    					$buscarUsuario = "Select id,token, nombre, mail from usuarios where mail = '".$_POST["mail"]."'";
                    					
                    					//echo $buscarUsuario;
                    					$resultado = $conexion->query($buscarUsuario);
                    					if ($resultado->num_rows>0){
                    						$fila= $resultado->fetch_assoc();
                    						$nombre = $fila['nombre'];
                    						$id = $fila['id'];
                    						$token = md5(time());
                    					   // echo "Token ".$token;
                    						$de = array("jarauta.ana@gmail.com", "cambio contraseña");
                    						$a = array($fila["mail"],$nombre);
                    						$asunto= "Nuevo registro";
                    						$mensaje= "Pinche en este enlace para cambiar su contraseña <br/><a href='http://localhost/ANA/Facebu/plantilla/activarpass.php?id=".$id."&token=".$token."'>Activar contraseña</a>";
                    						//var_dump($a);
                    						if (enviarCorreo($de, $a, $asunto, $mensaje) ==1){
                    							echo "<br/>Enviado correctamente";
                    							$fechasolicitud = date('Y-m-d H:i:s', time());
                    							//echo "<br/>FEcha ".$fechasolicitud;
                    							$updateUsuario= "UPDATE usuarios SET  fechaSolicitud = '".$fechasolicitud. "', token = '". $token."' where id=".$id ;
                    							//echo $updateUsuario;
                    							$conexion->query($updateUsuario);

                    						} else {
                    							echo "<br/>Problemas en el envio de correo";
                    						}	
                    							

                    							
                    				    } else {
                    				     	echo "No existe un usuario con ese mail";
                    				    }	
                    				    
                    				    $conexion->close();	
                    				
                    			
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

