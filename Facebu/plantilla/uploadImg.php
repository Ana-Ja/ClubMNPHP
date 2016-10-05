<?php

 define ("MAX_SIZE","400");

 $errors=0;
 $msgUpload="";
 $msgUpload1="";
 $msgUpload2="";

 if(is_uploaded_file($_FILES['laImagenForm']['tmp_name'])){
 $image =$_FILES["laImagenForm"]["name"];
 $uploadedfile = $_FILES['laImagenForm']['tmp_name'];

  if ($image){
  $partesImg=explode(".",$_FILES["laImagenForm"]["name"]);
  $nombre_base = $partesImg[0];
  $extension = $partesImg[1];
  $extension = strtolower($extension);
 if (($extension != "jpg") && ($extension != "jpeg")
&& ($extension != "png") && ($extension != "gif")){
$msgUpload1= ' <h3>Extensión no permitida</h3> ';
$errors=1;
  }
 else{
   $size=filesize($_FILES['laImagenForm']['tmp_name']);

if ($size > MAX_SIZE*1024){
 $msgUploa2="<h3>Excedido el límite de peso de la imagen.</h3>";
 $errors=1;
}

if($extension=="jpg" || $extension=="jpeg" ){
$uploadedfile = $_FILES['laImagenForm']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}else if($extension=="png"){
$uploadedfile = $_FILES['laImagenForm']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}else{
$src = imagecreatefromgif($uploadedfile);
}

list($width,$height)=getimagesize($uploadedfile);

$newwidth=600;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=400;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,
$width,$height);

$numero_aleatorio = md5(time());
$prefijo="imgPost".$numero_aleatorio ;
$nombreImg=$prefijo.".".$extension;
$nombreThumbnail=$prefijo."_t.".$extension;

$filename = "imagesPost/". $nombreImg;
$filename1 ="imagesPost/". $nombreThumbnail;

imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);


imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);

if ($errors>0){

	$msgUpload=$msgUpload1.$msgUpload2;
}

}
}
}

 ?>