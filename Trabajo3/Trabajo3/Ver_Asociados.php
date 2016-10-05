<?php
$raiz="./";

 include_once("librerias/funciones.php");
 include_once ("librerias/Actividad.class.php"); 
 
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Ver Listado de Asociados";

 include_once("plantillas/cabecera.php");
?>
<script type="text/javascript">
window.onload = function() {
PonerFoco();
setInterval(muestraReloj, 1000);

}
</script>
<form action="Ver_Asociados.php" method="post">
    <div id="Asociados">
      <div class="busca1">
          Buscar Comercio:
          <input id="inp" name="palabra" value ="<?php echo isset($_POST['palabra'])?  $_POST['palabra']:""?>" />
          
      </div>
    <div class="busca2">
       Actividad:
        <select name="sactividad" id="sactividad" size="1">
                    <?php
                    $actividades=Actividad::getActividad();
                    foreach($actividades as $activi) { 
					   
                        echo "<option value='". $activi->getValueEncoded("id_actividad") . "' ";
						if ($activi->getValueEncoded("id_actividad") ==$_POST['sactividad']) {
							echo " selected=selected "; 
						}
						echo "> " . $activi->getValueEncoded("nombre") . " </option>";
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
   $texto .="| Filtro en Comercio: ". $_POST['palabra'];
  if ($numero==1) { 
	 //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 
	 $filtro = "  nombre_comercial like '%" .$_POST['palabra']. "%'";
	
   } elseif ($numero>1) { 
	//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 
	//busqueda de frases con mas de una palabra y un algoritmo especializado 
	
	$sql="SELECT SQL_CALC_FOUND_ROWS  * , MATCH ( nombre_comercial,nombre_comercial) AGAINST ( '". $_POST['palabra']. "' ) AS Puntos FROM Asociados WHERE MATCH (  nombre_comercial,nombre_comercial ) AGAINST ( '". $_POST['palabra']. "' )  ";
   }
 }
//si existe actividad seleccionada y esta es distinta del valor vacio
 if (isset($_POST['sactividad']) && $_POST['sactividad']!="" && Asociado::getNombreAct($_POST['sactividad'])!="") {
    if ($filtro=="") {
	 $filtro = "  id_actividad = " .$_POST['sactividad'] ;
	
	}else{
	$filtro .= " and  id_actividad = " .$_POST['sactividad']  ;
	}
   $texto .= "| Filtro en Actividad : " . Asociado::getNombreAct($_POST['sactividad']);;
 }
//valido los datos que me pueden llegar
$start = isset($_GET["start"]) ? (int)$_GET["start"]:0;

$order = isset( $_GET["order"] ) ? preg_replace( "/[^a-zA-Z]/", "", $_GET["order"] ) : "comercio";

list( $members, $totalRows) = Asociado::getAsociados( $start, PAGE_SIZE_USUARIOS, $order, $filtro, $sql);


?>
<br/>
<h2><b>Asociados&nbsp;<?php echo $start + 1 ?> - <?php echo min($start + PAGE_SIZE_USUARIOS, $totalRows)?> de <?php echo $totalRows ?></b></h2>
<p><b><?php echo $texto . "   "?></b> [<a href="borrarFiltros.php">Ver todos</a>]</p>

<br/>
<table cellspacing="0" style="width:90%; border:1px solid #666;">
	<tr>
    	
        
       <?php
	   echo "<th>";
	   if ($order!="comercio") {
		   echo '<a href="Ver_Asociados.php?order=comercio">Comercio</a>';
	   } else{
		   echo "Comercio";
	   }
	   echo"</th>";
	   
       ?> 
       
        <th><?php if ($order!="actividad") {?> <a href="Ver_Asociados.php?order=actividad"><?php }?> Actividad <?php if ($order!="actividad") {?></a><?php } ?></th>
        <th><?php if ($order!="ciudad") {?> <a href="Ver_Asociados.php?order=ciudad"><?php }?> Ciudad <?php if ($order!="ciudad") {?></a><?php } ?></th>
       
    </tr>
<?php
$rowCount=0;

foreach($members as $member){
	$rowCount++;
?>
        
       <tr <?php if ($rowCount %2==0) echo ' class="alt"'?>>
       <td><a class="avanzar" href="Ver_Asociado.php?id_asociado=<?php echo $member->getValueEncoded("id_asociado")?>&amp;start=<?php echo $start?>&amp;order=<?php echo $order?>" ><?php echo $member->getValueEncoded("nombre_comercial")?></a>  </td>
    	
		<td><?php echo $member->getNombreAct($member->getValueEncoded("id_actividad"))?>   </td>
        <td><?php echo $member->getNombreCiu($member->getValueEncoded("id_ciudad"))?>   </td>
	
    </tr>
<?php
}
?>
</table> 
<div style="width:30em;margin-top:20px; text-align:center;">
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Asociados.php?start=<?php echo max($start-PAGE_SIZE_USUARIOS,0) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_USUARIOS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Asociados.php?start=<?php echo min($start+PAGE_SIZE_USUARIOS,$totalRows) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina siguiente</a>
<?php } ?>
</div>

<?php
 include_once("plantillas/lateral.php");
 
 include_once("plantillas/pie.php");
 function PonerFiltro() {
	
	if (isset($_POST['palabra']) && $_POST['palabra']!="") {
		if ($texto=="") {
		$texto.="Filtrado por Comercio: ". $_POST['palabra'];
		} else {
			
		}
	} 
	if (isset($_POST['sactividad']) && $_POST['sactividad']!="") {
		 if ($texto=="") {
			 $texto="Filtrado por Actividad: ". Asociado::getNombreAct($_POST['sactividad']);
		 }else {
			 $texto.= " y por Actividad: ". Asociado::getNombreAct($_POST['sactividad']);
		 }
	}
	return $texto;
 }
?>