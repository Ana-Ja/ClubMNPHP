            <?php
                include dirname(__DIR__).'/admin/header.php';
                include dirname(__DIR__).'/admin/left-menu.php';
                include dirname(__DIR__).'/admin/top-nav.php';

                if (isset($_POST['borrar'])){
                    //recorro todos los ids marcados
                    include_once dirname(__DIR__).'/clases/Producto.php';
                    foreach ($_POST['producto'] as $id) {
                        $producto = Producto::deleteProductoById($id);
                    }

                }

            ?>
            <script>
            $(document).ready(cargarProductos());

            function cargarProductos(){
                var parametros = {
                    "funcion":"obtenerProductos",
                    "pagina":1,
                    "productosPorPagina":25
                }

                $.ajax({
                    url: './webservice.php', //dirección donde se encuentra el webservice
                    type: 'POST', //método que se va a utilizar para el envío de los datos
                    data: parametros, //variables que quiero pasar al webservice
                    dataType: 'json', //formato de los datos que va a devolver el webservice
                    success: function(data, textStatus, jqxhr){
                        //alert (JSON.stringify(data));
                        //alert (data.length);
                        //data es un array con las provincias
                        var tablaProductos = "";
                        for (var i=0;i<data.length;i++){
                            //alert (data[i]['id']+"-"+ data[i]['provincia']);
                            tablaProductos = tablaProductos+ '<tr>'+
                                '<td><input type="checkbox" name="producto[]" value="'+data[i]['id']+'"></td>'+
                                '<td><a href="./nuevoProducto.php?action=edit&id='+data[i]['id']+'">'+data[i]['nombreProducto']+'</td>'+
                                '<td>'+data[i]['precio']+'</td>'+
                                '<td>'+data[i]['nombreCategoria']+'</td>'+
                              '</tr>';
                        }
                        //alert (selectCategorias);
                        $("#tabla-productos-body").html(tablaProductos);
                    },
                    error: function (jqxhr, textStatus, errorMessage){
                        alert(textStatus+" "+errorMessage);
                    }
                });
            }

            function toggleChecks(element){
                if (element.checked){
                    $("#tabla-productos-body input[type=checkbox]").prop('checked',true);
                }else{
                    $("#tabla-productos-body input[type=checkbox]").prop('checked',false);
                }
            }
            </script>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <form method="POST">
                   <table class="table table-striped">
                    <thead>
                      <tr>
                        <th><input onchange="toggleChecks(this)" type="checkbox" id="allChecks" name="producto"></th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                      </tr>
                    </thead>
                    <tbody id="tabla-productos-body">
                      
                      
                    </tbody>
                  </table>         
                  <button type="submit" name="borrar" class="btn btn-success">Borrar</button>
                </form>
                </div>
            </div>
            
            

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>
</body>

</html>