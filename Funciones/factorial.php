<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		function factorial($num) {
		  $factorial = 1;	
           for ($i=$num; $num>= 1; $num--) {
			$factorial *=  $num;
	       }
	       return $factorial;
		}		
		echo "Factorial de 9 es ".factorial(9);
		
	?>
</body>
</html>