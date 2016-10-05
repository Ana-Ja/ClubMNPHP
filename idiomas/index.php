<?php
error_reporting(E_ALL | E_STRICT);
//ruta de los ficheros que etoy cargando y donde esta carpeta locale que guarda las traducciones
define('PROJECT_DIR', realpath('./'));
define('LOCALE_DIR', PROJECT_DIR .'/locale');
define('DEFAULT_LOCALE', 'en_US');
//tiene muchas funciones ya preparadas
require_once('./gettext.inc');
//array para sacar en pantalla posibles traducciones. Lo ideal seria poner banderitas
$supported_locales = array('en_US', 'it_IT', 'de_CH', 'es_ES', 'fr_FR');

//desde la linea 14 hasta la 24, es donde se configura donde estan las traducciones 

$encoding = 'UTF-8';
//coge el idioma que viene por GET y si no viene nada coge el lenguaje por defecto
$locale = (isset($_GET['lang']))? $_GET['lang'] : DEFAULT_LOCALE;

// gettext setup
T_setlocale(LC_MESSAGES, $locale);
// Set the text domain as 'messages'
$domain = 'messages';  //nombre del fichero que contiene las traducciones 
T_bindtextdomain($domain, LOCALE_DIR);
T_bind_textdomain_codeset($domain, $encoding);
T_textdomain($domain);

header("Content-type: text/html; charset=$encoding");
?>
<html>
<head>
<title></title>
</head>
<body>
<?php
print "<p>";

//se reccrre el arrya de idiomas para pintarlo en pantalla
foreach($supported_locales as $l) {
	print "[<a href=\"?lang=$l\">$l</a>] ";
}
print "</p>";

?>

<hr />

<?php
// using PHP-gettext
print "<pre>";
//echo T_("This is how the story goes.");


//T_ es una funcion definida en gettext.inc
echo T_("el cerdo va al mercado.");
echo T_("pablo tiene una casa");
echo "hola mundo";
echo T_("tralarí");


 "</pre>\n";
?>

<hr />
<p>&laquo; <a href="./">back</a></p>
</body>
</html>
