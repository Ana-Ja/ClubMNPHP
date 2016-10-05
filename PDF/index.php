
<?php 
# Cargamos la librería dompdf.
require_once './lib/dompdf_config.inc.php';
 
# Contenido HTML del documento que queremos generar en PDF.
$html='
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Ejemplo de Documento en PDF.</title>
</head>
<body>
 
<h2>Ingredientes para la realización de Postres.</h2>
<p>Ingredientes:</p>
<dl>
<dt>Chocolate</dt>
<dd>Cacao</dd>
<dd>Azucar</dd>
<dd>Leche</dd>
<dt>Caramelo</dt>
<dd>Azucar</dd>
<dd>Colorantes</dd>
</dl>
 
</body>
</html>';
 
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();
 
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");
 
# Cargamos el contenido HTML.
//$mipdf ->load_html(utf8_decode($html));  no funciona con los acentos
$mipdf ->load_html($html, "UTF-8");
 
# Renderizamos el documento PDF.
$mipdf ->render();
 
# Enviamos el fichero PDF al navegador.
$mipdf ->stream('FicheroEjemplo.pdf');
?>