<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		for ($i=1;$i<=4;$i++){
			for($j=1;$j<=4;$j++){
				for ($k=1;$k<=4;$k++){
					for ($l=1;$l<=4;$l++){
						if ($i!=$j && $j!=$k && $k!=$l){
							echo $i.$j.$k.$l."<br />";
						}
					}
				}
			}
		}

	?>
</body>
</html>