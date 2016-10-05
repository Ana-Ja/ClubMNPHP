<?php
$raiz="../";
include_once($raiz."librerias/funciones.php");
if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  }  
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Noticias, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Ver Listado de Noticias";

 include_once($raiz."plantillas/cabecera.php");

 
//valido los datos que me pueden llegar
$start = isset($_GET["start"]) ? (int)$_GET["start"]:0;
$order = isset( $_GET["order"] ) ? preg_replace( "/[^a-zA-Z]/", "", $_GET["order"] ) : "fecha";


list( $members, $totalRows) = Noticia::getNoticias2( $start, PAGE_SIZE_NOTICIAS,$order);


?>


<h2>Noticia &nbsp;<?php echo $start + 1 ?> - <?php echo min($start + PAGE_SIZE_NOTICIAS, $totalRows)?> de <?php echo $totalRows?>
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Noticias.php?start=<?php echo max($start-PAGE_SIZE_NOTICIAS,0) ?>&amp;order=<?php echo $order ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_NOTICIAS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Noticias.php?start=<?php echo min($start+PAGE_SIZE_NOTICIAS,$totalRows) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>



</h2>
<br/>
<table cellspacing="0" style="width:100%; border:1px solid #666;">
	<tr>
    <?php
    echo "<th>";
	   if ($order!="fecha") {
		   echo '<a href="Ver_Noticias.php?order=fecha">Fecha</a>';
	   } else{
		   echo "Fecha";
	   }
	   echo"</th>";
       ?> 
        <th> Titulo </th>
       <th><?php if ($order!="Ciudad") {?> <a  href="Ver_Noticias.php?order=Ciudad"><?php }?> Ciudad <?php if ($order!="Ciudad") {?></a><?php } ?></th>
    	
        
       
    </tr>
<?php
$rowCount=0;

foreach($members as $member){
	$rowCount++;
?>
        
       <tr <?php if ($rowCount %2==0) echo ' class="alt"'?>>
        <td><?php echo muestraDia(substr($member->getValueEncoded("fecha"),0, 10))?>   </td>
    	<td><a class="avanzar" href="actualizar_noticia.php?id_noticia=<?php echo $member->getValueEncoded("id_noticia")?>&amp;start=<?php echo $start?>&amp;order=<?php echo $order?>" ><?php echo $member->getValueEncoded("titulo")?></a>  </td>
		
		<td><?php echo Ciudad::getNombreCiu($member->getValueEncoded("id_ciudad")) ?>  </td>
        
    </tr>
<?php
}
?>
</table> 
<div style="width:30em;margin-top:20px; text-align:center;">
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Noticias.php?start=<?php echo max($start-PAGE_SIZE_NOTICIAS,0) ?>&amp;order=<?php echo $order ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_NOTICIAS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Noticias.php?start=<?php echo min($start+PAGE_SIZE_NOTICIAS,$totalRows) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>
</div>

<?php
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>