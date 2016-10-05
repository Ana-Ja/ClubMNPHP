<?php 
//Copyright © McAnam.com 
$raiz="./";

include_once("librerias/funciones.php");

    $sDirectorio = "/Trabajo3/".DIR_DOCUMENTA ; //Introducir directorio de descargas 
    $sUrlDescargas = $_SERVER["DOCUMENT_ROOT"].$sDirectorio; 
    $vBarras = array("/", "\\"); 
    $sDocumento = $sUrlDescargas.str_replace($vBarras, "_", $_GET["doc"]); 
     
    if (file_exists($sDocumento)) 
    { 
        header("Content-type: application/force-download"); 
        header("Content-Disposition: attachment; filename=".basename($_GET["doc"])); 
        header("Content-Transfer-Encoding: binary"); 
		header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
        header("Content-Length: ".filesize($sDocumento)); 
        readfile($sDocumento); 
    } 
    else 
    { 
        echo "<br>Ha sido imposible descargar el fichero"; 
		echo $sDocumento;
    } 

?>
<!--header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=exportacion.xls ");
header("Content-Transfer-Encoding: binary ");-->

