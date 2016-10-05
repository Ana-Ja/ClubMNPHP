<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="content-language" content="es" />
    <title><?php parametro_plantilla(titulo_pagina); 	?> </title>
    <meta name="description" content="<?php parametro_plantilla(descripcion);	?>" />
    <meta name="keywords" content="<?php parametro_plantilla(keywords);	?>" />


    <link rel="shortcut icon" href="<?php echo $raiz; ?>imagenes/favicon.ico" type="image/x-icon" />
    
   <!-- para la galeria de fotos que hay en www.librosweb-->
   <!-- <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>-->
   <!-- fin para la gelria de fotos-->
   
    <!-- para la galeria de fotos que hay en www.cristallab y en mi carpeta gallery-2-->
    <link href="css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/jquery-1.3.2.js" language="javascript"></script>
    <script type="text/javascript" src="scripts/jquery.lightbox-0.5.js" language="javascript"></script>
    <!-- fin para la gelria de fotos-->
    
 
        
   <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $raiz; ?>css/calendar-green.css" />
   <script type="text/javascript" src="<?php echo $raiz; ?>js/calendar.js"></script>
   <script type="text/javascript" src="<?php echo $raiz; ?>js/calendar-es.js"></script>
   <script type="text/javascript" src="<?php echo $raiz; ?>js/calendar-setup.js"></script> 
   
   
   
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/reset-fonts-grids/reset-fonts-grids.css" />
         
     <script type="text/javascript" src="<?php echo $raiz; ?>js/mijs.js"></script>
     <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $raiz; ?>css/estilos2.css" />   
    
  


<script type="text/javascript">
window.onload = function() {
 setInterval(muestraReloj, 1000);


}

</script>
</head>

<body id="pagini">
<div id="doc4" class="yui-t1">
  <div id="hd"><!-- cabecera -->
 
           <address class="direccion">
                   Asociaci&oacute;n de Comerciantes de La Ribera | TFNO/FAX: <strong> 948 555 555</strong> 
                    <p><span id="reloj">&nbsp;</span></p> 
	      </address>
        
        <!-- Logo -->
        <div id="logo">&nbsp;
        </div>
        
        <!-- Buscador -->
        <!--<div id="buscador">
            <form action="" method="get">
                <fieldset>
                	<legend>Buscador</legend>
                    <input type="text" name="busqueda" size="30" />
                    <input type="submit" name="botonbuscar" value="Buscar" />
                </fieldset>
            </form>
        </div> -->
        <br /> <br /> <br /> <br /> 
        <div id="Menu">
            <h5><span>Navegación del sitio</span></h5>
           
            <ul id="menu-horizontal">
            	
                <li><a href="<?php echo $raiz; ?>index.php" id="actual" title="Inicio" accesskey="I">Inicio</a></li>
                <li><a href="<?php echo $raiz; ?>Servicios.php" title="Servicios" accesskey="S">Servicios</a></li>
                <li><a href="#" title="Asociación" accesskey="A">Asociacion</a>
                 <ul>
                    <li><a href="<?php echo $raiz; ?>objetivos.php" title="Objetivos" accesskey="O">Objetivos</a></li>
                    <li><a href="<?php echo $raiz; ?>ventajas.php" title="Ventajas" accesskey="V">Ventajas</a></li>
                    <li><a href="<?php echo $raiz; ?>contacto.php" title="Contacto" accesskey="C">Contacto</a></li>
                    <li><a href="<?php echo $raiz; ?>donde.php" title="Donde" accesskey="D">D&oacute;nde Estamos</a></li>
                   
                 </ul>  
                 </li>
                 
                <li><a href="<?php echo $raiz; ?>Ver_Asociados.php" title="Lista de Socios" accesskey="L">Lista Asociados</a></li>
              
                <li><a href="#" title="Anuncios" accesskey="A">Anuncios</a>
                <ul>
                      <li>  <a href="<?php echo $raiz; ?>anuncios.php" title="Listado" accesskey="T">Listado</a> </li>
                     <li><a href="<?php echo $raiz; ?>registrarse/enviar_anuncio.php" title="Enviar" accesskey="O">Enviar Anuncio</a></li>
                     
                      
                 </ul> 
                 </li> 
                <li><a href="<?php echo $raiz; ?>misnews.php" title="Noticias" accesskey="N">Noticias</a></li>
                <li><a href="<?php echo $raiz; ?>formacion.php" title="Formación" accesskey="F">Formación</a></li>
                <li><a href="<?php echo $raiz; ?>galeria.php" title="Galeria" accesskey="G">Galeria de Fotos</a></li>
                <?php 
				
				if ( $_SESSION["tipo"]=='ad') {
                  ?>
                   <li><a href="#" title="Administrador" accesskey="V">Administrador</a>
                     <ul>
                        <li>  <a href="<?php echo $raiz; ?>anuncios.php" title="Borrar Anuncios" accesskey="T">Borrar Anuncios</a> </li>
                        <li>  <a href="<?php echo $raiz; ?>registrarse/Ver_Noticias-ajax.php" title="Modificar Noticias" accesskey="N">Modificar Noticias</a> </li>
                        <li>  <a href="<?php echo $raiz; ?>registrarse/alta_noticia_ajax.php" title="Alta Noticias" accesskey="T">Alta Noticias</a> </li>
                        <li>  <a href="<?php echo $raiz; ?>registrarse/Ver_Usuarios.php" title="Usuarios" accesskey="U">Datos Usuarios</a> </li>
                        <li>  <a href="<?php echo $raiz; ?>registrarse/subir_archivos.php" title="Subir" accesskey="S">Subir Archivos</a> </li>
                        
                        <li><a href="<?php echo $raiz; ?>documentos.php" title="Documentacion" accesskey="D">Documentaci&oacute;n</a></li>
                     </ul>
                    </li> 
                  <?php }
				    if  (isset($_SESSION["tipo"])  && $_SESSION["tipo"]=="am") {
					  
                  ?>
                      <li><a href="#" title="Socio" accesskey="R">Amigos</a>
                     <ul>
                        <li><a href="<?php echo $raiz; ?>registrarse/enviar_anuncio.php" title="Enviar" accesskey="O">Enviar Anuncio</a></li>
                        <li><a href="<?php echo $raiz; ?>galeria.php" title="Galeria" accesskey="G">Galeria de Fotos</a></li                     
                     ></ul>
                    </li>
                  <?php } 
				   if  (isset($_SESSION["tipo"])  && $_SESSION["tipo"]=="as") {
					  
                  ?>
                      <li><a href="#" title="Asociado" accesskey="R">Asociados</a>
                     <ul>
                        <li><a href="<?php echo $raiz; ?>registrarse/enviar_anuncio.php" title="Enviar" accesskey="O">Enviar Anuncio</a></li>
                        <li><a href="<?php echo $raiz; ?>galeria.php" title="Galeria" accesskey="G">Galeria de Fotos</a></li>
                        <li><a href="<?php echo $raiz; ?>documentos.php" title="Documentacion" accesskey="D">Documentaci&oacute;n</a></li>
                       
                     </ul>
                    </li>
                  <?php } 
				    ?>
				   
            </ul>
 </div>         
 
  
</div><!-- fin cabecera -->

 <div id="bd">
    <!-- cuerpo -->
    <div id="yui-main">
      <div class="yui-b" id="contenido">
        <!-- bloque principal -->
       <h1 class="titulo"> <?php parametro_plantilla(titulo_pagina);	?></h1>