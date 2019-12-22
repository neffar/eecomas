<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Equipes de recherche</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
                        <a href="index.php"> <img src="images/logo.png" alt="" title=""> </a>
                    </div>
                    <div class="head-right">
                        <div class="top-nav">
                            <span class="menu"> <img src="images/icon.png" alt=""/></span>
                            <ul class="res">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="presentation.php">Présentation</a></li>
                                <li><a href="membres.php">Membres</a></li>
                                <li><a href="axe.php">Axe de recherches</a></li>
                                <li><a class="active" href="equipes.php">Equipes de recherche</a></li>
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

        <div class="about">
            <div class="container">
                <div class="about-main">
                    <div class="about-top">
                        <h3>Equipes de recherche</h3>
                        <h5>Objectif : optimiser le potentiel des équipes de chercheurs sur les environnements aquatiques en région Aquitaine en créant de nouvelles synergies</h5>
                        <p>La région Aquitaine, possède des atouts spécifiques (localisation géographique, fort potentiel scientifique pluridisciplinaire et grande diversité d’écosystèmes modèles...) pour positionner au meilleur niveau international ses recherches sur les environnements aquatiques actuels.

Un tel positionnement suppose tout à la fois une remise à niveau des infrastructures et le regroupement des équipes 

concernées sur un même site géographique. Il s’agit donc de rassembler l’ensemble des compétences de l’université de Bordeaux dans les domaines de l’océanographie côtière et de l’écotoxicologie aquatique. </p>
                    </div>
                    <div class="about-text">
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img3.jpg" alt=""></a>
                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img4.jpg" alt=""></a>
                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img5.jpg" alt=""></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="about-text">
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img7.jpg" alt=""></a>
                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img8.jpg" alt=""></a>
                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><img src="images/img9.jpg" alt=""></a>
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
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.0.min.js"></script>
    </body>
</html>