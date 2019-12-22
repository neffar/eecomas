<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
$msg = '';
if (filter_input(INPUT_POST, 'submit')) {
    $username = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');
    $col = array("*");
    $condition = array("LOGIN_ENS" => $username, "MDP_ENS" => $password);
    $data = read($connection, "ENSEIGNANT", $col, $condition);

    if (!empty($data)) {
        foreach ($data as $d) {
            $_SESSION['id'] = $d["ID_ENS"];
            $_SESSION['username'] = $d["NOM_ENS"];
        }
        redirect('index.php');
    } else {
        $msg = '<div class="alert alert-danger text-center">
                    <span>Username et/ou le mot de pass incorrect!</span>
                </div>';
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="#" />
        <!--Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css' />
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>

    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="header-main">
                    <div class="logo">
                        <a href="index.php"> <img src="images/logo.png" alt="" title=""> </a>
                    </div>
                    <div class="head-right">
                        <div class="top-nav">
                            <span class="menu"> <img src="images/icon.png" alt=""/></span>
                            <ul class="res">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="presentation.php">Présentation</a></li>
                                <li><a href="membres.php">Menmbres</a></li>
                                <li><a href="axe.php">Axe de recherches</a></li>
                                <li><a href="equipes.php">Equipes de recherche</a></li>
                                <li><a href="manif.php">Manifestation Scientifiques</a></li>
                                <li><a class="active" href="single.php">Espace personnel</a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="contact">
            <div class="contact-main">
                <div class="container">

                    <div class="contact-bottom">
                        <div class="col-md-5 contact-left">
                            <div class="contact-top">
                                <h3>Espace enseignant</h3>
                            </div>
                            <?= $msg; ?>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="login" class="form-control" required="" placeholder="Login" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" required="" placeholder="Password" />
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Login" />
                                <input type="reset" class="btn btn-default pull-right" value="Annuler" />
                            </form>
                        </div>
                        <div class="col-md-5 contact-right">
                            <div class="contact-top">
                                <h3>Espace administrateur</h3>
                            </div>
                            <a href="admin/login.php" class="btn btn-primary pull-right">DASHBOARD</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="copy-main">
                        <div class="copy-left">
                            <p>Design By<a href="#" target="-blank"> ENSAK Team</a></p>
                        </div>
                        <div class="copy-right"> 
                            <ul>
                                <li><a href="index.php">Home</a></li>/
                                <li><a href="about.php">About</a></li>/
                                <li><a href="blog.php">Blog</a></li>/
                                <li><a class="active" href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>