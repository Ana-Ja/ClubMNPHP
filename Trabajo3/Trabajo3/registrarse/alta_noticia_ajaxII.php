<?php
header('Content-Type: text/html; charset=ISO-8859-1');
$raiz="../";
include_once($raiz."librerias/funciones.php");
    echo "ante modific";
    $noti=utf8_encode($_REQUEST["noticia"]);
	 $miembro=new Noticia(array(
			"id_noticia"=> isset($_REQUEST["id_noticia"]) ? (int) $_REQUEST["id_noticia"]:"", 				   
			"titulo"=> $_REQUEST["titulo"] ,
			"noticia"=>$noti ,
			"id_ciudad"=> isset($_REQUEST["ciudad"]) ? preg_replace ("/[^0-9]/" , "", $_REQUEST["ciudad"]):"",
			"fbaja"=> isset($_REQUEST["fbaja"]) ?  $_REQUEST["fbaja"]:date("Y-m-d") 
			));
	echo "accopn". $_REQUEST["accion"]; 
if ($_REQUEST["accion"]=="alta")	
    $miembro->insert();
elseif ($_REQUEST["accion"]=="modi")	
	$miembro->update();
else
	$miembro->delete();
sleep(1);


?>