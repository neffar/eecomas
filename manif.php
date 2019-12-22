<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Manifestation Scientifiques</title>
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
                                <li><a href="equipes.php">Equipes de recherche</a></li>
                                <li><a class="active" href="manif.php">Manifestation Scientifiques</a></li>
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
                        <h3>Manifestation Scientifiques</h3>
                        <p>
                            Le soutien aux manifestations scientifiques s’adresse aux organisateurs de rencontres, colloques, congrès, conférences, séminaires et journées scientifiques, qui relèvent des universités, établissements de formation des cadres et organismes de recherche.
                        </p>
                        <p>
                            Le soutien accordé consiste, notamment, en la prise en charge des frais de participation/inscription de doctorants, qui font des présentations (orales et/ou posters) sur leurs résultats de recherche. Cela leur permet d’échanger et créer des liens de coopération avec d’autres chercheurs nationaux et internationaux et d’améliorer la visibilité de leurs structures de recherche aux niveaux national et international.
                        </p>
                        <p>
                            Sont privilégiées les manifestations de haute qualité scientifique et qui portent sur des thématiques pertinentes pour le Maroc. De plus, une attention toute particulière est portée aux manifestations:
                        </p>
                        <ul>
                            <li><p>pour lesquelles un appel à contributions/communications existe</p></li>
                            <li><p>dont les frais d’inscription ne sont pas élevés,</p></li>
                            <li><p>ouvertes sur l’international,</p></li>
                            <li><p>favorisant la pluridisciplinarité et l’interdisciplinarité scientifique.</p></li>
                        </ul>

                    </div>
                    <div class="about-text">
                        <div class="col-md-12 about-text-left">
                            <a href="#"><img src="images/img6.jpg" alt=""></a>
                            <a href="#"><h5>Manifestation Scientifiques</h5></a>
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