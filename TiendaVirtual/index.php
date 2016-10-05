<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href='./css/bootstrap.css'>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tienda</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Seccion 1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Sección 2</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menú <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Productos</a></li>
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
      <a href="#" class="btn btn-info btn-lg ">
          <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
          <?php
              include_once "./admin/includes/carrito.class.php";
              Carrito::verTotal();
          ?>    
      </a>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <?php
    include_once "./admin/includes/producto.class.php";
    $productos = Producto::obtenerProductos(1,2);

    foreach ($productos as $producto) {
  ?>
    
     <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
      <!-- <div style="height:200px;background-color:grey;border-radius:5px;margin-bottom:15px"> --> 
     <!-- <div class="col-sm-4 col-lg-4 col-md-4"> -->
       <div class="thumbnail">
         <form action="anadirProducto.php">
              <input type="hidden" name = "productoId" value =" <?php echo $producto->id;?>">
             <img src="http://placehold.it/320x150" alt="">
             <div class="caption">
                 <h4 class="pull-right"> <?php echo $producto->precio;?></h4>
                 <h4><a href="#"><?php echo $producto->nombre;?></a>
                 </h4>
                 <p><?php echo $producto->descripcion;?> </p>
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
              <button type="submit" class="btn btn-primary" nombre="comprar">Comprar</button>
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