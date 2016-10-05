<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/tienda/clases/Carrito.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
	<div class="navigation">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Mi tienda</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active">
		        	<a href="#">Sección 1 <span class="sr-only">(current)</span></a>
		        </li>
		        <li><a href="#">Sección 2</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sección3 <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
		      </form>
		      
		      <ul class="nav navbar-nav navbar-right">
		      	<li style="position: relative;top: 20px;color: white;">
		      		<span><?php Carrito::verTotal(); ?></span>
		      		<span class="glyphicon glyphicon-shopping-cart" style=""></span>
		      	</li>
		        <li><a href="#">Login</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>

	<div class="container">
		<?php
			include_once './clases/Producto.php';
			$productos = Producto::obtenerProductos();

			foreach ($productos as $producto) {
				//var_dump($producto);
				?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="thumbnail">
						<form action="anadirProducto.php">
							<input type="hidden" name="productoId" value="<?php echo $producto->id; ?>">
	                        <img src="http://placehold.it/320x150" alt="">
	                        <div class="caption">
	                            <h4 class="pull-right"><?php echo $producto->precio; ?></h4>
	                            <h4><a href="#"><?php echo $producto->nombre; ?></a>
	                            </h4>
	                            <p><?php echo $producto->descripcion; ?></p>
	                        </div>
	                        <div class="ratings">
	                            <p class="pull-right">15 reviews</p>
	                            <p>
	                                <span class="glyphicon glyphicon-star"></span>
	                                <span class="glyphicon glyphicon-star"></span>
	                                <span class="glyphicon glyphicon-star"></span>
	                                <span class="glyphicon glyphicon-star"></span>
	                                <span class="glyphicon glyphicon-star"></span>
	                            </p>
	                        </div>
	                        <div>
	                        	<button type="submit" class="btn btn-primary">Comprar</button>
	                        </div>
                        </form>
                    </div>
					
				</div>
				<?php
			}


		?>
		
	</div>
</body>
</html>