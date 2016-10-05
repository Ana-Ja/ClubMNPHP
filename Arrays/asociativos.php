<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$asociativo = array('Ana' => 22 ,"Dani"=>44, "pedro"=>33 );
		foreach($asociativo as $key => $valor){
			echo $key. " tiene ".$valor . "</br>";
		}
		
	?>
	
</body>
</html>