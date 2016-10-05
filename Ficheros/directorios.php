<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
      chdir("c:\\xampp\htdocs");
      $id_directorio = @opendir("ana")
      			or die("El directio Ana no se ha podido abrir");
      while ($leo = readdir($id_directorio)) {
      	if (is_dir($leo)) {
      		echo "$leo es un directorio"."<br />";      		
      	} else {
      		echo "$leo es un fichero"."<br />"; 
      	}

      }	
      //funcion que me devuelve un array con el contenido de un directorio
      $a = scandir("ana");
      print_r( $a);	

      $dir = "PEPa12";
      if (!file_exists($dir)) {
      	mkdir($dir, 0); //en wndows los permisos se ponen a 0
      } else {
      	echo "<br/>$dir  Existe";
      }
      //voy a borrar el directorio anterior
	    /*  if (!file_exists($dir)) {
	      	echo "<br/>Existe";
	      	rmdir($dir)  or die("El fichero existe pero tiene ficheros en su interior");
	      } else {
	      	echo "<br/>No Existe";
	      } */
    
      $a = sizeof(scandir($dir));
      echo $a;  //tiene en cuenta los ficheros . y ..
      
     
      $ficheroseliminados= 0;
      $handle = opendir($dir);
      while ($file = readdir($handle)) {
       if (is_file($dir.$file)) {
        if ( unlink($dir.$file) ){
         $ficheroseliminados++;
        }
       }
      }
      echo "Ficheros eliminados : <strong>". $ficheroseliminados ."</strong>";


//SOLUCION DE INTERNET PERO a mi NO ME BORRA EL DIRECTOIO
      $dir = "CARPETA1";
      deleteDirectory($dir);
      function deleteDirectory($dir) {
          if(!$dh = @opendir($dir)) return;
          while (false !== ($current = readdir($dh))) {
              if($current != '.' && $current != '..') {
                  echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                  if (!@unlink($dir.'/'.$current)) //si unlink es false,ed, tiene ficheros desntro llamo otra vez a la funcion
                      deleteDirectory($dir.'/'.$current);
              }       
          }
          closedir($dh);
          echo 'Se ha borrado el directorio '.$dir.'<br/>';
          @rmdir($dir);
      }
	?>
</body>
</html>