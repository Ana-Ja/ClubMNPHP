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