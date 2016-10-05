<?php
  session_start();
  include './includes/funciones.php';
  include './bloques/cabecera.php';
  estaLogeado();
?>
    <div class="sidebar right">
        <div class="chat-search">
            <input type="text" class="form-control" placeholder="Search" />
        </div>
        <ul class="chat-filter nav nav-pills ">
            <li class="active"><a href="#" data-target="li">All</a>
            </li>
            <li><a href="#" data-target=".online">Online</a>
            </li>
            <li><a href="#" data-target=".offline">Offline</a>
            </li>
        </ul>
        <ul class="chat-contacts">
            <li class="online" data-user-id="1">
                <a href="#">
                    <div class="media">
                        <div class="pull-left">
                            <span class="status"></span>
                            <img src="images/people/110/guy-6.jpg" width="40" class="img-circle" />
                        </div>
                        <div class="media-body">
                            <div class="contact-name">Jonathan S.</div>
                            <small>"Free Today"</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="online away" data-user-id="2">
                <a href="#">
                    <div class="media">
                        <div class="pull-left">
                            <span class="status"></span>
                            <img src="images/people/110/woman-5.jpg" width="40" class="img-circle" />
                        </div>
                        <div class="media-body">
                            <div class="contact-name">Mary A.</div>
                            <small>"Feeling Groovy"</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="online" data-user-id="3">
                <a href="#">
                    <div class="media">
                        <div class="pull-left">
                            <span class="status"></span>
                            <img src="images/people/110/guy-3.jpg" width="40" class="img-circle" />
                        </div>
                        <div class="media-body">
                            <div class="contact-name">Adrian D.</div>
                            <small>Busy</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="offline" data-user-id="4">
                <a href="#">
                    <div class="media">
                        <div class="pull-left">
                            <img src="images/people/110/woman-6.jpg" width="40" class="img-circle" />
                        </div>
                        <div class="media-body">
                            <div class="contact-name">Michelle S.</div>
                            <small>Offline</small>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <script id="chat-window-template" type="text/x-handlebars-template">
        <div class="panel panel-default">
            <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                <a href="#" class="close"><i class="fa fa-times"></i></a>
                <a href="#">
                    <img src="{{ user_image }}" width="40" class="pull-left">
                    <span class="contact-name">{{user}}</span>
                </a>
            </div>
            <div class="panel-body" id="chat-bill">
                <div class="media">
                    <div class="pull-left">
                        <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                    </div>
                    <div class="media-body">
                        <span class="message">Feeling Groovy?</span>
                    </div>
                </div>
                <div class="media right">
                    <div class="pull-right">
                        <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                    </div>
                    <div class="media-body">
                        <span class="message">Yep.</span>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                    </div>
                    <div class="media-body">
                        <span class="message">This chat window looks amazing.</span>
                    </div>
                </div>
                <div class="media right">
                    <div class="pull-right">
                        <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                    </div>
                    <div class="media-body">
                        <span class="message">Thanks!</span>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Type message..." />
        </div>
    </script>
    <div class="chat-window-container"></div>
    <div class="container">
        <div class="cover profile">
            <div class="wrapper">
                <div class="image">
                    <img src="images/profile-cover.jpg" alt="people" />
                </div>
                <ul class="friends">
                    <li>
                        <a href="#">
                            <img src="images/people/110/guy-6.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/woman-3.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/guy-2.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/guy-9.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/woman-9.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/guy-4.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/guy-1.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/people/110/woman-4.jpg" alt="people" class="img-responsive">
                        </a>
                    </li>
                    <li><a href="#" class="group"><i class="fa fa-group"></i></a>
                    </li>
                </ul>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <img src="images/people/110/guy-5.jpg" alt="people" />
                </div>
                <div class="name">
                    <a href="#">
                Bill Demian
            </a>
                </div>
                <ul class="cover-nav">
                    <li><a href="index.php"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a>
                    </li>
                    <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a>
                    </li>
                    <li class="active"><a href="user-public-users.php"><i class="fa fa-fw fa-users"></i> Friends</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="filter">
            <form class="form-inline">
                <label>Filter:</label>
                <select name="users-filter" id="users-filter-select" class="selectpicker" data-style="btn-primary">
                    <option value="all">All</option>
                    <option value="friends">Friends of Friends</option>
                    <option value="name">by Name</option>
                </select>
                <div id="users-filter-trigger">
                    <div class="select-friends hidden">
                        <select name="users-filter-friends" class="selectpicker" data-style="btn-primary" data-live-search="true">
                            <option value="0">Select Friend</option>
                            <option value="1">Mary D.</option>
                            <option value="2">Michelle S.</option>
                            <option value="3">Adrian Demian</option>
                        </select>
                    </div>
                    <div class="search-name hidden">
                        <input type="text" class="form-control" name="user-first" placeholder="First Last Name" id="name" />
                        <a href="#" class="btn btn-primary btn-sm hidden" id="user-search-name"><i class="fa fa-search"></i> Search</a>
                    </div>
                </div>
            </form>
        </div>

        /<!-- Empiezan los amigos/ -->
        <div class="timeline row" data-toggle="gridalicious">
        <?php
            $amigos = ObtenerAmigos($_SESSION['idLogeado']);
            foreach ($amigos as  $amigo) {
        ?>
            <div class="timeline-block">

               
                <div class="panel panel-default user-box">
                    <div class="panel-body">
                        <div class="media">
                         <img src="images/people/50/<?php echo $amigo->foto ?>" alt="people" class="media-object img-circle pull-left" />
                            <div class="media-body">
                                <a href="" class="username"><?php echo$amigo->nombre ?></a>
                                
                                <div class="profile-icons">
                                    <span><i class="fa fa-users"></i> 372</span> <span><i class="fa fa-photo"></i> 43</span> <span><i class="fa fa-video-camera"></i> 3 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body bordered">
                        <p class="common-friends">Common Friends</p>
                        
                        <div class="user-friend-list">
                            <?php
                                include_once './clases/contacto.class.php';
                                $amigosdeamigos = Contacto::getAmigosComunes($amigo->id, $amigos);
                                foreach ($amigosdeamigos as  $amigodeamigo) {
                            ?>
                                <a href="#">
                                    <img src="images/people/50/<?php echo $amigodeamigo->foto ?>" alt="people" class="img-circle" />
                                </a>
                            <!-- <a href="#">
                                <img src="images/people/50/guy-3
.jpg" alt="people" class="img-circle" />
                            </a>
                            <a href="#">
                                <img src="images/people/50/woman-2
.jpg" alt="people" class="img-circle" />
                            </a>
                            <a href="#">
                                <img src="images/people/50/woman-5
.jpg" alt="people" class="img-circle" />
                            </a> -->
                        <?php
                           }
                        ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="#" class="btn btn-default btn-sm">Follow <i class="fa fa-share"></i></a>
                    </div>

                </div>
                
            </div>
            <?php
                }
            ?>
            
        </div>
    </div>

     <?php
      include './bloques/pie.php';
    ?> 