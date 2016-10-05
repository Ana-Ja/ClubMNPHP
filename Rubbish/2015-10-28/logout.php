<?php
//inicio sesion
session_start();
//termino sesion
session_destroy();
header('Location: ./login.php');

?>