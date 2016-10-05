<?php
  session_start();
//header('Content-Type: text/html; charset=UTF-8');
  include './includes/funciones.php';
  include './bloques/cabecera.php';
  include './bloques/cabecera1.php';
  estaLogeado();
  
?>
<div class="panel panel-default text-center">
    <form id="login-form" action="" method="POST">
    <div class="panel-body">
    	<h6>Introduzca un correo para enviar la invitacion<h6/>
    	<div>
    		<input class="form-control" type="text" name="mail" placeholder= "Introduzca  mail " />
    	</div>	
    	<div>		
    		<input type="submit" value="Enviar" name="Registrar"  class="btn btn-primary"/>
    	</div>	
    </div>		
    	</form>
    	<?php
    		//}
    		
    		if (isset($_POST["Registrar"])) {
    			enviarInvitacion();
    			
    		
    		}
    	?>
</div>


<?php
    //header('Content-Type: text/html; charset=UTF-8');
      include './bloques/pie.php';
?>  