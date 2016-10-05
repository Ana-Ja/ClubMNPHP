<?php
$raiz="../";
include_once($raiz."librerias/funciones.php");
if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  }  
  
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Ribera, Tudela" ;
 $titulo_pagina="Ver Listado de Usuarios";

 include_once($raiz."plantillas/cabecera.php");

 
//valido los datos que me pueden llegar
$start = isset($_GET["start"]) ? (int)$_GET["start"]:0;

$order = isset( $_GET["order"] ) ? preg_replace( "/[^a-zA-Z]/", "", $_GET["order"] ) : "username";

list( $members, $totalRows) = Usuario::getUsuarios( $start, PAGE_SIZE_USUARIOS, $order);


?>
<h2>Usuarios&nbsp;<?php echo $start + 1 ?> - <?php echo min($start + PAGE_SIZE_USUARIOS, $totalRows)?> de <?php echo $totalRows?>
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Usuarios.php?start=<?php echo max($start-PAGE_SIZE_USUARIOS,0) ?>&amp;order=<?php echo $order ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_USUARIOS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Usuarios.php?start=<?php echo min($start+PAGE_SIZE_USUARIOS,$totalRows) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?></h2>
<br/>
<table cellspacing="0" style="width:30em; border:1px solid #666;">
	<tr>
    	
        
       <?php
	   echo "<th>";
	   if ($order!="username") {
		   echo '<a href="Ver_Usuarios.php?order=username">Username</a>';
	   } else{
		   echo "Username";
	   }
	   echo"</th>";
       ?> 
       
        <th><?php if ($order!="Nombre") {?> <a  href="Ver_Usuarios.php?order=nombre"><?php }?> Nombre <?php if ($order!="Nombre") {?></a><?php } ?></th>
        <th><?php if ($order!="Apellidos") {?> <a   href="Ver_Usuarios.php?order=apellidos"><?php }?> Apellidos <?php if ($order!="Apellidos") {?></a><?php } ?></th>
        <th> Tipo </th>
    </tr>
<?php
$rowCount=0;

foreach($members as $member){
	$rowCount++;
?>
        
       <tr <?php if ($rowCount %2==0) echo ' class="alt"'?>>
    	<td><a class="avanzar" href="Ver_Usuario.php?id_usuario=<?php echo $member->getValueEncoded("id_usuario")?>&amp;start=<?php echo $start?>&amp;order=<?php echo $order?>" ><?php echo $member->getValueEncoded("username")?></a>  </td>
		<td><?php echo $member->getValueEncoded("nombre")?>   </td>
		<td><?php echo $member->getValueEncoded("apellidos") ?>  </td>
        <td><?php echo $member->getTipo("tipo") ?>  </td>
    </tr>
<?php
}
?>
</table> 
<div style="width:30em;margin-top:20px; text-align:center;">
<?php if ($start>0) {?>
 <a class="avanzar" href="Ver_Usuarios.php?start=<?php echo max($start-PAGE_SIZE_USUARIOS,0) ?>&amp;order=<?php echo $order ?> ">&lt;&lt;P&aacute;gina anterior</a>
<?php } ?>
&nbsp;
<?php if ($start+ PAGE_SIZE_USUARIOS< $totalRows) {?>
   
 <a class="avanzar" href="Ver_Usuarios.php?start=<?php echo min($start+PAGE_SIZE_USUARIOS,$totalRows) ?>&amp;order=<?php echo $order ?> ">P&aacute;gina siguiente&gt;&gt;</a>
<?php } ?>
</div>

<?php
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");
?>