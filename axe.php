<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Axe de recherches</title>
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
                        <a href="index.php"> <img src="images/logo.png" alt="logo" title="logo"> </a>
                    </div>
                    <div class="head-right">
                        <div class="top-nav">
                            <span class="menu"> <img src="images/icon.png" alt=""/></span>
                            <ul class="res">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="presentation.php">Présentation</a></li>
                                <li><a href="membres.php">Membres</a></li>
                                <li><a class="active" href="axe.php">Axe de recherches</a></li>
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

        <div class="about">
            <div class="container">
                <div class="about-main">
                    <div class="about-top">
                        <h3>Axe de recherches</h3>
                        <h5>Axe : Idéologies et catégories sociales</h5>
                        <p>
                            Ce premier axe se propose d’étudier les rapports entre idéologie et catégories sociales. Dans la définition
                            canonique qu’en donne la science politique depuis le xixe siècle, l’idéologie est un système de représentations
                            qui soutient un projet politique de légitimation ou de transformation de la société. Sous cet aspect, nous proposons
                            d’examiner les représentations des catégories sociales dans deux grandes formations idéologiques de la modernité 
                            occidentale : le conservatisme et le libéralisme. On trouve chez les conservateurs une conception verticale de la société, fondée sur une vision organique des hiérarchies entre les groupes, qui tend vers la fixité sociale. Par opposition, la conception libérale de la société est horizontale ; animé par l’idéal d’une société ouverte où les barrières sociales sont perméables, le libéralisme propose une vision égalitariste des relations interindividuelles et recherche une distribution méritocratique des statuts professionnels [1]. Il est également nécessaire d’étudier la réaction des libéraux et des conservateurs face à la vision conflictuelle des rapports sociaux qu’implique la lutte des classes.
                        </p>
                    </div>
                    <div class="about-text">
                        <div class="col-md-8 about-text-left">
                            <a href="#"><img src="images/img1.jpg" alt=""></a>
                        </div>

                        <div class="col-md-4 about-text-left pull-right">
                            <a href="single.html"><img src="images/img2.jpg" alt=""></a>
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