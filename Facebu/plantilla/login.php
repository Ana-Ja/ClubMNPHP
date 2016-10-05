<?php
session_start();
include_once './includes/conexion.php';
    if (isset($_COOKIE["usuarioId"]) && isset($_COOKIE["cookieToken"])){
        //miro si coincide con la bd
        $cookieselect= "SELECT cookieToken, Nombre, foto from usuarios where id=".$_COOKIE["usuarioId"];
        $conexion = conectar();
        $resultado = $conexion->query($cookieselect);
        $fila = $resultado->fetch_assoc();
        $token = $fila["cookieToken"];
        if ($token == $_COOKIE["cookieToken"]) {
            //le inicio la sesio
            $_SESSION['idLogeado']=$_COOKIE["usuarioId"];
            $_SESSION['nombre']=$fila["Nombre"];
            $_SESSION['foto']=$fila["foto"];
            echo "<script>window.location='./index.php';</script>";
        }
    }
    include_once "./bloques/cabecera_login.php";
?>

                <h1>Inicio Sesión</h1>
                <div class="panel panel-default text-center">
                    <img src="images/people/110/guy-5.jpg" class="img-circle">
                    <form id="login-form" action = "validar.php" method="POST">
                    <div class="panel-body">
                    <?php 
                        if (isset($_GET["mode"]) && $_GET["mode"]=="modeUserNotExist")  {
                            echo "El usuario no existe";
                        }else if (isset($_GET["mode"]) && $_GET["mode"]=="PasswordNotExist") {
                            echo "Contraseña inexistente";
                        }
                    ?>     
                        <input class="form-control" type="text" placeholder="Username" name="mail">
                        <input class="form-control" type="password" placeholder="Enter Password" name = "pass">
                        <INPUT type="checkbox" name="recordar" value ="1" >Recuerdame
                        <input  type="hidden"  name = "redirectTo" value = <?php echo isset($_GET["redirectTo"])?  $_GET["redirectTo"] :  ""; ?> >
                        <a onclick= "document.getElementById('login-form').submit(); " class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></a>
                        <a href="olvidopass.php" class="forgot-password">Forgot password?</a>
                    </div>
                    </form>
                </div>
<?php
    include_once "./bloques/pie_login.php";
?>