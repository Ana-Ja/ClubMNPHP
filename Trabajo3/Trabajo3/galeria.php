<?php

 $raiz="./";
  include_once("librerias/funciones.php");
    //si no esta autenticado no le dejamos entrar
 // if (estas_autenticado()!=true)  {
//	   header("Location:login.php"); 
//	  //ademas salgo de este script 
//	  exit(); 
//  
//	  
//  }

   if  (checkLogin() != true)  {
   header("Location:registrarse/login.php"); 
   //ademas salgo de este script 
    exit(); 
  }
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela, Fotos, Galeria" ;
 $titulo_pagina="Galeria de Fotos";
 include_once("plantillas/cabecera.php");

 
 
 ?>

	<div align="center">
    

		<?php	
			include_once('gallery.php');
			$start=isset($_GET["start"])?(int) $_GET["start"]:0;
		
		
			$mygallery = new gallery();
			$mygallery->loadFolder('galley_images');
			$nfotos=count($mygallery->files);
			
			$limite=$start+PAGE_SIZE_FOTOS;
			if ($limite>$nfotos) {
				$limite=$nfotos;
			}
			?>
			<div style="width:30em;margin-top:10px; text-align:center;">
			<?php if ($start>0) {?>
             <a class="avanzar" href="galeria.php?start=<?php echo max($start-PAGE_SIZE_FOTOS,0) ?> ">&lt;&lt;P&aacute;gina anterior</a>
            <?php } ?>
            &nbsp;
            <?php if ($start+ PAGE_SIZE_USUARIOS< $nfotos) {?>
               
             <a class="avanzar" href="galeria.php?start=<?php echo min($start+PAGE_SIZE_FOTOS,$nfotos) ?> ">P&aacute;gina siguiente&gt;&gt;</a>
            <?php } ?><br />
<br /></div>
			<?php
			//he modificado la clase para decirle desde que foto a que foto tiene que visualizar
			//para hacer paginacion cada 12 fotos
			$mygallery->show(500, 100, true,$start,$limite);
	
			
			?><div style="width:30em;margin-top:20px; text-align:center;"> <?php
			if ($start>0) {?>
                 
                 <a class="avanzar" href="galeria.php?start=<?php echo max($start-PAGE_SIZE_FOTOS,0) ?> ">&lt;&lt;P&aacute;gina anterior</a>
           <?php } ?>
            &nbsp;
           <?php if ($start+ PAGE_SIZE_FOTOS< $nfotos) {?>
                    <a class="avanzar" href="galeria.php?start=<?php echo min($start+PAGE_SIZE_FOTOS,$nfotos) ?> ">P&aacute;gina siguiente&gt;&gt;</a>
             <?php } ?>
		
		
         </div>
       </div>
 <?php		
 include_once("plantillas/lateral.php");
 
 include_once("plantillas/pie.php");
 ?>