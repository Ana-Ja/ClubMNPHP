<?php

$raiz="./";

include_once("librerias/funciones.php");
 
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Noticias, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Noticias";

 include_once($raiz."plantillas/cabecera.php");

                   
 ?>

<form action="misnews.php" method="post">
    <div id="Asociados">
      <div class="busca1">
          Buscar palabra:
          <input id="inp" name="palabra" value ="<?php echo isset($_POST['palabra'])?  $_POST['palabra']:""?>" />
          
      </div>
    <div class="busca2">
       Ciudad:
        <select name="ciudad" id="ciudad" size="1">
                    <?php
					$ciudades=Ciudad::getCiudad();
                    foreach($ciudades as $ciudad) { 
					    
                        echo "<option value='". $ciudad->getValueEncoded("id_ciudad") . "' ";
						if ($ciudad->getValueEncoded("id_ciudad") ==$_POST['ciudad']) {
							echo " selected=selected "; 
						}
						echo "> " . $ciudad->getValueEncoded("nombre_ciudad") . " </option>";
                    }
                    
                    ?>
                  
        </select>
        
        <input type="submit" name="buscador" id="buscador" value="Buscar" />
        
    
    </div>
</div>
</form>


 <?php
 

 //compruebo si me han introducido busqueda y empiezo a crear la sql
 if (isset($_POST['palabra']) && $_POST['palabra']!="") {
	  //CUENTA EL NUMERO DE PALABRAS 
   $trozos=explode(" ",$_POST['palabra']); 
   $numero=count($trozos); 
   $texto .="| Filtro en Palabra: ". $_POST['palabra'];
  if ($numero==1) { 
	 //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 
	 $filtro = " (noticia like '%" .$_POST['palabra']. "%' or titulo like '%" .$_POST['palabra']. "%')";
	
   } elseif ($numero>1) { 
	//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 
	//busqueda de frases con mas de una palabra y un algoritmo especializado 
	
	$sql="SELECT SQL_CALC_FOUND_ROWS  * , MATCH ( titulo,noticia) AGAINST ( '". $_POST['palabra']. "' ) AS Puntos FROM Noticias WHERE MATCH (  titulo,noticia ) AGAINST ( '". $_POST['palabra']. "' )  ";
   }
 }
//si existe actividad seleccionada y esta es distinta del valor vacio
 if (isset($_POST['ciudad']) && $_POST['ciudad']!="" && Ciudad::getNombreCiu($_POST['ciudad'])!="") {
    if ($filtro=="") {
	 $filtro = "  id_ciudad = " .$_POST['ciudad'] ;
	
	}else{
	$filtro .= " and  id_ciudad = " .$_POST['ciudad']  ;
	}
   $texto .= "| Filtro en Ciudad : " . Ciudad::getNombreCiu($_POST['ciudad']);;
 }

//valido los datos que me pueden llegar
$start = isset($_GET["start"]) ? (int)$_GET["start"]:0;



list( $members, $totalRows) = Noticia::getNoticias( $start, PAGE_SIZE_USUARIOS, $filtro, $sql);


?>
<script type="text/javascript" src="<?php echo $raiz; ?>js/miajax.js"></script>
<h2>Noticias&nbsp;<?php echo $start + 1 ?> - <?php echo min($start + PAGE_SIZE_USUARIOS, $totalRows)?> de <?php echo $totalRows?>
<?php if ($start>0) {?>
 <a class="avanzar" href="misnews.php?start=<?php echo max($start-PAGE_SIZE_USUARIOS,0) ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_USUARIOS< $totalRows) {?>
   
 <a class="avanzar" href="misnews.php?start=<?php echo min($start+PAGE_SIZE_USUARIOS,$totalRows) ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>
</h2>
<p><b><?php echo $texto . "   "?></b> [<a class="avanzar" href="borrarFiltrosNoticias.php">Ver todos</a>]</p><br/>
<div id="noticia">
<?php
$rowCount=0;

foreach($members as $member){
	$rowCount++;
	$fecha=substr($member->getValueEncoded("fecha"),0, 10);
	 
    echo '<p>'. muestraDia($fecha) ."   ".'<a class="avanzar" href="misnews-detalles.php?id_noticia='. $member->getValueEncoded("id_noticia").'">'.utf8_decode($member->getValueEncoded("titulo"))."</a></p>";
	echo "<hr />";
	
}

?>
</div>
<div class="recuadro" id="texto">Resumen</div>
<div style="width:30em;margin-top:20px; text-align:center;">
<?php if ($start>0) {?>
 <a class="avanzar" href="misnews.php?start=<?php echo max($start-PAGE_SIZE_USUARIOS,0) ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_USUARIOS< $totalRows) {?>
   
 <a class="avanzar" href="misnews.php?start=<?php echo min($start+PAGE_SIZE_USUARIOS,$totalRows) ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>
</div>
 <?php
 include_once("plantillas/lateral.php");
 
 include_once("plantillas/pie.php");
 

?>
