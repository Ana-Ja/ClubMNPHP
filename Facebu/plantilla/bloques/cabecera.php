<?php
  estaLogeado();
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Social Network Template</title>

    <!-- App Styling Bundle -->
    <link href="css/default.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
    // include_once './includes/kint/kint.class.php';
    // d($_COOKIE);
?>
    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a data-toggle="sidebar-chat" class="btn btn-link navbar-btn visible-xs"><i class="fa fa-comments"></i></a>
                <a class="navbar-brand" href="index.php">Social</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Themes</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Public User Pages</li>
                            <li><a href="user-public-timeline.html">Timeline</a>
                            </li>
                            <li><a href="user-public-profile.html">About</a>
                            </li>
                            <li><a href="user-public-users.php">Friends</a>
                            </li>
                            <li class="dropdown-header">Private User Pages</li>
                            <li><a href="user-private-messages.html">Messages</a>
                            </li>
                            <li><a href="user-private-profile.html">Profile</a>
                            </li>
                            <li class="active"><a href="index.php">Timeline</a>
                            </li>
                            <li><a href="user-private-users.html">Friends</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="buttons.html" class="dropdown-toggle" data-toggle="dropdown">UI Components <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="buttons.html"><i class="fa fa-th"></i> Buttons</a>
                            </li>
                            <li>
                                <a href="icons.html"><i class="fa fa-paint-brush"></i> Icons</a>
                            </li>
                            <li>
                                <a href="progress.html"><i class="fa fa-tasks"></i> Progress</a>
                            </li>
                            <li>
                                <a href="grid.html"><i class="fa fa-columns"></i> Grid</a>
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-sliders"></i> Forms</a>
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-table"></i> Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li data-toggle="tooltip" data-placement="bottom" title="A few Color Examples. Download includes CSS Files for all color examples & the tools to Generate any Color combination. This Color-Switcher is for previewing purposes only.">
                        <ul class="skins">
                            <li><span data-skin="default" style="background: #16ae9f "></span>
                            </li>
                            <li><span data-skin="orange" style="background: #e74c3c "></span>
                            </li>
                            <li><span data-skin="blue" style="background: #4687ce "></span>
                            </li>
                            <li><span data-skin="purple" style="background: #af86b9 "></span>
                            </li>
                            <li><span data-skin="brown" style="background: #c3a961 "></span>
                            </li>
                            <li><span data-skin="default-nav-inverse" style="background: #242424 "></span>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs">
                        <a href="./registro.php" data-toggle="sidebar-chat">Registrarse
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>

                    <!-- User -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                            <img src="images/people/110/<?php echo $_SESSION['foto'];?>" alt='<?php
                              echo $_SESSION['nombre'];
                            ?>' class="img-circle" width="40" />
                            <?php
                              echo $_SESSION['nombre'];
                            ?>
                             <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="user-private-profile.html">Profile</a>
                            </li>
                            <li><a href="user-private-messages.html">Messages</a>
                            </li>
                            <li><a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            </div>
    </div>
    


    