    <form action="index.php" method="post">
        <div class="campoformulario">
            <span>Nombre:</span>
            <input type="text" name="nombre" size="20" value="<?php if (isset($_POST["nombre"] )) { echo $_POST["nombre"];}?>" />
        </div>
        <div class="campoformulario">
            <span>Apeliidos:</span>
            <input type="text" name="apellidos" size="20" value="<?php if (isset($_POST["apellidos"] )) { echo $_POST["apellidos"];}?>" />
        </div>
        <div class="campoformulario">
            <span>Email:</span>
            <input type="text" name="email" size="20" value="<?php if (isset($_POST["email"] )) { echo $_POST["email"];}?>"/>
        </div>
        <div class="campoformulario">
            <span>Contrase&ntilde;a:</span>
            <input type="password" name="contrasena" size="20"  value="<?php if (isset($_POST["contrasena"] )) { echo $_POST["contrasena"];}?>" />
        </div>
        <div class="campoformulario">
            <input type="submit" value="Enviar" id="Enviar" />
        </div>
        
    </form>