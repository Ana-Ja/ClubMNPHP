<?php
	header("Content-type: image/jpeg");
	$src = $_GET['src'];
    $width = $_GET['width'];
	$height = $_GET['height'];
	include_once('thumb.php');

	$image = new thumb();
	$image->loadImage($src);
	$image->crop($width, $height);
	$image->show();

?>