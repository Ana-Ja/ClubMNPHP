<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
  <table>
  <tr>
  	<th>Id</th>
  	<th>Nombre</th>
  </tr>
  	
	<?php
	for ($i=1; $i <=100 ;$i++) {
		echo "<tr><td>".$i."<td><td>Alumno".$i."</td></tr>";
	}

	?>
  </table>


	
</body>
</html>
