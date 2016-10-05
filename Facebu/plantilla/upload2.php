<?php 
	$name = ''; 
	$type = ''; 
	$size = ''; 
	$error = ''; 

	function extractName($fileName){
		//obtengo la posición del último .
		$pos = strrpos($fileName, ".");
		$extension = substr($fileName, 0, $pos);
		return $extension;
	}

	function extractExtension($fileName){
		//obtengo la posición del último .
		$pos = strrpos($fileName, ".");
		$extension = substr($fileName, $pos);
		return $extension;
	}
	function compress_image($source_url, $destination_url, $quality) { 
		$info = getimagesize($source_url); 
		var_dump($info);
		if ($info['mime'] == 'image/jpeg'){ 
			$image = imagecreatefromjpeg($source_url); 
			imagejpeg($image, $destination_url, $quality);

			//cambiar la resolución
			
		}elseif ($info['mime'] == 'image/gif') {
			$image = imagecreatefromgif($source_url); 
			imagegif($image, $destination_url);
		}elseif ($info['mime'] == 'image/png') {
			$image = imagecreatefrompng($source_url); 
			imagepng($image, $destination_url, $quality);
		}
		return $destination_url; 
	} 

	if ($_POST) { 
		var_dump($_FILES);
		if ($_FILES["file"]["error"] > 0) { 
			$error = $_FILES["file"]["error"]; 
		} 
		else if (($_FILES["file"]["type"] == "image/gif") || 
			($_FILES["file"]["type"] == "image/jpeg") || 
			($_FILES["file"]["type"] == "image/png") || 
			($_FILES["file"]["type"] == "image/pjpeg")) { 
				$nombre = extractName($_FILES["file"]["name"]);
				$extension = extractExtension($_FILES["file"]["name"]);
				$url = './uploads/'.$nombre.'.'.$extension; 
				$filename = compress_image($_FILES["file"]["tmp_name"], $url, 80); 
				
		}else { 
			$error = "El fichero debe ser jpg, gif o png";
		} 
	} ?> 

<html> 
	<body>
		<form action="" name="myform" id="myform" method="post" enctype="multipart/form-data">  
			<input type="file" name="file" id="file"/> 
					
			<input type="submit" name="submit" id="submit" class="submit btn-success"/> 
			</form> 
	</body> 
</html> 