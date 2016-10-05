<?php
    include "header.php";
    include "left_menu.php";
    include "top_nav.php";
    include "./includes/funciones.php";
    require_once("./includes/postClass.php");
    $thisPost = new Post_Block;
?>
<script type="text/javascript">
    
    $(document).ready(function() {
        ObtenerCategorias();
       
    });

         function ObtenerCategorias() {
            var params = {
                "funcion": "obtenerCategorias"
            };
            $.ajax({
                url: './includes/webServices.php',//direccion donde esta el web service
                type: 'POST', //metpdp que se va a utilizar para el envio de datos
                //data:'base='+base+'&altura='+altura , //variables que quiero pasar al webservice
                //data: 'comunidad='+comunidad , //variables que quiero pasar al webservice
                data: params,
                //beforeSend: function() {
                //  $("esperar".html("Procesando, espere por favor"));
                //},
                dataType: 'json', //formato de los datos que va a devolver el websrvice
                success:function(data, textStatus,jqxhr){
                    //data:datos que devuelve
                    //jqxhr: informacion de la peticion
                    //textStatus:informacion del estado
                    var texto="";
                    texto= texto +  "<option value='0'>Selecciona...</option>";
                    console.log(data);
                    //alert(JSON.stringify(data)); //convierte el JSON a string que es lo que necesita el alert
                    //var array = JSON.parse(data);
                    for (var i in data) {
                        texto= texto + "<option value='" + data[i].id +"' >" +data[i]['nombre'] +"</option>";
                    }
                    $('#categoria').html(texto);
                },
                error:function(jqxhr, textStatus, errorMessage){
                    alert(textStatus+ "" +errorMessage);
                }
            });
         }
    </script>

            <!-- page content -->
            <div class="right_col" role="main">
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre" name = "nombre" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="descripcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="precio" class="form-control col-md-7 col-xs-12" type="text" name="precio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12" for="categoria">Categoria:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="categoria"  name="categoria" class="form-control col-md-7 col-xs-12" required>
                                
                            </select>
                        </div>
                    </div>        
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-success" name = "submit">Submit</button>
                            <?php $thisPost->startPost(); ?>
                        </div>
                    </div>

                </form>
                <?php
                    //}
                    
                    if (isset($_POST["submit"])) {
                       $producto =grabarProducto() ;
                    }
                ?>
            </div>

                
                <!-- /footer content -->
            </div>
            <!-- /page content -->

<?php
    include "footer.php";
?>