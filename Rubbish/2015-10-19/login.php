<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
<body class="login">
    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                <h1>Account Access</h1>
                <div class="panel panel-default text-center">
                    <img src="images/people/110/guy-5.jpg" class="img-circle">
                    <form id="login-form" action = "validar.php" method="POST">
                    <div class="panel-body">
                    <?php 
                        if (isset($_GET["mode"]) && $_GET["mode"]="modeUserNotExist")  {
                            echo "El usuario no existe";
                        }else if (isset($_GET["mode"]) && $_GET["mode"]="PasswordNotExist") {
                            echo "Contraseña inexistente";
                        }
                    ?>     
                        <input class="form-control" type="text" placeholder="Username" name="mail">
                        <input class="form-control" type="password" placeholder="Enter Password" name = "pass">
                        <a onclick= "document.getElementById('login-form').submit(); " class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></a>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Vendor Scripts Bundle -->
<script src="js/vendor.min.js"></script>

<!-- App Scripts Bundle -->
<script src="js/scripts.min.js"></script>
</html>