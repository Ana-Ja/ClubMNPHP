        <ul class="comments">
            <li>
                <div class="media">
                    <a href="" class="pull-left">
                        <img src="images/people/50/<?php echo $usuario["foto"]; ?>" class="media-object">
                    </a>
                    <div class="media-body">
                        <a href="" class="comment-author"><?php echo $usuario["nombre"] ;?></a>
                        <span><?php echo $fila["texto"] ;?></span>
                        <div class="comment-date"><?php echo cambiaf_a_normal($fila["fcomentario"]); ?></div>
                    </div>
                </div>
            </li>
<!--             <li>
                <div class="media">
                    <a href="" class="pull-left">
                        <img src="images/people/50/woman-5.jpg" class="media-object">
                    </a>
                    <div class="media-body">
                        <a href="" class="comment-author"></a>
                        <span></span>
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
            </li> -->
            <li class="comment-form">
                <div class="input-group">
                    <input type="text" class="form-control" />
                    <span class="input-group-addon">
                       <a href=""><i class="fa fa-photo"></i></a>
                    </span>
                </div>
            </li>
        </ul>