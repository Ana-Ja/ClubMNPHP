<?php
    include 'header.php';
    include 'left-menu.php';
    include 'top-nav.php';
?>

    

    <?php
        //miro si estoy en modo edición
        include '../clases/Producto.php';
        $producto = new Producto();
        if (isset($_GET['action']) && $_GET['action']=="edit"){
            $producto = Producto::getProductoById($_GET['id']);
        }
        //proceso la creación de un nuevo producto
        if (isset($_POST['guardar'])){
            include '../clases/Producto.php';
            $producto = new Producto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
            $producto->guardar();
        }

    ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="4363" value="<?php echo $producto->nombre; ?>"><ul class="parsley-errors-list" id="parsley-id-4363"></ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="descripcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="8850" value="<?php echo $producto->descripcion; ?>"><ul class="parsley-errors-list" id="parsley-id-8850"></ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="precio" class="form-control col-md-7 col-xs-12" type="text" name="precio" data-parsley-id="2357"  value="<?php echo $producto->precio; ?>"><ul class="parsley-errors-list" id="parsley-id-2357"></ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoría</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="categorias" name="categoria">
                                <?php
                                    include '../clases/categoria.class.php';
                                    $categorias = categoria::getCategorias();
                                    foreach ($categorias as $categoria) {
                                        $selected = "";
                                        if ($categoria->id==$producto->categoria){
                                            $selected = " selected ";
                                        }
                                        echo "<option ".$selected." value='".$categoria->id."'>".$categoria->nombre."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-success" name="guardar">Submit</button>
                        </div>
                    </div>

                </form>


                
            </div>
            <!-- /page content -->

<?php
    include 'footer.php';
?>