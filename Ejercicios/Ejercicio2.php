<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		for ($i=1000; $i<=9999; $i++) {
			$par1 = intval($i/100);
			$par2 = $i-$par1*100;  //tb se puede hacer $i%100
			$valor = pow(($par1 + $par2),2);
			
			if ($i == $valor){
				echo "Encontrado ".$i."<br>";
			}
		}

		//con substring
		for ($i=1000; $i<=9999; $i++) {
			$par1 =substr($i, 0,2);
			$par2 = substr($i,2,2);  //tb se puede hacer $i%100
			$valor = pow(($par1 + $par2),2);
			
			if ($i == $valor){
				echo "Encontrado ".$i."<br>";
			}
		}

	?>
</body>
</html>