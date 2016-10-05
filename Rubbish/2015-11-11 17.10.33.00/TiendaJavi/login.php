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
		        <li><a href="#">Login</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>

	<div class="container">
		<form id="login-form" action="" method="GET" class="col-xs-12 col-md-4 col-md-offset-4">
			<fieldset>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							Iniciar Sesión
						</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
						  <label class="control-label" for="username">Usuario</label>
						  <input type="text" class="form-control" id="username">
					
						  <label class="control-label" for="password">Contraseña</label>
						  <input type="password" class="form-control" id="password">
						  <input type="submit" value="Submit" class="btn btn-info">
						  <button type="submit" class="btn btn-info">Boton</button>
						  <a href="#" class="btn btn-info" onclick="document.getElementById('login-form').submit();">Entrar</a>
						</div>
					</div>
					
				</div>
			</fieldset>
			

		</form>
	</div>
</body>
</html>