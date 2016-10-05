<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>
Valores pares: 
<?php
	//guardo el dato recibido por GET en una variable
    $ope1 = $_GET["opeA"] ;
    $ope2 = $_GET["opeB"] ;
    If ($ope2 < $ope1) {
        echo "<br />Operando A   $ope1 debe ser menor que operando B  $ope2";
    }

    while ($ope1<= $ope2) {
        if ($ope1% 2 ==0) {
            echo "<br /> ".$ope1;
        }
        $ope1++;

    }



   
    

    
?>
</h1>	
</body>
</html>