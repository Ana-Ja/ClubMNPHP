  <!-- estos div pertenecen al fin del cuerpo del mensaje. Sus principios estan dentros de cabecera.php-->
 </div>    <!--//fin id="yui-main"-->
 </div>    <!--fin id="contenido"-->
<div class="yui-b" id="barralateral">
      <div id="menu_horizontal_derecha"><?php
							
				//if (!estas_autenticado()) {
                if (!checkLogin()) {
					
					?>
                    <div class="cajalogin">
                   <img class="login" src="<?php echo $raiz; ?>imagenes/usuarioacceso.jpg" width="35" height="35" alt="dibujo usuario" />
                   
                   <a href="<?php echo $raiz; ?>registrarse/login.php">Login</a><br/><br/>
                   <a href="<?php echo $raiz; ?>registrarse/register.php">Registrarse</a>
                  </div>
                <?php
				} else {?>
				<a href="<?php echo $raiz; ?>registrarse/desconectarse.php">Salir</a>
				<?php }?>
				</div><br/>
       <?php
	   
       //muestro el usuario, si estás autenticado
	  
       muestra_cajausuario(); 
	   ?>
      <!-- bloque secundario --> 
      <br/>
      <br/>
       <h3>Enlaces de Inter&eacute;s:</h3>
				
			<ul class="enlaces">
                <li><a href="http://www.tudela.es/cas/index.asp" title="Ayuntamiento de Tudela">Ayuntamiento de Tudela</a></li>
				<li><a href="#" title="Cámara de Comercio">C&aacute;mara de Comercio</a></li>
			    <li><a href="http://www.diariodenavarra.es" title="Diario de Navarra">Diario de Navarra</a></li>
                <li><a href="#" title="Gobierno de Navarra">Gobierno de Navarra</a></li>
			</ul>
            <br />
            <br />

		
                
               
                <p class="centrar" ><a href="http://validator.w3.org/check?uri=referer"><img
                    src="http://www.w3.org/Icons/valid-xhtml10"
                    alt="Valid XHTML 1.0 Transitional" height="31" width="88" 
                     title="¡XHTML 1.0 Transitional V&aacute;lido!" />     </a>  </p>      
                <br />
                

               
                     

    </div>
    
  </div>    <!--fin de id="bd"-->