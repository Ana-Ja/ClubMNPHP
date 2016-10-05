<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
		<input type="text" name="num"/>
		<input type="submit" value="Dibujar" name="dibujar"/>

	</form>


	<?php
	if (isset($_GET['dibujar'])){
		$num = $_GET['num'];
		for ($i=1;$i<=$num;$i++){
			for ($j=1;$j<=$i;$j++){
				echo "*";
			}
			echo "<br/>";
		}

	}


	?>
</body>
</html>