<?php
//inicio sesion
session_start();
//termino sesion
session_destroy();
//borro las cookies
setcookie("usuarioId", 0, time()-1, "/");
setcookie("cookieToken", 0, time()-1, "/");

header('Location: ./login.php');

?>