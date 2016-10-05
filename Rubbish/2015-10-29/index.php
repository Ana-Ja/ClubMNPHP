<?php
  session_start();
//header('Content-Type: text/html; charset=UTF-8');
  include './includes/funciones.php';
  include './bloques/cabecera.php';
  estaLogeado();
  require_once("./clases/postClass.php");
  $thisPost = new Post_Block;
?>
        <div class="timeline row" data-toggle="gridalicious">
            <div class="timeline-block">
                <div class="panel panel-default share">
                    <div class="panel-heading panel-heading-gray title">
                        ¿En qué estás pensando?
                    </div>
                    <form id="form_publicar"  method="POST">
                        <div class="panel-body">
                            <input type="text" name="titulo" class = "form-control" placeholder= "Titulo de la publicación">
                             <textarea name="texto" class="form-control share-text" rows="3" placeholder="Share your status..."></textarea>
                            <select name="visibilidad" >
                             <option value="0">Público</option>
                             <option value="1">Mis contactos</option>
                             <option value="2">Solo yo</option>
                            </select> 
                             <?php $thisPost->startPost(); ?>
                        </div>
                        <div class="panel-footer share-buttons">
                            <a href="#">
                                <i class="fa fa-map-marker"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-photo"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-video-camera"></i>
                            </a>
                            <button name = "postPublicacion" type="submit" class="btn btn-primary btn-xs pull-right " >Enviar</button>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_POST["postPublicacion"])) {
                        guardarPublicacion();
                    }

                ?>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default relative">
                    <img src="images/place2-full.jpg" alt="place" class="img-responsive">
                    <div class="panel-body panel-boxed text-center">
                        <div class="rating">
                            <span class="star"></span>
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" />
                        <img src="images/people/50/woman-2.jpg" alt="people" class="img-circle" />
                        <img src="images/people/50/guy-3.jpg" alt="people" class="img-circle" />
                        <img src="images/people/50/woman-3.jpg" alt="people" class="img-circle" />
                        <a href="#" class="user-count-circle">12+</a>
                    </div>
                </div>
            </div>
            <?php
                //obtenerPublicaciones();
                include_once './clases/publicacion.php';
                $publicaciones = Publicacion::obtenerPublicaciones(); 
                //var_dump($publicaciones);
                Publicacion::dibujar_publicaciones($publicaciones); 

            ?>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/woman-5.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href="">Mary</a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>Late Night Show Photos</p>
                        <div class="timeline-added-images">
                            <img src="images/social/100/1.jpg" width="80">
                            <img src="images/social/100/2.jpg" width="80">
                            <img src="images/social/100/3.jpg" width="80">
                        </div>
                    </div>
                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                    <ul class="comments">
                        <li>
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="images/people/50/guy-5.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="" class="comment-author"><?php  echo $_SESSION['nombre'];  ?></a>
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
                                    <span>Gracias <?php echo $_SESSION['nombre'];  ?></span>
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
                                    <a href="" class="comment-author"><?php  echo $_SESSION['nombre']; ?></a>
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
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/guy-5.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href=""><?php  echo $_SESSION['nombre']; ?></a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <img src="images/place1-full.jpg" class="img-responsive">
                    <ul class="comments">
                        <li>
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="images/people/50/woman-5.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="" class="comment-author">Mary</a>
                                    <span>Wow</span>
                                    <div class="comment-date">2 days</div>
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
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/woman-5.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href="">Mary</a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body text-muted">
                        <i class="fa fa-map-marker"></i> Was in <a href="#">Brooklyn, New York</a>
                    </div>
                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=370x300&scale=2&maptype=roadmap
&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318
&markers=color:red%7Clabel:C%7C40.718217,-73.998284" class="img-responsive">
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                        <li class="comment-form">
                            <div class="input-group">
                                <input type="text" class="form-control" />
                                <span class="input-group-addon">
                   <a href=""><i class="fa fa-photo"></i></a>
                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/guy-5.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href=""><?php  echo $_SESSION['nombre']; ?></a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        Amazing 3D Animation
                    </div>
                    <div class="videoWrapper">
                        <iframe src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="271" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                        <li class="comment-form">
                            <div class="input-group">
                                <input type="text" class="form-control" />
                                <span class="input-group-addon">
                   <a href=""><i class="fa fa-photo"></i></a>
                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/woman-4.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href="">Michelle</a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="weather-svg">
                        <div class="list">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <div>Today</div>
                                    <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                        <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                                            <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z" />
                                                </g>
                                                <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                                    <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                                                </g>
                                            </g>
                                            <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z" />
                                            </g>
                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                            </g>
                                        </g>
                                    </svg>

                                    <!-- cloudDrizzleSunFill -->
                                    </div>
                                <div class="col-xs-4 text-center">
                                    <div>Tomorrow</div>
                                    <svg version="1.1" id="sun" class="climacon climacon_sun" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                        <clipPath id="svgs/sunFillClip">
                                            <path d="M0,0v100h100V0H0z M50.001,57.999c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C57.999,54.417,54.418,57.999,50.001,57.999z" />
                                        </clipPath>
                                        <g class="climacon_iconWrap climacon_iconWrap-sun">
                                            <g class="climacon_componentWrap climacon_componentWrap-sun">
                                                <g class="climacon_componentWrap climacon_componentWrap-sunSpoke">
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-east" d="M72.03,51.999h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S73.136,51.999,72.03,51.999z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northEast" d="M64.175,38.688c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L64.175,38.688z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M50.034,34.002c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C52.034,33.106,51.136,34.002,50.034,34.002z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northWest" d="M35.893,38.688l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C37.94,39.469,36.674,39.469,35.893,38.688z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-west" d="M34.034,50c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C33.14,48,34.034,48.896,34.034,50z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southWest" d="M35.893,61.312c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L35.893,61.312z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-south" d="M50.034,65.998c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C48.034,66.893,48.929,65.998,50.034,65.998z" />
                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southEast" d="M64.175,61.312l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C62.126,60.531,63.392,60.531,64.175,61.312z" />
                                                </g>
                                                <g class="climacon_componentWrap climacon_componentWrap_sunBody" clip-path="url(#sunFillClip)">
                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="50.034" cy="50" r="11.999" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                    <!-- sun -->
                                    </div>
                                <div class="col-xs-4 text-center">
                                    <div>Saturday</div>
                                    <svg version="1.1" id="cloudRainFill" class="climacon climacon_cloudRainFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                        <g class="climacon_iconWrap climacon_iconWrap-cloudRainFill">
                                            <g class="climacon_componentWrap climacon_componentWrap-rain">
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z" />
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z" />
                                            </g>
                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                            </g>
                                        </g>
                                    </svg>

                                    <!-- cloudRainFill -->
                                    </div>
                            </div>
                        </div>
                        <div class="today text-center">
                            <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                                    <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                        <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z" />
                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z" />
                                        </g>
                                        <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                            <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                            <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                                        </g>
                                    </g>
                                    <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z" />
                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z" />
                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z" />
                                    </g>
                                    <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                        <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                    </g>
                                </g>
                            </svg>

                            <!-- cloudDrizzleSunFill -->
                            <div class="clearfix"></div>
                            <div class="details">Today:
                                <strong>10&deg; C</strong>
                            </div>
                        </div>
                    </div>
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                        <li class="comment-form">
                            <div class="input-group">
                                <input type="text" class="form-control" />
                                <span class="input-group-addon">
                   <a href=""><i class="fa fa-photo"></i></a>
                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default profile">
                    <div class="cover-container">
                        <img src="images/place1-full.jpg" alt="place" class="img-responsive" />
                    </div>
                    <div class="info">
                        <h4>Adrian Demian</h4>
                        <p>User Interface Designer</p>
                    </div>
                    <img src="images/people/110/guy-6.jpg" alt="people" class="img-circle avatar" />
                    <div class="profile-icons">
                        <span><i class="fa fa-users"></i> 372</span> <span><i class="fa fa-photo"></i> 43</span> <span><i class="fa fa-video-camera"></i> 3 </span>
                    </div>
                    <a href="#" class="btn btn-brand-primary pull-right"><i class="fa fa-comment"></i></a>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default event">
                    <div class="panel-heading title">
                        Cocktail Party
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-globe"></i> Miami, FL</li>
                        <li class="list-group-item"><i class="fa fa-calendar-o"></i> 31st Oct 2014</li>
                        <li class="list-group-item"><i class="fa fa-clock-o"></i> 5:50 PM</li>
                        <li class="list-group-item"><i class="fa fa-users"></i> 9 Attendees <a href="#" class="btn btn-primary btn-xs pull-right">Attend</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled attendees">
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-6.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/woman-3.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-2.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-9.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/woman-9.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-4.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-1.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/woman-4.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/people/110/guy-6.jpg" alt="people" class="img-responsive" />
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default profile-card">
                    <div class="panel-body">
                        <div class="profile-card-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <h4 class="text-center">Graduation Badge</h4>
                        <ul class="profile-card-items">
                            <li><i class="fa fa-map-marker"></i> Amsterdam, Europe</li>
                            <li><i class="fa fa-trophy"></i> 1st in Class</li>
                            <li><i class="fa fa-calendar"></i> 31st Oct 2014</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/guy-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href="">Jonathan</a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis perspiciatis praesentium quaerat repudiandae soluta? Cum doloribus esse et eum facilis impedit officiis omnis optio, placeat, quia quo reprehenderit sunt velit? Asperiores cumque deserunt eveniet hic reprehenderit sit, ut voluptatum?</p>
                    </div>
                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                    <ul class="comments">
                        <li>
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="images/people/50/woman-5.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="" class="comment-author">Mary</a>
                                    <span>Gracias <?php  echo $_SESSION['nombre']; ?></span>
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
                                    <a href="" class="comment-author"><?php  echo $_SESSION['nombre']; ?></a>
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
                </div>
            </div>
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img src="images/people/50/guy-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                <a href="">Jonathan</a>
                                <span>on 15th January, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="boxed">
                            <a href="#" class="h4 margin-none">Vegetarian Pizza</a>
                            <div class="rating text-left">
                                <span class="star"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                            </div>
                            <div class="media">
                                <a href="#" class="media-object pull-left">
                                    <img src="images/food1.jpg" alt="" width="80" />
                                </a>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                                </div>
                            </div>
                            <ul class="icon-list">
                                <li><i class="fa fa-star fa-fw"></i> 4.8</li>
                                <li><i class="fa fa-clock-o fa-fw"></i> 20 min</li>
                                <li><i class="fa fa-graduation-cap fa-fw"></i> Beginner</li>
                            </ul>
                        </div>
                    </div>
                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                    <ul class="comments">
                        <li>
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img src="images/people/50/guy-5.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="" class="comment-author"><?php  echo $_SESSION['nombre']; ?></a>
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
                                    <span>Gracias <?php  echo $_SESSION['nombre']; ?></span>
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
                                    <a href="" class="comment-author"><?php  echo $_SESSION['nombre']; ?></a>
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
                </div>
            </div>
        </div>
    </div>
    <?php
    //header('Content-Type: text/html; charset=UTF-8');
      include './bloques/pie.php';
    ?>  