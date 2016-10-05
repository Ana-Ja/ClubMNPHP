<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href='./css/bootstrap.css'>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<form id='login-form' action="" class="form-group col-xs-12 col-md-2 col-md-offset-4">
	<fieldset>
	<div class="panel panel-primary">
		<div class="panel panel-heading">
		  <h3 class="panel-title">Identifiquese</h3>
		</div>
		
		<div class="panel-body">
		  <label class="control-label" for="usuario">Usuario</label>
		  <input type="text" class="form-control" id="usuario">
		
		  <label class="control-label" for="password">Password</label>
		  <input type="text" class="form-control" id="password">
		  <br/>
		 <a href="#" class="btn btn-info has-success " onclick="document.getElementById('login-form').submit()">Aceptar</a>
		</div>
	</div>	
	</fieldset>		
</form>
	
</body>
</html>