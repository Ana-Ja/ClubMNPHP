<?php
    session_start();
?>
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
                    <?php
                    		include './includes/conexion.php';
                    		$id = $_GET["id"];
                    		$ref = $_GET['ref'];
                    		$conexion = conectar();
                    		//obtengo la referencia del usaurio con ese correo
                    			$usuarioSelect = "Select token from usuarios where id = '".$id."'";
                    			$resultado = $conexion->query($usuarioSelect);
                    			$usuario = $resultado->fetch_assoc();
                    			$refUsuario = $usuario['token'];
                    			//si la referencia que tengo en la url es igual a la que tengo en la base de datos, 
                    			//la validación es correcta

                    			if ($ref==$refUsuario){
                    				$usuarioUpdate = "update usuarios set estado=1 where id='".$id."'";
                    				if ($conexion->query($usuarioUpdate)){

                    					$_SESSION['idLogeado']=$id;
                                        echo "usuario activado";
                    					echo "<script>window.location ='./login.php';</script>";

                    					
                    				}
                    			}else{
                    				echo "Se ha producido un error al activar el usuario";
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




