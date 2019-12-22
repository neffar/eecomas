<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Présentation</title>
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
                                <li><a class="active" href="presentation.php">Présentation</a></li>
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


        <div class="about">
            <div class="container">
                <div class="about-main">
                    <div class="about-top">
                        <h3>Présentation</h3>
                        <h5>EECOMAS</h5>
                        <p>Electric Engineering and computing and Mathematical Sciences Laboratory (EECOMAS)</p>
                    </div>
                    <div class="about-text">
                        <div class="col-md-4 about-text-left">
                            <a href="#"><h5>Présentation</h5></a>

                            <p>Electric Engineering and computing and Mathematical Sciences Laboratory (EECOMAS), ses objectifs sont :</p>

                            <ul>
                                <li>
                                    <p>
                                        Développer des méthodes mathématiques et numériques permettant la résolution de problèmes
                                        relevant de différents secteurs industriels, économiques et environnementaux
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Former des jeunes chercheurs en leur offrant le cadre nécessaire et un encadrement de qualité leur
                                        permettant d’effectuer leurs travaux dans le domaine de l’ingénierie mathématique dans les
                                        meilleures conditions.
                                    </p>
                                </li>
                            </ul>
                            <p>On y trouve :</p>
                            <ul>
                                <li>
                                    <p>
                                        Une formation en Mastère d’Ingénierie Mathématique destiné aux maitrisards mathématiques appliquées,
                                        mathématiques et aux ingénieurs ou à ceux qui ont un diplôme équivalent.
                                    </p>

                                </li>
                                <li>
                                    <p>
                                        Une formation Doctorale de Mathématique Appliquées destinée aux Diplômés de Master mathématiques 
                                        appliquées, mathématiques et en particulier du Mastère d’Ingénierie Mathématique qui est localisé à 
                                        l’ENSAk.
                                    </p>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><h5>Thèmes de recherche</h5></a>
                            <p> Les thèmes de recherche sont : </p>

                            <ul>
                                <li><p>Modélisation des écoulements complexes</p></li>
                                <li><p> Modélisation de l’hydrodynamique côtière et fluviale</p></li>
                                <li><p>Modélisation du monde du vivant.</p></li>
                                <li><p>Développement d’algorithmes rapides</p></li>
                                <li><p>Algorithmes génétiques</p></li>
                                <li><p>Contrôle et stabilisation des systèmes complexes</p></li>
                                <li><p>Contrôle des engins autonomes.</p></li>
                                <li><p>Géométrie des E.D.P. et Physique Mathématique</p></li>
                                <li><p>Résolution numérique d’E.D.P. non linéaires</p></li>
                                <li><p>Modélisation économique</p></li>
                                <li><p>Modélisation statistique</p></li>
                            </ul>

                        </div>
                        <div class="col-md-4 about-text-left">
                            <a href="#"><h5>Nos partenaires</h5></a>
                            <ul>
                                <li><p>Université de Paris VI</p></li>
                                <li><p>Département de Mathématiques et Applications E.N.S. Ulm, France.</p></li>
                                <li><p>Laboratoire de PMMH, E.S.P. C. I. Paris</p></li>
                                <li><p>Université Toulouse III</p></li>
                                <li><p>Université de Virginia Tech., USA</p></li>
                                <li><p>Faculté des Sciences de Rabat, Maroc</p></li>
                            </ul>
                            <img src="images/lg.png" />
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