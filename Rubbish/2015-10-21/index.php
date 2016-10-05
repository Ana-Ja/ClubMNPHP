<?php
  session_start();
//header('Content-Type: text/html; charset=UTF-8');
  include './includes/funciones.php';
  estaLogeado();
  require_once("./clases/postClass.php");
  $thisPost = new Post_Block;
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
                            <li><a href="user-public-users.html">Friends</a>
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
                        <a href="#" data-toggle="sidebar-chat">
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>

                    <!-- User -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                            <img src="images/<?php echo $_SESSION['foto'];?>" alt='<?php
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
                            <li><a href="login.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            </div>
    </div>
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
                    <img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABOAAD/4QMZaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAyMSA3OS4xNTU3NzIsIDIwMTQvMDEvMTMtMTk6NDQ6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkE0QzI2NDNGMzRFNjExRTQ5MjIyODE1QkJGOURDMjI0IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkE0QzI2NDNFMzRFNjExRTQ5MjIyODE1QkJGOURDMjI0IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzQgV2luZG93cyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJCQjhCOUIxMDgxREFBM0ZGNjNBMkVDQUUxQ0Y3MTFEMyIgc3RSZWY6ZG9jdW1lbnRJRD0iQkI4QjlCMTA4MURBQTNGRjYzQTJFQ0FFMUNGNzExRDMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAADAgICAgIDAgIDBAMCAwQFAwMDAwUFBAQFBAQFBwUGBgYGBQcHCAgJCAgHCwsMDAsLDAwMDAwODg4ODg4ODg4OAQMDAwUFBQoHBwoPDAoMDxIODg4OEhEODg4ODhERDg4ODg4OEQ4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg7/wAARCABuAG4DAREAAhEBAxEB/8QAnQAAAQQDAQEAAAAAAAAAAAAABwQFBggCAwkBAAEAAQUBAQAAAAAAAAAAAAAAAQACAwQFBgcQAAEDAgUCBAQEAgkFAAAAAAECAwQRBQAhEgYHMRNBUWEicZEUCIGxMiOhUsFCYoJDJBUWF/DhcpI0EQACAgIBAwMDAgUFAAAAAAAAAQIDEQQhMUESYRMFUSIycaGBkbHBFfFCIyQG/9oADAMBAAIRAxEAPwCwhQKJAA6D8sZ6NRIwLY/lHyH9OELB52gf6o+QwhYPewn+UU9AMATRreSyy2px7QloAlaiUgBIzOonIUpmcAAPrnvfbK0Srk9cG5VlhNPSpwjuatbiXyxHjJSkjrpJp/WNKmmJlW2MbIdafuAtCbh/o7drQwytfcZ77+lLLa01INUrVpBFT001OVBTEr1ngj9wkX/PvFAcaamXJUVTmlK3nY7yoyFrIqC+lJQqhNCUmlcRuif0D7iJjCulku8Fu5W2ZGkwHR+3IaWhbZr6ivhn50xC4tD0za7FSK1QB8B5io8PI4Q5MRORUfyj5YDY4RPRU0JCRX4DCEIXoyKkaR8hhZCJPpkhymkZ9chg5EFoIqlNPFIrhCM0s164WRZNiY9fh88DIMkU5H5AsfGlhVeruFvvuHsQbfGoX5Eg9EJJolIFCVKOSR5mgw+uDm/QbKeCqm++cOQd3zFRH5KLVEOarJbHqamwkkpUpdFLJFCSCPQY0I0xRWlNsG8K+bruN8cmTX3JEdDZdUhxxDjyjHBS0DpAQQQodT1xM0sDFkRbWuV4uN0beuQjsoL60uwpehDwSSEUKlEudwnPPpl/NgyWF3GReWI7nDv9tvj9sEp1y1treRB+pV3m1M6yQ2wDpTVKgaAkdMOi+BNYY47H5Fvtp3OzOdSWksaSiOkhxh4tEN0W26HEhQBqBRST0wyyCaDGTyXD2ZvhEm4xduS+ytuU0hdvlRfa2sLiGWkBGekFAOVciCOlMZc68FtMnbjHpiDJIhC+xnXCTHDe+zhwhF2v3aYAgptt+1PwGCBm9CCPDCAZOrZjsuSH1paYaSXHXV5JQhIqVk+AAwPHIs4Kbclb0c35u/8A1O6KKtuwHHha2mllLSGQvQ2s0SSa6SVZGurGjXDESGTTYJ75upp+Y7dVQGkJjHtxNQVUKyCCpSRkaKJqQM1dc8WYw4IG+RhTuSZYbw4bhKXFtMzQi4SoQGvturI0MtqWhIUlJBpWhGZOD45QyMnkfWblxi9IusV+KlN5+ldnW/cLC3mpZcdCkocW08rQe4mnVFUq+eBieQtxXAPLnLECyojtLVJDDK3HnlGoEh99LjaQR+pSAkk/j51xIkMfAzzrnqQ3cojhQ+VhC0GoUO4SspyNaeJocq4dgAQOLuT79YNxWp+bMcU7DkIXHqS6nQpQbUgUIrqbWQB6nEFtaaZLXN5OijK2JcVuVEWl2M6gONONkLQpKvEKH6vjjDeUy+uUJ3mcjgjUNshrT1w5Eq5ERaHeBwM8gwFBCBRP/iPywUN7m1KcEWCD86QrrO4m3LBssaTKucmH2GGIK0NPqK3EAnWvIJAqVf2cSUteayNmuCkd/mztvbgdsd2a/wBPvtnUmM5HU99W0hbaQlba3GKHPqCMievhjSXKyVG+xpiWe+8kuyLVt2za1uaUOzgpRSltsJIoPbnXOpqfliC7YhV+TLmvqTteIokw+x/le7wm1LQ2thxfcCNQCw4QAlxQOmtMumKP+dpT7l9/Bz7snUL7Dt0phRf9yy46H6BExcJtRU8gHUhFT+moABAxBP5+PZMlq+C4zKRLIH2lWGPGchXGEXY6kFtJeJonUKKIoOvr6Yoz+ZnnJoR+IpxhcgG5z+0dvZlrVedouOlMb3riuEqTQKqspNK9Mauh8wrZYkZG/wDEKEfKACrJKdtdxauEpITJgup+mWaBtLjawqoGZJy6f9DcayYHQ6IfbtNdn8S2NbrqX3AyoqcTQo1uOrcUgU6BvUE0GQpljF2lixmhU8xJ/IScV8kmBulIyw5CixBoHcwA9wmoTkn4D8sPQDalOCIaN4zJMDb0p+KlKnSntju0CKr9qQScgCaCpyHjlgxxkDOYG/79e7lyNcbrPhuOXO5T3mXmgdDZfADYTobFQaIFSMvbXGxXhQX0Rnz/AC9To/8Aanwradm8e2tUsJmXaSPrpkkp9pdf9xCKj9Kckj0GeOG+R2Hbe/omdxp1qmhJdcFn49uitRkoS0CkDIUHXBrhFLoUrLpeXURzIYfkUKB0GZFOnTDJQbZZqs8Y9SPX+xFtorKUhNCQOlevl8cVb6nFF7XuU+Cu/NTC1bclxke15SFJSugOnUnTq9aYOjZiaH7NacGcw92OyId8mWu5Rmo0pEhby0spUA5qyqAomgJzGePR6pKSTR51fBwm0zoZ9rMOa1wpt+bMSEolxULjpGWptJKe5T+0qo9QBjG2mnYy5QvsCjITisSjfJQFAjDkDoN/b/dp6fxwiQJKP0j4DEgxm5OEI1y4rM2K7FkJ1NOJKVCpBofIjx8vLCyA5tc9bfG3edLrGaZMNDFzRLbKlHvdiQkOpdaKz7gvOprjWql/xpsp2JefB0m4SkDa3GdjTuKYzH7MJlyQ+8tIT3HQXNIVlU0PQY4G7775OK7nc+KjUk/oTd77gOKLa4iBK3DAalqFEBx5KQoqyFCoiueNKFc1H8WYzri5fmhxa5FsNwiN3WC81IhLKkpcaUFglNBlQ0OK7ucXyi/Xppr8iuPN/wB8GyNovv2CylV63I2otuQ4SHVpbUDpopQSRUnKgOLdHx87uZPCIrNmFLxD7mVu3R9z3Ke52l/VbRisWh5BC2Zrgaf7aqgkAEKqAfKmLcfjdaP+/krx3tlr8OP1K98p2wXvcdqvzcdTDNzZ0qZJ1qbfYSCpOr4EH4Y19SfhBx+hmbVPuWxljhnQTgpb7nCeyjJSEvos7LCgkAABhSmkig9E4zbHmTHWR8ZNIl8hNU1wwjG94YIGIqfv1wsjuwRECoHwH5YlAzakYQjMVHxwGIrF92HED+7LirfVsbSZ1lsyXHUCv+YjR5Ci40ciCpAXrSag/qGYOIaN32r1XL8ZdP1NaPxsbtJ2Q/OEv2wn/Zkj38W5W37TedxM3S92wW+Azbdv2t0tpdedjoWXaJAyNdRUSaDoMZVGz4zcVhPL5f6mnLXVkVKWWsLj+BX7evHV9mXiVOc2VYttWxLIeiuyZq7jLkvHSAyEqcUpKszUlISCMas7koc2tv04RX1tRym0qcL6lyPtR42mM8azLZekpQFtCVBLWpIbC9WpPuHgQOnnkcYtkvem2n0L21/11HCxl4Kitfb1eHOTLjP3S5JmWNFyflOwYYUl16Ol00AcCklOquZGeNOG/FRS+hDL49tvnGf5jkj7Vpt1d+j2nBv0xtUr6yVd7092EMsJzDTbaAEAJAyyrX5Ynl8rxnCKi+HUePJt5Ity1x+LSGNvllQaTNbEVTzpddU52lIcWpZz0nx8Bhmnf5psfs0KE0i13CqCniLajRSpPbg9vSvJQ7b7iRX1oK4lbyzE2FixkreGR+OAQjc+M8FgYj00e+OAO7BBR+kfAYmAzak54QjIiuAxDffLZAusL6a5M9+KVo1tmpSpOqpQoDqFCoOMv5KvME11Rv8AwN3ja4PpKP7/AOmR02ztq2TpT1lLH09vYSIrMVA0NpjITRtIIOqgTknPpjCjFzsN52e1W8dhzc4S42i3dN3kW5hUhr9xtTx/aSUjy9MX/b8OrKcd+2ceET3byGmW3XIqAlhxlRQUJojSE+wpSPDLLD9aPi3jozP3ZZ8U+zRX2+2de2bi9ermplmBDcffkqccAeKF1cXpTmDpSAcQV/dwupu+5nnPARrJyNsq67XCrRKaUEtArQ4dLnuFarBzrTxw+Umo4a5Krpl7vlngpbymHuTeWou1tqR25l1KXX0Md5uMlSGgVr97hCQQlJUQevyGNPQqcIZZn7+xFWL0LD7UsEja20rTt2WtDkqBGDLqmalrWVKcIQVUKkp1UBOZpXFpGDbNTm2hQ9ShwSIbnzU1wQMR1/f+GALsEBHQfAfliVCZuTgiMvDDchwe08B4+YJHn4DEVkfJNE1NrrmpLsxuf3FcLJKNzktIbZKQw12FKcV7Kq1LKgKZHIY567UlUk89cnVa+/Ve3GOeF3BLb+W9ycx8mLiMKet3F223y5ebg84IzMh9lNUxwtWmoBGpVPAeuLUdb7PJ8smt3K6eEsEj5d+5d/jMNydnzl3eOuMUIs8SI7KUXFEFDrTzY/TU00nz/DFqjTc+PLH9DLv2oZy45f6PJRfkLk7mrdu/1Td6/wCrQrQ/IEhUGSDFbUxVJKEt1olOQB/jjap06YRxw39Shbt7M58RaRM2OVoO99wN7XsMeejdDae2JVulICGmk/4jqUA+z0V+GIJ6yjFyljA5blsnhLkmf2+WWW39xiUPvKkPWyJJlSnVaqBRg0INfJbwGeGp5ryV9yT8+pa+WSp1ROX/AGy8MRlNDZINAcEDG545kYIGIyT3h+OFjkPYITXRNfIYkQGbk+GAxGROQwxjj4+eAJsb75AXc7TIjtj/ADISXGKCp1oBNKf2umIb6FZDxJta91zyBu17P2rydb12UyZNqWtwye/bFJQfqFKFXglaVNkmgCgpPUeGMmF0qJfcuTqIuFmJLngleyeBv9qR2o+5725upiLIcWi43SU/ClGK5RQZLbSktagAQSNIz/Ti5K5zeYvHoWYwn44Us/ThEH5O4X2CVuT5BtlptBD6pag67cJqkreDjIS5IKEMlKRQq92VQMTUWWdOWR2aiazbYQXao414w45ut62lbmo0da3BGWAFPylpBHdedV7llavA5AdBiW7zssUWZcp1Qi3HhCP7Hru9uXknet3kOB11NpC1O0FXX5E1KnSKdNI0pyxobFahWkc9KxzlktXKql5Q8On9OKaHJjbIOZ9MEDG189VYQGItX7wOFkdjgIjfRPwH5YkTAzYlXTDWwGYVkPTAQcnqjl6YWBZPm1e5JHUGvrlgPgSK57+lTeCeUnN3iO45xlfX0OyewQr6C5yRreFBQhDpOpNMtVRiDYpjsN1p/eunqjS1rZUQUn+D/ZhsulhtXLW2GrhsjdZt1wlsd2NJjLOlxNKVdbGZp45VyxlUOyqeJRya7tjZH7Xj9AD3P7Qt1Tp7tz5F3w05YY7pUGm1FxajlVI1kCqiPEY2f8pFLEI4ZQl8e28zllAT+6vf+1bbEt/F/HzqHYUNtLct9pesl1fgVDIkACpGLfxuvNr3J9WZvyOym/CBIfsNeTY+Ql2sGjd0tEuKFHIFxgtyRU/3DiTbeWV4Q8Yly7kgIeUOmeQxSQUNEg0BGCBjZJUACMEamN2v94eVMLgkyEdpXtSfCgr8sO7DWbAoDLx/ow1oBmFkCngennhCPSvKisvjQD5k4QiM775H2jxnZ033eE8QoTiyiK2lKnZEhxKdWhlpOayB1pkPE0xJXW5vCGykl1E8m1weTtquR9y2z6di5RhrgPLQ+40hST26uIGnWAQTpqEqqATSp5fY28bHnDtxk63T1ca/hPnPP8you/8AjDmHhm/Pu8a3R+RtnT3GGCqrrIQTRISsitPTrjpdTfo2ILzSyYezoXUSzW/tA9eucOZXnFw708+pPc0qZe1toDdDrAHt/VXOmNSGvQuUkZ09nZl1bB/arbJn3fvSVF6Y4suPvK8XFdfTLE1k+BlVWHz1D7sO53PYtzte47A79PdbesOsuEApJKShSVJ8QtJKSOtCaYyrJZZpKvjBaqx/cRx9uaREtd2mtWHc0truJg3FaWY7jiV6FpjyFkIXQkEJJSuhpQ4ihW5RylwirbH25Yb6kwkuAigOfpQ9PHI/jhoxjXKcqMunXBSEkIO4O5g4EEhs+1NKmoGQr5emCFiO6bhsdhY+rvtxiW6KBXvTX2mEkencUCcJRb6Ia2kDLdf3YcLbWBbRd3L1KT/g2RlUgV9Xlltof+2LENOyXbBHK+KANvj76N53EORtiWqNZYxUUonS/wDPzC2cgQk0bQfwVi5XoRXMiCWy+wANw7y3Pu+Ybpue6y7ncdZUl6c6p4pBBNE6jpTTySAMXYQjHhIgcm+rOk3CW8YO8+PbHuVhSVfWRG25IT0RMjoDT6KVqNK0/L448x3deVF8q326fp1PQ9TYV1MZrv8A1Hjde3ol4ZWpSkqACgNWdfLP8sR1zcWWJNMq5yrwnAkyHZyUgSHDSlNRNPyx0OpuvHJk7OpFvgHUni5jbcYTXUBKqalZZ18zi+tryeCi9ZRQlYSpSElA9ilaRUdfSvlhSYkgF8pboa3VuZ36RQXaIKTCjK6pXQ+9z+8eh8gDjd06Pbhz1Zgbt6tnx0QRuK/u45G2I2xadwKO59rtpDSI09ZTNYQlNEhiTpUQE0/SvUPKmBdownyuGQwvlHryWO2x92fEO6VNMS5sixznyAW7u1oZCyBkZDRW2BXxJSPhjOno2R9S3HZgwpGXGDYl91v6Qo7wka09rtadWvXXTppnWtKeNMVvF59foTcD9yTe+RbTZkNccbdTe77ITpD8mREjxIoyAUtMl5pTivEJHt8zh9MYN/c8DLHLsjn7yqeTlbxmK5JEpO6S5V9M3Olega0+zRT9Pb9vljcqUcfa+ChPyzyQlQfqKk6q+Nddfxzw9DDxse7M+fz/AAwhHqAQ5+2dQ8fmPPLCwIsv9nNx5Utt0koslqfu3GMqShi6Od1hj6OWUgpfjiQ42XCBQOJRWqfXrzX/AKCuiUVmWLEuOHyvpx+x0Hwc7ot4i3DPPo/4/uXTOrskO+HUmtD888ccn6HWSXqQfciLD30mc4A5q/SoGnzGL9XljggaXcBvNxWpplqIAmCojuPIzCU5VyHu/hjU1PUo7PoA/lB68M7VTE2gwt9l1parhObUlJZYA9yUoJDilHx0pIA6Y19JRdmZvH0RkfIOahiHK7ledEcIAS4Cj+saHP8Ah0609MdCzm0Z6WsqLT08jWnphB5N7aRX2qzpnTV0/DCQHkI0NPMX/FE7sKuf/FFEfUBz/wCTT9Q3Tt9wdzR3NNdHt61y1YrP2fPt5Eq9zx9D/9k=" alt="people" />
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
                    <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a>
                    </li>
                </ul>
            </div>
        </div>
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
                    fffffffffffffff
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
                obtenerPublicaciones();
                  
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

    <!-- Footer -->
    <div class="footer">
        Social Network Template &copy; Copyright Notice
    </div>

    <!-- // Footer -->
    
<!-- Vendor Scripts Bundle --><script src="js/vendor.min.js"></script>

    <!-- App Scripts Bundle -->
    <script src="js/scripts.min.js"></script>
</body>
</html>