<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . './Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");


// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Num')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Direccion')
            ->setCellValue('D1', 'Cod Postal')
            ->setCellValue('E1', 'Localidad')
            ->setCellValue('F1', 'Teléfono');





require './simple_html_dom.php';
//strong > table > tbody > tr > td.title > strong > font > a
// Create DOM from URL or file
$html = file_get_html('http://www.cof-navarra.com/servicios/farmacias_navarra/index.php?busqueda=manual');

//$es = $html->find('table.td-lined td.title a');
$cont = 2;
echo '<table border="1" style="width:100%">
	<tr>
		<td>Num</td>
		<td>NOMBRE</td>
		<td>DIRECCION</td>
		<td>Cod Postal</td>
		<td>Localidad</td>
		<td>Telefono</td>
	</tr>';

var_dump($html);
foreach($html->find('a[href^=informacion.php]') as $element) {
       //echo $cont++." ".substr($element->href, 20). ' '.$element->plaintext.'<br>';
	$html = file_get_html('http://www.cof-navarra.com/servicios/farmacias_navarra/informacion.php?fid='.substr($element->href, 20));
	echo '<tr>';
	$parte0 = $html->find('td.title strong font',0);
	$parte1 = $html->find('td.title p font',0);
	//divido la dirección en calle, cp y localidad
	$direccion = explode("<br>", $parte1->innertext);

	$parte2 = $html->find('td.title>font',4);
		echo '<td>'.$cont.'</td>';
		echo '<td>'.$parte0->innertext.'</td>';
		echo '<td>'.$direccion[0].'</td>';
		echo '<td>'.substr($direccion[2], -6).'</td>';
		echo '<td>'.$direccion[4].'</td>';
		echo '<td>'.substr($parte2->plaintext,4).'</td>';

	echo '</tr>';


	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$cont, $cont-1)
            ->setCellValue('B'.$cont, utf8_encode($parte0->innertext))
            ->setCellValue('C'.$cont, utf8_encode($direccion[0]))
            ->setCellValue('D'.$cont, utf8_encode(substr($direccion[2], -6)))
            ->setCellValue('E'.$cont, utf8_encode($direccion[4]))
            ->setCellValue('F'.$cont, utf8_encode(substr($parte2->plaintext,4)));
    $cont++;
}
echo '</table>';




// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('Farmacias.xlsx');
return;


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Save Excel 95 file
echo date('H:i:s') , " Write to Excel5 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;
