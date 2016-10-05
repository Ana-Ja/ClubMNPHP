<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>
<?php
	//guardo el dato recibido por GET en una variable
    $ope1 = $_GET["ope_1"] ;
    $ope2 = $_GET["ope_2"] ;
    $operacion = $_GET["operacion"] ;

    

    $resultado = "";
    if ($operacion=='+'){
    	$resultado = $ope1 + $ope2;
    }else if ($operacion=='-'){
    	$resultado = $ope1 - $ope2;
    }else if ($operacion=='*'){
    	$resultado = $ope1 * $ope2;
    }else if ($operacion=='/' && $ope2 != 0){
    	$resultado = $ope1 / $ope2; 
    } else {
    	echo "operación no soportada";
    }
    if ($resultado !="")	{
    	 echo "Mi resultado es :".$resultado;
    } 	
   
    

    
?>
</h1>	
</body>
</html>