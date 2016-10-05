<?php
  
  require_once("./clases/postClass.php");
  $thisPost = new Post_Block;
?>
<div class="timeline-block">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="media">
            <!--imagen -->
                <a href="" class="pull-left">
                    <img src="images/people/110/<?php echo $publicacion->autor->foto ; ?>" class="media-object">
                </a>
                <div class="media-body">
                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                    <a href=""><?php echo $publicacion->autor->nombre  ?></a>
                    <span><?php echo cambiaf_a_normal($publicacion->fecha ); ?></span>
                </div>
            <!--fin imagen -->    
            </div>
        </div>
        <div class="panel-body">
           <!--descripcion de la publicacion -->
            <p><?php echo $publicacion->texto ?></p>
            
            <!--fin descripcion de la publicacion -->
        </div>
        
        <?php

          //$num_comentarios=obtenerComentarios((isset($_GET["vertodos"])) ? $_GET["vertodos"] : 0);
           include_once './clases/comentarios.class.php';
           $obtener = Comentario::obtenerComentarios((isset($_GET["vertodos"])) ? $_GET["vertodos"] : 0, $publicacion->id); 
           $num_comentarios= $obtener[1];
           
           Comentario::dibujar_comentarios($obtener[0]); 
        ?>
        

        <div class="comment-form">
            <form id="form_publicar"  method="POST">
                <div class="input-group">
                    <input type="text" name="texto" class = "form-control" placeholder= "Texto comentario">
                     <input type="hidden" name= "idPublicacion" value = <?php echo $publicacion->id ; ?> >
                    <span class="input-group-addon">
                       <a href=""><i class="fa fa-photo"></i></a>
                    </span>
                    <?php $thisPost->startPost(); ?>
                    <button name = "comentar" type="submit" class="btn btn-primary btn-xs pull-right " >Cometar</button>
                </div>

            </form>
        </div>
        <?php
            if (isset($_POST["comentar"])) {
                guardarComentario();
            }

        ?>
        <div class="view-all-comments"><a href="./index.php?vertodos=1"><i class="fa fa-comments-o"></i> Ver todos</a> <?php echo $num_comentarios; ?></div>
        <!--comentarios -->
<!--         <ul class="comments">
            <li>
                <div class="media">
                    <a href="" class="pull-left">
                        <img src="images/people/50/guy-5.jpg" class="media-object">
                    </a>
                    <div class="media-body">
                        <a href="" class="comment-author">Bill D.</a>
                        <span>Hi Mary, Nice Party</span>
                        <div class="comment-date">21st September</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="media">
                    <a href="" class="pull-left">
                        <img src="images/people/50/woman-5.jpg" class="media-object">
                    </a>
                    <div class="media-body">
                        <a href="" class="comment-author">Mary</a>
                        <span>Thanks Bill</span>
                        <div class="comment-date">2 days</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="media">
                    <a href="" class="pull-left">
                        <img src="images/people/50/guy-5.jpg" class="media-object">
                    </a>
                    <div class="media-body">
                        <a href="" class="comment-author">Bill D.</a>
                     <span>What time did it finish?</span>
                        <div class="comment-date">14 min</div>
                    </div>
                </div>
            </li>
            <li class="comment-form">
                <div class="input-group">
                    <input type="text" class="form-control" />
                    <span class="input-group-addon">
                       <a href=""><i class="fa fa-photo"></i></a>
                    </span>
                </div>
            </li>
        </ul> -->
        <!--fin comentarios -->
    </div>
</div>