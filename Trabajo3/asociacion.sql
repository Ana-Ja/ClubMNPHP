-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-10-2011 a las 17:14:58
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asociacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesolog`
--

CREATE TABLE IF NOT EXISTS `accesolog` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `numvisitas` mediumint(9) NOT NULL,
  `ultimoacceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`,`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `accesolog`
--

INSERT INTO `accesolog` (`id_usuario`, `url`, `numvisitas`, `ultimoacceso`) VALUES
(16, 'login.php', 51, '2011-10-13 17:00:46'),
(17, 'login.php', 188, '2011-10-13 17:01:52'),
(17, 'enviar_anuncio.php', 391, '2011-10-11 16:47:25'),
(17, 'anuncios.php', 176, '2011-10-13 17:13:15'),
(16, 'Ver_Usuarios.php', 2, '2011-07-30 19:28:56'),
(16, 'galeria.php', 74, '2011-10-13 17:01:14'),
(17, 'galeria.php', 477, '2011-10-06 12:21:24'),
(17, 'subir_archivos.php', 289, '2011-10-06 14:05:19'),
(16, 'index.php', 23, '2011-10-13 17:00:49'),
(16, 'enviar_anuncio.php', 54, '2011-10-13 17:01:11'),
(16, 'anuncios.php', 20, '2011-07-31 18:54:07'),
(16, 'noticias.php', 4, '2011-07-31 16:51:23'),
(16, 'contacto.php', 4, '2011-07-30 20:47:27'),
(17, 'index.php', 348, '2011-10-13 17:01:54'),
(17, 'Ver_Usuarios.php', 600, '2011-10-13 17:02:22'),
(17, 'Ver_Usuario.php', 981, '2011-10-11 17:28:23'),
(16, 'documentos.php', 20, '2011-10-13 17:01:26'),
(17, 'documentos.php', 84, '2011-10-06 14:12:52'),
(17, 'contacto.php', 66, '2011-10-05 17:38:46'),
(17, 'Ver_Asociados.php', 258, '2011-10-13 17:11:33'),
(17, 'ventajas.php', 36, '2011-10-06 10:34:01'),
(17, 'register.php', 60, '2011-08-09 17:55:42'),
(17, 'noticias.php', 6, '2011-10-05 09:57:57'),
(17, 'misnews.php', 562, '2011-10-11 17:22:43'),
(17, 'actualizar_noticia.php', 662, '2011-10-08 11:16:12'),
(17, 'Ver_Noticias.php', 745, '2011-10-08 11:15:20'),
(17, 'Ver_Asociado.php', 10, '2011-10-05 17:44:55'),
(17, 'alta_noticia.php', 118, '2011-08-18 18:35:54'),
(17, 'formacion.php', 14, '2011-10-05 18:32:31'),
(17, 'donde.php', 4, '2011-10-05 17:42:44'),
(17, 'alta_noticia_ajax.php', 208, '2011-10-11 17:30:55'),
(17, 'Ver_Noticias-ajax.php', 865, '2011-10-13 17:02:11'),
(17, 'Ver_Noticias-ajaxII.php', 6, '2011-08-22 10:59:57'),
(17, 'actualizar_noticia_ajax.php', 577, '2011-10-13 17:02:03'),
(17, 'objetivos.php', 20, '2011-10-11 17:18:02'),
(12, 'login.php', 6, '2011-10-06 10:41:54'),
(12, 'index.php', 4, '2011-10-06 10:41:55'),
(12, 'misnews.php', 6, '2011-10-03 16:47:13'),
(17, 'Servicios.php', 32, '2011-10-05 17:30:04'),
(17, 'enviar_anuncio - copia.php', 14, '2011-10-04 14:23:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre`) VALUES
(1, 'Ocio'),
(2, 'Restauracion'),
(3, 'Comercio'),
(4, 'Servicios'),
(5, ''),
(6, 'Regalos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id_anuncio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_anuncio` varchar(200) NOT NULL,
  `cuerpo_anuncio` text NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `falta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fbaja` date NOT NULL,
  PRIMARY KEY (`id_anuncio`),
  FULLTEXT KEY `ft_anuncios` (`titulo_anuncio`,`cuerpo_anuncio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `titulo_anuncio`, `cuerpo_anuncio`, `id_ciudad`, `falta`, `fbaja`) VALUES
(1, 'Coche económico', 'Se compra coche barato.', 2, '2011-10-13 17:12:24', '2011-10-02'),
(2, 'Oportunidad coche', 'Vendo coche barato y nuevo.', 2, '2011-10-13 17:12:43', '2011-10-26'),
(3, 'vendo moto', 'moto en buen estado con casco incluido', 1, '2011-10-04 12:15:25', '2011-11-15'),
(4, 'necesito fontanero', 'fontanero para arreglar mis grifos', 3, '2011-10-04 00:00:00', '2011-11-16'),
(5, 'se buscar informatico', 'no importa la edad, lo importante es que quiera trabajar', 5, '2011-10-02 00:00:00', '2011-11-30'),
(6, 'Albañil', 'se buscar albanil para arreglar los aleros a cambio de horas de clases de ingles', 8, '2011-10-13 17:13:49', '2011-12-20'),
(9, 'comidas', '¿donde se come bien en Argentina?', 9, '2011-10-13 17:13:38', '2011-10-30'),
(11, 'Entradas Real Madrid-Barcelona', 'Vendo entradas Real Madrid-Barcelona ', 8, '2011-10-04 12:19:50', '2012-10-15'),
(10, 'Intercambio de clases', 'Se dan clases de ingles a cambio de clases de Informatica', 2, '2011-10-04 12:20:04', '2011-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociados`
--

CREATE TABLE IF NOT EXISTS `asociados` (
  `id_asociado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(150) NOT NULL,
  `nombre_comercial` varchar(150) NOT NULL,
  `id_actividad` int(10) unsigned NOT NULL,
  `id_ciudad` int(10) unsigned NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `comentarios` varchar(250) NOT NULL,
  PRIMARY KEY (`id_asociado`),
  UNIQUE KEY `correo` (`correo`),
  KEY `id_actividad` (`id_actividad`),
  KEY `id_ciudad` (`id_ciudad`),
  FULLTEXT KEY `comercio` (`nombre_comercial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `asociados`
--

INSERT INTO `asociados` (`id_asociado`, `razon_social`, `nombre_comercial`, `id_actividad`, `id_ciudad`, `direccion`, `telefono`, `correo`, `comentarios`) VALUES
(1, 'La Mafia', 'La Mafia', 2, 1, 'Plaza Vieja', '948 555555', 'lamafia@hotmail.com', ''),
(2, 'Asesoria Leon', 'Asesoria Leon', 4, 8, 'C/ La Vida 20', '948 777 77', 'asesorialeon@gmail.es', 'ninguno'),
(3, 'Ferreteria La Llave', 'Ferreteria La Llave', 1, 1, 'C/Torito Bravo 22, 4ºC', '947 525415', 'lallave@gmail.com', ''),
(4, 'Ferreteria La Tuerca', 'Ferreteria La Tuerca', 1, 1, 'C/Torito Bravo 22, 4ºC', '947 525415', 'latuerca@gmail.com', ''),
(5, 'Carniceria Martinez', 'Carniceria Martinez', 1, 1, '', '', 'carnes@gmail.com', ''),
(6, 'Pizzeria Italia', 'Pizzeria Italia', 2, 3, '', '', 'italia@gmial.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(150) NOT NULL,
  `imagen_ciudad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre_ciudad`, `imagen_ciudad`) VALUES
(1, 'Arguedas', 'Arguedas.png'),
(2, 'Cabanillas', 'Cabanillas.png'),
(3, 'Corella', 'Corella.png'),
(4, 'Fustiñana', 'Fustinana.png'),
(5, 'Monteagudo', 'Monteagudo.png'),
(6, 'Valtierra', 'Valtierra.png'),
(7, 'Tudela', 'Tudela.png'),
(8, 'Murchante', 'Murchante.png'),
(9, 'Cascante', 'Cascante.png'),
(10, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(4) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(10) unsigned NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `noticia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fbaja` date NOT NULL,
  UNIQUE KEY `id_noticia` (`id_noticia`),
  KEY `id_ciudad` (`id_ciudad`),
  FULLTEXT KEY `comercio` (`titulo`,`noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Volcar la base de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `id_ciudad`, `titulo`, `fecha`, `noticia`, `fbaja`) VALUES
(14, 6, 'El ayuntamiento refuerza el vallado para los encierros', '2011-08-17 13:20:32', 'VALTIERRA \r\nEl ayuntamiento refuerza el vallado para los encierros\r\nENRIQUE MORANCHO . VALTIERRA     .Se han colocado pletinas de acero en todos los tablones de madera de las puertas de acceso al recorrido\r\nActualizada 13/08/2011 a las 01:55 .. \r\n.. \r\n.Imprimir \r\nEnviar ..ImÃ¡genes  \r\nImagen de un operario mientras coloca el refuerzo en el vallado. MORANCHO. \r\n. .El Ayuntamiento de Valtierra ha decidido reforzar parte del vallado del recorrido del encierro de cara a las prÃ³ximas fiestas patronales que celebrarÃ¡ la localidad a partir del dÃ­a 17 de agosto. En concreto serÃ¡n revisadas todas las puertas de acceso a dicho tramo.\r\n\r\nEn concreto, se van a revisar todas las puertas de acceso al vallado y van a ser reforzadas con pletinas de acero. Ã‰stas irÃ¡n sujetas a los tablones de madera con varios tirafondos. La empresa local Talleres Litago SL, ha sido la elegida llevarÃ¡ a cabo esta tarea.\r\n\r\nEl refuerzo pretende evitar incidentes como el que sucediÃ³ el aÃ±o pasado en el municipio cuando un novillo saltÃ³ el vallado. TambiÃ©n se efectuarÃ¡ en previsiÃ³n de sucesos como el ocurrido recientemente en Lodosa y en el que falleciÃ³ un hombre de 74 aÃ±os. \r\n\r\nAdemÃ¡s, esta medida viene motivada por la gran afluencia de pÃºblico tanto a los encierros como a las pruebas de reses bravas, que aÃ±o tras aÃ±o se convierten en protagonistas de las fiestas.\r\n\r\n', '0000-00-00'),
(13, 4, 'Fustiñana pone fin a sus fiestas patronales comiendo migas', '2011-08-13 18:27:51', 'Tras 8 días de juerga interrumpida, Fustiñana puso ayer fin a sus fiestas patronales en honor a San Justo y Pastor. Como no podía ser de otra manera, quisieron despedir las fiestas con el estómago lleno y qué mejor manera que con un buen plato de migas, un plato típico de la zona. Para ello, el ayuntamiento celebró un concurso de migas en la plaza cercana a la carpa municipal, en la que participaron 5 personas. Carlos Enériz Andrés cocinó, según el jurado. el mejor guiso y fue premiado con un jamón.\r\n\r\nEl segundo premio fue a parar a manos de Jesús Gil Polón, que fue obsequiado con un queso. Ignacio Martínez Pradilla y la peña el Camarote recibieron dos botellas de vino cada uno por el tercer y cuarto puesto. Además Inocencio Cerezo Puig, aunque no participó en el concurso, cocinó un guiso de migas para los que se acercaron a presenciarlo. \r\n\r\nSobre las 09.30 de la mañana los participantes acudieron a la carpa municipal con los ingredientes y la cazuela lista para cocinar unas exquisitas migas, que después degustaron junto a familiares y amigos. \r\n\r\nUna hora más tarde, los guisos se pusieron a disposición del jurado, que estuvo compuesto por Pili Juárez Alises, Javier Sola Redrado y Conchita Chueca Salvatierra, quienes coincidieron en la dificultad de elegir el ganador porque "todos están muy buenos".\r\n\r\nSecreto del chef\r\n\r\nTras la valoración y el fallo del jurado, los participantes recogieron los premios. Después alrededor de 100 personas qué se habían acercado a ver el concurso, degustaron los platos. Terminaron hasta la última cucharada de los 5 calderetes que se habían cocinado.\r\n\r\nComo dice el refrán en esto de cocinar "cada maestrillo tiene su librillo". El ganador del concurso, Carlos Enériz descubrió su secreto: "Ponemos aceite a calentar y pochamos la cebolla bien picada, luego freímos la panceta y cuando está tostada incluimos el resto de ingredientes y el pan. Solo hay que esperar 10 minutos removiendo sin parar y a disfrutar del manjar", explicó Enériz. \r\n\r\n\r\n', '0000-00-00'),
(12, 8, 'La PolicÃ­a Nacional alerta de que bandas organizadas operan en Tudela y la Ribera ', '2011-10-11 17:22:35', 'No se trata de una alarma social, pero sÃ­ de un aviso a la poblaciÃ³nn para que colabore de lleno con las policÃ­as. Bandas organizadas itinerantes que proceden del Este de Europa, principalmente, se han detectado en los Ãºltimos meses en EspaÃ±a. Tudela y la Ribera tambiÃ©n son objetivos de estos grupos delictivos que atracan principalmente en naves de los polÃ­gonos y grandes almacenes, aunque tambiÃ©n lo hacen en viviendas.\r\n.\r\n', '2011-11-25'),
(62, 7, 'El grupo Las gafas de Mike inicia la grabaciÃ³n de su segundo disco', '2011-10-08 20:22:17', 'El grupo tudelano de rock Las gafas de Mike ya se ha encerrado en el estudio de grabaciÃ³n para dar forma al que serÃ¡ su segundo disco, que saldrÃ¡ a la venta en diciembre bajo el tÃ­tulo Hoy aquÃ­, maÃ±ana allÃ¡.\r\n\r\n', '2011-11-28'),
(60, 1, 'Detenidas 4 personas por cultivar marihuana en Arguedas', '2011-10-08 20:16:59', 'La Guardia Civil ha detenido en Ablitas a cuatro personas a los que acusa de cultivar marihuana. tienen 30, 31, 42 y 50 aÃ±os. Tras conocer que podÃ­a haber una plantaciÃ³n en esa localidad ribera, hallaron las plantas en una finca prÃ³xima a una vivienda. Realizaron un registro y hallaron 17, con un peso de 160 kilos. Dentro de la casa habÃ­a Ãºtiles para su cultivo y elaboraciÃ³n.\r\n.', '2011-11-15'),
(61, 9, 'Trabajadores de Trelleborg piden subir sus sueldos conforme al IPC ', '2011-10-08 20:20:15', 'Trabajadores de la empresa Trelleborg Automotive de Cascante, que cuenta con una plantilla de 96 personas, se concentraron ayer a las puertas de la factorÃ­a en demanda de un incremento salarial acorde a la subida del coste de la vida, segÃºn indicÃ³ el comitÃ© de empresa, formado por representantes de CC OO, UGT y ELA.\r\n.', '0000-00-00'),
(18, 3, ' El tipo de columna ENUM', '2011-10-08 19:57:59', 'Un ENUM es un objeto de cadenas de caracteres con un valor elegido de una lista de valores permitidos que se enumeran explÃ­tamente en la especificaci?e columna en tiempo de creaci?e la tabla. ', '2011-10-01'),
(19, 7, ' Tudela se muestra al turismo', '2011-08-24 20:35:14', 'La riqueza arquitectÃ³nica y artÃ­Â­stica de Tudela es foco de interÃ©s para los turistas que durante el verano se acercan por la capital ribera. Prueba de ello es la respuesta de los turistas a las visitas guiadas que durante la ÃƒÂ©poca estival ofertan el Museo de Tudela y el Consorcio Eder por el casco antiguo de la ciudad.\r\n\r\nDurante el pasado mes de julio fueron 1.050 los turistas que respondieron a esta iniciativa del Museo de Tudela. Una cifra que el citado museo prevÃƒÂ© incrementar este mes de agosto con otros 2.000 visitantes, ademÃ¡s de varios grupos de jÃ³venes que han elegido Tudela para pasar los dÃ­as previos a las Jornadas Mundiales de la Juventud. En este incremento respecto al mes pasado influye, segÃºn dijeron desde el museo, el hecho de que la inestabilidad climatolÃ³gica de este verano estÃ¡n incrementando el turismo de interior.\r\n\r\nComo informaron desde la oficina de turismo Punto de Encuentro de la capital ribera, la mayorÃ­a de los turistas que estÃ¡n visitando la ciudad provienen del PaÃ­s Vasco y CataluÃ±a, y este aÃ±o se ha incrementado el nÃºmero de visitantes de Madrid y Castilla la Mancha.\r\n\r\nPor lo que se refiere a las visitas de Eder, los resultados de las mismas se darÃ¡n a conocer a finales del verano.\r\n\r\nLas visitas\r\n\r\nLas visitas guiadas que oferta el Museo de Tudela se desarrollan de lunes a viernes, a partir de las 10 de la maÃ±ana y las 4 de la tarde, y tienen una duraciÃ³n aproximada de una hora. \r\n\r\nEl turista puede elegir entre dos rutas diferentes. La primera incluye una visita por el exterior e interior de la catedral, incluyendo su claustro, y el Museo de Tudela. La segunda ofrece una ruta por la zona monumental de la ciudad, que incluye paradas en la catedral, el palacio del MarquÃ©s de San AdriÃ¡n y la iglesia de la Magdalena.\r\n\r\nPor su parte, las visitas gratuitas que ha programado Eder para julio y agosto por la Tudela Barroca son los domingos a partir de las 10.15 horas. El itinerario incluye conocer la capilla de Santa Ana, la plaza Vieja, el exterior del palacio del MarquÃ©s de Huarte, varias iglesias, los conventos de las Capuchinas y los Carmelitas, y las calles HerrerÃ­Â­as, Carmen Baja y Alta y la plaza de los Fueros.\r\n\r\nLa Puerta del Juicio de la catedral es el punto de partida de todas las visitas, ademÃ¡s de uno de los de mayor interÃ¨s para los turistas, convirtiÃ¨ndose en el objetivo de miles de cÃ¡maras. \r\n\r\nLa mayorÃ­a de los visitantes se muestran muy interesados por las imÃ¡genes de las dovelas que representan distintos episodios del antiguo testamento, especialmente las que corresponden a imÃ¡genes infernales. "Son muy curiosas y al mismo tiempo te trasladan directamente al pensamiento de aquella Ã¨poca. Sin duda merece la pena visitarla", coincidieron dos turistas bilbaÃ­Â­nos que prefirieron no dar su nombre. "La Puerta del Juicio es majestuosa y un ejemplo de arte romÃ¡nico que no encuentras en muchos lugares. AdemÃ¡s es la mejor conservada de todas las que he visto en Navarra", indicÃ³ Laura Nieto Bernabeu, una alicantina de 26 aÃ±os, que visitaba la ciudad estos dÃ­as.\r\n\r\nOtro punto de gran interÃ©s para los turistas extranjeros es la iglesia de la Magdalena, ejemplo de arte romÃ¡nico.\r\n\r\n\r\n', '0000-00-00'),
(10, 7, 'Mochilas, delantales y premio del Plan de Igualdad', '2011-08-17 13:23:24', 'El Ayuntamiento de Ribaforada, a travÃ©s de la concejalÃ­a de Igualdad tiene previsto repartir 500 mochilas antes del cohete y delantales en el concurso de calderetes que se organiza en fiestas. Ese dÃ­a entregarÃ¡ tambiÃ©n los premios del Certamen Literario "Igualdad y mujer" de relato corto y poesÃ­a. En el certamen han participado 18 obras: 12 de relato corto y 6 de poesÃ­a.\r\n\r\nBelÃ©n Campo Ãlvarez, de Ribaforada, recibirÃ¡ el primer premio de relato corto y poesÃ­a dotado con 300 euros cada uno; LucÃ­a Jalle MagaÃ±a tambiÃ©n se hizo acreedora de los segundos premios de ambas modalidades y recogerÃ¡ 150 euros por cada uno. El ganador del accÃ©sit de relato corto es JosÃ© AgustÃ­n Blanco Redondo, de Ciudad Real (100 ?) y la ganadora del de poesÃ­a es MarÃ­a Dolores Echaide Navarro, de Ablitas (100 ?).\r\n', '0000-00-00'),
(11, 7, 'concierto de piano en la catedral de Tudela', '2011-10-08 20:29:33', 'El Ayuntamiento de Ribaforada, a travÃ©s de la concejalÃ­a de Igualdad tiene previsto repartir 500 mochilas antes del cohete y delantales en el concurso de calderetes que se organiza en fiestas. Ese dÃ­a entregarÃ¡ tambiÃ©n los premios del Certamen Literario "Igualdad y mujer" de relato corto y poesÃ­a. En el certamen han participado 18 obras: 12 de relato corto y 6 de poesÃ­a.\r\n\r\nBelÃ©n Campo Ãlvarez, de Ribaforada, recibirÃ¡ el primer premio de relato corto y poesÃ­a dotado con 300 euros cada uno; LucÃ­a Jalle MagaÃ±a tambiÃ©n se hizo acreedora de los segundos premios de ambas modalidades y recogerÃ¡ 150 euros por cada uno. El ganador del accÃ©sit de relato corto es JosÃ© AgustÃ­n Blanco Redondo, de Ciudad Real (100 ?) y la ganadora del de poesÃ­a es MarÃ­a Dolores Echaide Navarro, de Ablitas (100 ?).\r\n\r\n', '0000-00-00'),
(23, 7, ' Excluida una obra del plan de inversiones', '2011-08-17 13:21:10', 'La Junta de Gobierno Local del Ayuntamiento de Tudela se dio ayer por enterada de una resoluciÃ³n de AdministraciÃ³n Local por la que se declaran excluidas del Plan de Inversiones Locales del Gobierno foral para el periodo 2009-2011 las obras de renovaciÃ³n de redes de abastecimiento y saneamiento de las calles Capuchinos, Pablo Sarasate, Eza y Juan Antonio FernÃ¡ndez. \r\n\r\nSegÃºn fuentes municipales, el consistorio no presentÃ³ la documentaciÃ³n de esta obra porque no puede pedir un crÃ©dito para realizarla debido al decreto del Gobierno EspaÃ±ol que prohibe concertar prÃ©stamos a municipios cuya deuda supere el 75% de sus ingresos corrientes, como es el caso de la capital ribera.\r\n\r\nEn la sesiÃ³n, tambiÃ©n se decidiÃ³ abonar mÃ¡s de 22.000 euros por el coste de los socorristas de las piscinas municipales del mes de julio tras desconvocar Ã©stos y la plantilla de la piscina cubierta la huelga para este puente.\r\n\r\n\r\n', '2011-11-15'),
(31, 7, 'La plantilla de Igeriketa desconvoca la huelga en las piscinas de Tudela los 4 dÃ­as del puente', '2011-08-08 20:09:17', 'La plantilla de Igeriketa Lantzen, adjudicataria de la piscina cubierta municipal de Tudela, que tambiÃ©n incluye a los socorristas que trabajan en verano en las piscinas al aire libre de Ribotas y Elola, decidiÃ³ ayer desconvocar las jornadas de huelga previstas desde hoy hasta el dÃ­a 15 incluido -coincidiendo con el puente de agosto- en protesta por el mes y medio de salario que se les debe. \r\n\r\nHan adoptado esta medida tras el compromiso de la empresa, que estÃ¡ en concurso de acreedores, de abonarles la nÃ³mina de julio antes del prÃ³ximo viernes. En caso contrario, los paros que tienen convocados a partir del dÃ­a 20 se convertirÃ¡n en huelga indefinida.\r\n\r\nComo se recordarÃ¡, los trabajadores de la gestora -14 de la piscina cubierta y los 6 socorristas de los complejos de Ribotas y Elola, realizaron el lunes el primero de los 13 paros que convocaron para agosto. Esta huelga propiciÃ³ el cierre de la piscina cubierta, que cuenta con unos 2.100 abonados, y que tampoco pudieran baÃ±arse los usuarios de las dos piscinas municipales de verano al no haber socorristas. Tras la desconvocatoria ahora anunciada, las 3 instalaciones abrirÃ¡n con normalidad este puente y los abonados se podrÃ¡n baÃ±ar.\r\n\r\n', '2011-11-27'),
(30, 1, 'Columnas de mosquitos invaden la recta de Arguedas en los dÃ­as de verano de mÃ¡s calor', '2011-08-15 20:17:44', 'Los conductores que circulan por la recta de Arguedas al amanecer o atardecer de dÃ­as calurosos y de bochorno se encuentran este verano con grandes columnas de mosquitos que invaden esa zona de la NA-134 y chocan con la delantera de sus vehÃ­culos', '2011-11-24'),
(32, 8, 'Murchante arropa a su patrÃ³n por las calles', '2011-08-16 19:57:40', 'El aroma a albahaca impregÃ³ el paso de la imagen de San roque', '2011-11-30'),
(63, 1, 'Sendaviva organiza 4 fines de semana de Halloween', '2011-10-08 20:24:17', 'El parque Sendaviva de Arguedas ha preparado 4 fines de semana con motivo de la fiesta de Halloween. SerÃ¡ entre hoy y el 1 de noviembre, cuando el parque se transformarÃ¡ con grandes calabazas, telaraÃ±as, guirnaldas, etc. HabrÃ¡ personajes caracterizados y de 12.30 a 19 horas se recrearÃ¡ la "Senda del terror" en el safari fotogrÃ¡fico con "personajes de la noche y sonidos de ultratumba", segÃºn destacan desde el parque.\r\n', '2011-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasena` varchar(41) NOT NULL,
  `admin` int(11) NOT NULL,
  `tipo` enum('ad','as','am') NOT NULL DEFAULT 'am',
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `falta` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `contrasena`, `admin`, `tipo`, `username`, `falta`) VALUES
(17, 'pepe', 'pepe', ' jarauta.aoa@gmail.com  ', '*ACC7E8ACDA673B127E2E111BAA859F55AFE2D675', 1, 'ad', 'pepe', '2011-07-30'),
(16, 'luis', 'luis', 'luis ', '*B883E0E9D11E9ED46113C5664741C32D6BD12010', 0, 'as', 'luis', '2011-07-29'),
(33, 'blanca', 'nieves', 'blancanieves@hotmmail.com', '*B14A1CC00E80F55C4C85369BB14756449E992256', 0, 'am', 'blanca', '2011-10-08'),
(24, 'martin ', 'martin ', 'martin@gmail.com', '*92532561D9FF706E3F60EFAF031DE88C9050D051', 0, 'am', 'martin', '2011-10-06'),
(34, 'jarajara', 'raja', 'jara@ggg.com', '*A33C767609B443F81FB99EA931AE8AB3F9504C3C', 0, 'am', 'jarajara', '2011-10-08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
