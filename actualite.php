<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
if (filter_input(INPUT_GET, 'id')) {
    $one_act = read($connection, "ANNONCE", array("*"), array("ID_ANNONCE" => filter_input(INPUT_GET, 'id')));
} else {
    redirect('login.php');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Actualité</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery-1.11.0.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="keywords" content="" />
        <!--Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>

    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="header-main">
                    <div class="logo">
                        <a href="index.html"> <img src="images/logo.png" alt="" title=""> </a>
                    </div>
                    <div class="head-right">
                        <div class="top-nav">
                            <span class="menu"> <img src="images/icon.png" alt=""/></span>
                            <ul class="res">
                                <li><a class="active" href="index.php">Accueil</a></li>
                                <li><a href="#">Présentation</a></li>
                                <li><a href="membres.php">Membres</a></li>
                                <li><a href="#">Axe de recherches</a></li>
                                <li><a href="#">Equipes de recherche</a></li>
                                <li><a href="#">Manifestation Scientifiques</a></li>
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
                        <?php foreach ($one_act as $act) : ?>
                            <div class="blog-grids">
                                <a href="#"><img src="<?= $act["IMAGE_ANNONCE"]; ?>" class="img-thumbnail" alt=""></a>
                                <div class="blog-detail">
                                    <a href="#"><h3><?= $act["NOM_ANNONCE"]; ?></h3></a>
                                    <h4> <span class="blog-clr"><?= $act["DATE_ANNONCE"]; ?></span></h4>
                                    <div class="blog-para">
                                        <p>
                                            <?= strip_tags($act["TEXTE_ANNONCE"]); ?>
                                        </p>
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
                    </div>
                </div>
            </div>
        </div>
        <!--footer end here-->
    </body>
</html>
