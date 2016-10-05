<?php



$raiz="../";
include_once($raiz."librerias/funciones.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//valido los datos que me pueden llegar
$start = isset($_GET["start"]) ? (int)$_GET["start"]:0;
$order = isset( $_GET["order"] ) ? preg_replace( "/[^a-zA-Z]/", "", $_GET["order"] ) : "fecha";


list( $members, $totalRows) = Noticia::getNoticias2( $start, PAGE_SIZE_NOTICIAS,$order);




echo "<h2>Seleccione una noticia de la lista  ";

echo $start + 1 . " - " . min($start + PAGE_SIZE_NOTICIAS, $totalRows). " de " . $totalRows;
 if ($start>0) {
   echo '<a class="avanzar" href="Ver_Noticias-ajaxII.php?start='. max($start-PAGE_SIZE_NOTICIAS,0).'&amp;order='.$order . '" id="ant">&lt;&lt;P&aacute;gina anterior</a>';
 } 
echo " ";
if ($start+ PAGE_SIZE_NOTICIAS< $totalRows) {
   
 echo '<a class="avanzar" href="Ver_Noticias-ajaxII.php?start='. min($start+PAGE_SIZE_NOTICIAS,$totalRows) .'&amp;order='. $order . '" id="sig">P&aacute;gina siguiente&gt;&gt;</a>';
 } 



echo "</h2><br/>";

    echo '<table cellspacing="0" style="width:100%;border:1px solid #666;">';
	echo "<tr>";
   
    echo "<th>";
	   if ($order!="fecha") {
		   echo '<a href="Ver_Noticias-ajax.php?order=fecha" id="fec">Fecha</a>';
	   } else{
		   echo "Fecha";
	   }
	   echo"</th>";
        
        echo "<th> Titulo </th>";
        echo " <th>";
	   if ($order!="Ciudad") { 
	       echo '<a  href="Ver_Noticias-ajaxII.php?order=Ciudad" id="ciu">'; 
		   }
           echo "Ciudad";
		   if ($order!="Ciudad") {
               echo "</a>";
			   } 
           echo "</th>";
    	
        
       
    echo "</tr>";

$rowCount=0;

foreach($members as $member){
	$rowCount++;
?>
        
       <tr <?php if ($rowCount %2==0) echo ' class="alt"'?>>
        <td><?php echo muestraDia(substr($member->getValueEncoded("fecha"),0, 10))?>   </td>
    	<td><a class="avanzar" href="actualizar_noticia_ajax.php?id_noticia=<?php echo $member->getValueEncoded("id_noticia")?>&amp;start=<?php echo $start?>&amp;order=<?php echo $order?>" ><?php echo $member->getValueEncoded("titulo")?></a>  </td>
		
		<td><?php echo Ciudad::getNombreCiu($member->getValueEncoded("id_ciudad")) ?>  </td>
        
    </tr>
<?php
}
?>
</table> 
<div style="width:30em;margin-top:20px; text-align:center;">
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Noticias-ajaxII.php?start=<?php echo max($start-PAGE_SIZE_NOTICIAS,0) ?>&amp;order=<?php echo $order ?> "id="ant2">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_NOTICIAS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Noticias-ajaxII.php?start=<?php echo min($start+PAGE_SIZE_NOTICIAS,$totalRows) ?>&amp;order=<?php echo $order ?>"  id="sig2">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>
</div>

