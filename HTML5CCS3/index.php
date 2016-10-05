<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title><?php echo 'Hola Mundo!'; ?></title>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" id="global-css" href="./estilos.css" type="text/css" media="all" />
	</head>
	<body>
		<header>
			<h1><?php echo 'Hola Mundo!'; ?></h1>
			<!-- <nav>El men&uacute; si procediese</nav> --> <!-- Etiqueta comentada al no tener men&uacute; -->
		</header>
		<section>
			<article>
				<h2><?php echo 'Nuestra primera p&aacute;gina PHP'; ?></h2>
				<?php echo 'Nuestra primera p&aacute;gina realizada en PHP con HTML5'; ?>
			</article>
		</section>
		<aside>
			<h3><?php echo 'Art&iacute;culos relacionados';?></h3>
			<ul>
				<li><a href="//rolandocaldas.com/php/primera-toma-de-contacto-php-paso-a-paso" target="_blank"><?php echo 'Primera toma de contacto'; ?></a></li>
				<li><a href="//rolandocaldas.com/php/html5-estructura-basica" target="_blank"><?php echo 'HTML5 estructura b&aacute;sica'; ?></a></li>
				<li><a href="//rolandocaldas.com/php/css3-basico-1-php-paso-a-paso" target="_blank"><?php echo 'CSS3 basico 1'; ?></a></li>
				<li><a href="//rolandocaldas.com/php/css3-basico-2-php-paso-a-paso" target="_blank"><?php echo 'CSS3 basico 2'; ?></a></li>
			</ul>
		</aside>
		<footer>
			<?php echo 'Creado por rolandocaldas.com'; ?>
		</footer>
	</body>
</html>