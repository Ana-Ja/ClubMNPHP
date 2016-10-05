<nav class="navbar navbar-subnav navbar-static-top" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-ellipsis-h"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="subnav">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw icon-ship-wheel"></i> My Timeline</a>
                    </li>
                    <li>
                        <a href="user-private-profile.html"><i class="fa fa-fw icon-user-1"></i> Edit Profile</a>
                    </li>
                    <li>
                        <a href="user-private-users.html"><i class="fa fa-fw fa-group"></i> Manage Friends</a>
                    </li>
                    <li>
                        <a href="user-private-messages.html"><i class="fa fa-fw icon-comment-fill-1"></i> Messages</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li><a href="logout.php">Logout  <i class="fa fa-fw icon-unlock-fill"></i></a>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            </div>
    </nav>
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
                    <img src="images/people/110/<?php echo $_SESSION['foto'];?>" alt='<?php
                              echo $_SESSION['nombre'];
                            ?>'  /> 
                </div>
                <div class="name">
                    <a href="#">
                <?php
                  echo $_SESSION['nombre'];
                ?>
            </a>
                </div>
                <ul class="cover-nav">
                    <li class="active"><a href="index.php"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a>
                    </li>
                    <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a>
                    </li>
                    <li><a href="user-public-users.php"><i class="fa fa-fw fa-users"></i> Friends</a>
                    </li>
                    <li><a href="invitacion.php"><i class="fa fa-fw fa-users"></i> Invitación</a>
                    </li>
                </ul>
            </div>
        </div>