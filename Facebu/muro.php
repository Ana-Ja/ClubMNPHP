<?php
    session_start();
	include './includes/conexion.php';
	include './includes/funciones.php';
	estaLogeado();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Muro</title>
</head>
<body>
	Muro
	<header>
       <h1>Mi Muro</h1>
       <p>Mi sitio web creado en html5</p>
    </header>
    <section>
       <article>
           <h2>Publicaciones<h2>
           <?php
           $conexion = conectar();
           	$publicaciones = "Select * from publicaciones where idusuario = '".$_SESSION["id"]."'";
				echo $publicaciones;
				$resultado = $conexion->query($publicaciones);
				if ($resultado->num_rows>1){
					 $resultado->fetch_assoc();
					 ?>
					 <section><h2>
					 <?php
					 
					echo $fila["tiulo"]."</h2>";
					?>
					</section>
					<?php
				}


           ?>
           <p> Contenido (ademas de imagenes, citas, videos etc.) </p>
       </article>
    </section>
    <aside>
       <h3>Titulo de contenido</h3>
           <p>contenido</p>
    </aside>
    <footer>
        Creado por mi el 2011
    </footer>


</body>
</html>