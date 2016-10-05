<?php
    include "header.php";
    include "left_menu.php";
    include "top_nav.php";
    include "./includes/funciones.php";
    include_once './includes/producto.class.php';
    if (isset($_POST["borrar"])) {
        echo "DDDD";
        //recorro todos los id marcados
        foreach ($_POST['producto'] as $id) {
            $producto = Producto::deleteProductoById($id);
        }
    }
?>  


<script type="text/javascript">
    
    $(document).ready(function() {
        //document.getElementById("allChecks").addEventListener("change", function(){toggleChecks(this)});
        $("allChecks").change(toggleChecks(this));
        listaProductos();
    });

    function toggleChecks(element){

        if (element.checked){
            $("#tabla-productos-body input[type=checkbox]").prop('checked',true);
        }else{
            $("#tabla-productos-body input[type=checkbox]").prop('checked',false);
        }
    }
         function listaProductos() {
            var num_pagina = $("#num_pagina").val();
            var num_ele = $("#num_ele").val();
            var params = {
                "funcion": "listaProductos",
                "num_pagina": 1,
                "num_ele": 2
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
                  
                    console.log(data);
                    //alert(JSON.stringify(data)); //convierte el JSON a string que es lo que necesita el alert
                    //var array = JSON.parse(data);
                    for (var i in data) {
                        texto=  texto + "<tr><td><input type='checkbox' name='producto[]' value='"+ data[i]['id'] + "'></td>" +
                            '<th scope="row"><a href="./nuevoProducto.php?action=edit&id='+data[i]['id']+'">'+data[i]['nombre']+'</th>'+
                             "<td>"+data[i]['precio'] +"</td>"+
                             "<td>"+data[i]['idCategoria']['nombre'] +"</td><tr>";
                             console.log(data[i]['idCategoria']['nombre']);
                    }

                    $('#tabla-productos-body').html(texto);
                },
                error:function(jqxhr, textStatus, errorMessage){
                    alert(textStatus+ "" +errorMessage);
                }
            });
         }
    </script>
<div class="right_col" role="main">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hover rows <small>Try hovering over the rows</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div id="num_pagina">1</div>
            <div id="num_ele">2</div>
            <div class="x_content">
                <form  method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><input  type="checkbox" id="allChecks" name="producto"></th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos-body">
                        </tbody>
                    </table>
                
                    <button type="submit" class="btn btn-success" name = "borrar">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>    