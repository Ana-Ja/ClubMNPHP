<?php
$raiz="../";
  include_once($raiz."librerias/funciones.php");

  

if  (checkLogin() != true)  {
   header("Location:login.php"); 
   //ademas salgo de este script 
    exit(); 
  }
 
 $descripcion="Asociación de Comerciantes de la Ribera de Tudela";
 $keywords="Anuncios, Tudela, Asociación, Comerciantes, Ribera" ;
 $titulo_pagina="TABLON DE ANUNCIOS";
 
?>




 
<?php
 include_once($raiz."plantillas/cabecera.php");
 //conectamos con la BD
 $conexion= conexion_bd();
 
 
 
 //compruebo si recibo datos del formulario
 //if ($_POST) {
	 if (isset($_POST["action"]) and $_POST["action"]=="grabar" ) {
 //inserto en la base datos...
 //validamos algunos datos

   if (isset($_POST["titulo"]) and ($_POST["titulo"]=="")) {
	  echo "<p class='formerror' >Introduzca un t&iacute;tulo</p>";
   } elseif (isset($_POST["cuerpo"]) and  ($_POST["cuerpo"]=="")) {
	   echo "<p class='formerror' >Introduzca algo en el cuerpo del mensaje</p>";
   } elseif (isset($_POST["date"]) and ($_POST["date"]=="") ){
	   echo "<p class='formerror' >Introduzca fecha caducidad del anuncio</p>";
   } else {
		$sql="Insert into Anuncios (titulo_anuncio, cuerpo_anuncio, id_ciudad,fbaja) values ('" . $_POST["titulo"] . "', '" . $_POST["cuerpo"] . "', " . $_POST["idciudad"].  ", '" . $_POST["date"]."')";
		
		if (mysql_query($sql)) {
			echo "<p class='formerror'>Anuncio correctamente insertado.  <a href='../anuncios.php'>Ver Lista</a></p>";
			$_POST["titulo"]="";
			$_POST["cuerpo"]="";
			$_POST["date"]="";
			$_POST["idciudad"]="";
		} else {
			//echo "<div style='border: 1px, red, solid; padding: 10px;'>";
	    	echo "<p class='formerror'>La sentencia: " . $sql . " ha provocado el error. ";
		    echo mysql_error($conexion);
		    //echo "</div>";
		    echo "Inserción no realizada</p>";
		}
		
		
   }
 
 //} else {
    //muestro formulario
 }
 ?>
 <script type="text/javascript">
    window.onload = function() {
    PonerFoco();
    setInterval(muestraReloj, 1000);
	
	 Calendar.setup({
    inputField: "fecha",
    ifFormat:   "%Y-%m-%d",
    button:     "selector"
  });
   }
</script>
 <br />  
<h3>Desde esta p&aacute;gina puedes enviar un anuncio al Tabl&oacute;n de Anuncios</h3>   <br />  <br />  
<!--//en action metemos la variable PHP_SELF, contenido de la ruta que se esta ejecutando eneste momento en PHP, ed, los datos del formulario se vana a enviar a la misma pagina donde esta el formulario-->
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
     <input type="hidden" name="action" value="grabar" />
	<div class="paraform">
    	Titulo del anuncio:
        <br />
        <input type="text" name="titulo" size="35" maxlength="200" value="<?php if (isset($_POST["titulo"] )) { echo $_POST["titulo"];}?>"/>    
    </div>
    <div class="paraform">
    	Cuerpo del anuncio:
        <br />
        <textarea name="cuerpo" cols="80" rows="10"><?php if (isset($_POST["cuerpo"] )) { echo $_POST["cuerpo"];}?></textarea>    
    </div>
    <div class="paraform">
      Ciudad del anuncio:
        <br />
        <select name="idciudad" >
        <?php
			$sql="Select * from ciudades order by nombre_ciudad";
			$rs=mysql_query($sql);
			while ($fila=mysql_fetch_array($rs)) {
				//para cadaunos de los registros ciudad leido
				echo '<option value = "'. $fila["id_ciudad"]. '"' ; 
				if(isset($_POST["idciudad"]) and $_POST["idciudad"]==$fila["id_ciudad"]) echo "selected='selected'";
				echo '>' . $fila["nombre_ciudad"]. "</option>";
			}
			mysql_free_result($rs);
        
        ?>
        
       </select>    
     </div>
     <div class="paraform">
     Fecha Caducidad: <input type="text" name="date" id="fecha" readonly="readonly" value="<?php if (isset($_POST["date"] )) { echo $_POST["date"];}?>" />
<img src="<?php echo $raiz; ?>images/img.gif" id="selector" alt="calendario"/>
</div>
     <div class="paraform">
     	<input type="submit" value="Enviar" />
     </div>  
     </form> 
 <?php
// }
 //cierro la conexion de la bd. Maximo 100 conexiones concurrentes
 mysql_close($conexion);
 
 include_once($raiz."plantillas/lateral.php");
 
 include_once($raiz."plantillas/pie.php");


?>

