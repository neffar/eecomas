<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
$actualites = read_with_limit($connection, "ANNONCE");
$all_act = read($connection, "ANNONCE", array("*"), array());
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Index</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <script src="js/jquery-1.11.0.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css' />

    </head>
    <body>

        <div class="header">
            <div class="container">
                <div class="header-main">
                    <div class="logo">
                        <a href="index.php"> <img src="images/logo.png"  alt="" title=""> </a>
                    </div>
                    <div class="head-right">
                        <div class="top-nav">
                            <ul class="res">
                                <li><a class="active" href="index.php">Accueil</a></li>
                                <li><a href="presentation.php">Présentation</a></li>
                                <li><a href="membres.php">Membres</a></li>
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

        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: false,
                    nav: true
                });
            });
        </script>

        <div class="banner">
            <div class="container">
                <div class="banner-main">
                    <ul class="rslides" id="slider">
                        <?php foreach ($actualites as $actualite) : ?>
                            <li>
                                <h3><?= $actualite["NOM_ANNONCE"]; ?></h3>
                                <p><?= substr(strip_tags($actualite["TEXTE_ANNONCE"]), 0, 100); ?></p>
                                <div class="bann-btn">
                                    <a href="actualite.php?id=<?= $actualite["ID_ANNONCE"]; ?>" class="hvr-shutter-out-horizontal">Read More</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="banner-strip">
            <div class="container">
                <h3>EECOMAS</h3>
                <h3 class="pull-right">
                    Electric Engineering and computing and Mathematical Sciences Laboratory
                </h3>
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="blog-cate">
                            <h3>Espace étudiant</h3>
                            <ul>
                                <li><a href="modens.php">Modifier le profile</a></li>
                                <li><a href="modcv.php">Modifier le CV</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php foreach ($all_act as $act) : ?>
                        <div class="col-md-9 pull-right">
                            <div class="blog-grids">
                                <a href="#"><img src="<?= $act["IMAGE_ANNONCE"]; ?>" class="img-thumbnail" alt="image"></a>
                                <div class="blog-detail">
                                    <a href="#"><h3><?= $act["NOM_ANNONCE"]; ?></h3></a>
                                    <h4> <span class="blog-clr"><?= $act["DATE_ANNONCE"]; ?></span> </h4>
                                    <p>
                                        <?= substr(strip_tags($act["TEXTE_ANNONCE"]), 0, 200) . "..."; ?>
                                    </p>
                                    <div class="blog-btn"><a href="actualite.php?id=<?= $act["ID_ANNONCE"]; ?>">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="copy-main">
                        <div class="copy-left">
                            <p>Developed By<a href="#" target="-blank"> ENSAK Team</a></p>
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

    </body>
</html>