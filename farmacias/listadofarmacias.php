<?php

require './simple_html_dom.php';
//strong > table > tbody > tr > td.title > strong > font > a
// Create DOM from URL or file
$html = file_get_html('http://www.cof-navarra.com/servicios/farmacias_navarra/index.php?busqueda=manual');

//$es = $html->find('table.td-lined td.title a');
$cont = 1;
echo '<table border="1" style="width:100%">
	<tr>
		<td>Num</td>
		<td>NOMBRE</td>
		<td>DIRECCION</td>
		<td>Cod Postal</td>
		<td>Localidad</td>
		<td>Telefono</td>
	</tr>';
foreach($html->find('a[href^=informacion.php]') as $element) {
       //echo $cont++." ".substr($element->href, 20). ' '.$element->plaintext.'<br>';
	$html = file_get_html('http://www.cof-navarra.com/servicios/farmacias_navarra/informacion.php?fid='.substr($element->href, 20));
	echo '<tr>';
	$parte0 = $html->find('td.title strong font',0);
	$parte1 = $html->find('td.title p font',0);
	//divido la dirección en calle, cp y localidad
	$direccion = explode("<br>", $parte1->innertext);

	$parte2 = $html->find('td.title>font',4);
		echo '<td>'.$cont++.'</td>';
		echo '<td>'.$parte0->innertext.'</td>';
		echo '<td>'.$direccion[0].'</td>';
		echo '<td>'.substr($direccion[2], -6).'</td>';
		echo '<td>'.$direccion[4].'</td>';
		echo '<td>'.substr($parte2->plaintext,4).'</td>';

	echo '</tr>';
}
echo '</table>'

?>

	<tr>
		
	</tr>



<?php
//echo "<br><span>NOMBRE: ".$parte0->innertext."</span>";

return;

echo "<br>TELEFONO: ".$parte2->plaintext;


foreach ($html->find('td.title') as $element) {
	//echo "<br>".$element->outertext;

}



foreach ($html->find('td.title') as $element) {
	foreach ($element->find('font[color=#000000]') as $nombre){
		echo "<br>NOMBRE: ".$nombre->plaintext;

	}
	
	foreach ($element->find('p font') as $direccion){
		echo "<br>DIRECCION: ".$direccion->innertext;
	}

	foreach ($element->find('font[color=#333333]') as $tel){
		//echo "<br>TEL: ".$tel->innertext;
	}

	foreach ($html->find('body > table > tbody > tr:nth-child(2) > td.contenidoCentral > table > tbody > tr > td.ColumnasInteriores > table > tbody > tr > td > table:nth-child(3) > tbody > tr > td > table > tbody > tr:nth-child(2) > td > font') as $tel){
		echo "<br>TEL: ".$tel->innertext;
	}
	
	
	//$tel = $element->find('p ')
	//echo $element .'<br>';
}
?>