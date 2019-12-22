<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
$membres = read_membres($connection);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Membres</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <!--Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <style>
            a img.membre {
                width: 50%;
                float: right;
                padding: 30px;
            }
        </style>
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
                                <li><a class="active" href="membres.php">Membres</a></li>
                                <li><a href="axe.php">Axe de recherches</a></li>
                                <li><a href="equipes.php">Equipes de recherche</a></li>
                                <li><a href="manif.php">Manifestation Scientifiques</a></li>
                                <li class="<?php echo isset($_SESSION['id']) ? 'hidden' : ''; ?>"><a href="login.php">Espace personnel</a></li>
                                <li class="<?php echo isset($_SESSION['id']) ? '' : 'hidden'; ?>"><a href="logout.php">Logout</a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>

        <div class="blog">
            <div class="container">
                <div class="blog-main">
                    <div class="col-md-9 blog-left">
                        <?php foreach ($membres as $membre) : ?>
                            <div class="blog-grids">
                                <a href="#"><img src="<?= $membre["PHOTO_ENS"]; ?>" class="membre" alt=""></a>
                                <div class="blog-detail">
                                    <a href="#"><h3><?= $membre["NOM_ENS"] . " " . $membre["PRENOM_ENS"]; ?></h3></a>
                                    <h5><span class="blog-clr"> MEMBRES </span></h5>
                                    <div class="blog-para">

                                        <p><?= $membre["LIB_PRES"]; ?></p>
                                        <p><?= $membre["LIB_PARCOURS"]; ?></p>
                                        <p><?= $membre["LIB_PUB"]; ?></p>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-3 blog-right">
                    <div class="blog-cate">
                        <h3>EECOMAS</h3>
                        <ul class="res">
                            <li><a href="index.php">Actualités</a></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
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
                                <li><a class="active" href="index.php">Home</a></li>/
                                <li><a href="#">About</a></li>/
                                <li><a href="#">Blog</a></li>/
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.0.min.js"></script>
    </body>
</html>