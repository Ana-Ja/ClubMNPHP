
<div class="timeline-block">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="media">
            <!--imagen -->
                <a href="" class="pull-left">
                    <img src="images/people/110/<?php echo $usuario['foto']; ?>" class="media-object">
                </a>
                <div class="media-body">
                    <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                    <a href=""><?php echo $usuario['nombre'] ?></a>
                    <span><?php echo cambiaf_a_normal($fila['fechaPublicacion'] ); ?></span>
                </div>
            <!--fin ocmentarios -->    
            </div>
        </div>
        <div class="panel-body">
           <!--descripcion de la publicacion -->
            <p><?php echo $fila['texto'] ?></p>
            <div class="timeline-added-images">
                <img src="images/social/100/1.jpg" width="80">
                <img src="images/social/100/2.jpg" width="80">
                <img src="images/social/100/3.jpg" width="80">
            </div>
            <!--fin descripcion de la publicacion -->
        </div>
        <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
        <!--comentarios -->
        <ul class="comments">
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
        </ul>
        <!--fin comentarios -->
    </div>
</div>