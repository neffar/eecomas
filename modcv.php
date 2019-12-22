<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
$msg = '';

if (isset($_SESSION['id'])) {

    $read_pre = read($connection, "PRESENTATION", array("*"), array("ID_ENS" => $_SESSION["id"]));
    $read_parc = read($connection, "PARCOURS", array("*"), array("ID_ENS" => $_SESSION["id"]));
    $read_pub = read($connection, "PUBLICATION", array("*"), array("ID_ENS" => $_SESSION["id"]));

    if (filter_input(INPUT_POST, 'edit')) {

        $presentation = filter_input(INPUT_POST, 'presentation');
        $parcours = filter_input(INPUT_POST, 'parcours');
        $publication = filter_input(INPUT_POST, 'publication');

        $where = array("ID_ENS" => $_SESSION['id']);

        if (update($connection, "PRESENTATION", array("LIB_PRES" => $presentation), $where) !== null &&
                update($connection, "PARCOURS", array("LIB_PARCOURS" => $parcours), $where) !== null &&
                update($connection, "PUBLICATION", array("LIB_PUB" => $publication), $where) !== null) {
            $msg = '<div class="alert alert-success text-center">
                       <strong>Succes !</strong> CV a été bien modifié.
                    </div>';
        } else {
            $msg = '<div class="alert alert-danger text-center">
                       <strong>Erreur !</strong> CV n\'a pas été bien modifié !
                    </div>';
        }
    }
} else {
    redirect('login.php');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Modifier CV</title>
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
                                <li><a href="about.php">Présentation</a></li>
                                <li><a href="blog.php">Menmbres</a></li>
                                <li><a href="#">Axe de recherches</a></li>
                                <li><a href="index.php">Equipes de recherche</a></li>
                                <li><a href="single.php">Manifestation Scientifiques</a></li>
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

        <div class="contact">
            <div class="contact-main">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <?= $msg; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">Modification du CV</div>
                                <div class="panel-body">

                                    <form action="modcv.php" method="post">

                                        <div class="col-md-6 col-md-offset-3">

                                            <?php foreach ($read_pre as $r_pre) : ?>
                                                <div class="form-group">
                                                    <label for="presentation">Présentation</label>
                                                    <textarea class="form-control" id="presentation" name="presentation" rows="3"><?= $r_pre["LIB_PRES"]; ?></textarea>
                                                </div>
                                                <?php
                                            endforeach;
                                            foreach ($read_parc as $read_parc) :
                                                ?>
                                                <div class="form-group">
                                                    <label for="parcours">Parcours</label>
                                                    <textarea class="form-control" id="parcours" name="parcours" rows="3"><?= $read_parc["LIB_PARCOURS"]; ?></textarea>
                                                </div>
                                                <?php
                                            endforeach;
                                            foreach ($read_pub as $read_pub) :
                                                ?>
                                                <div class="form-group">
                                                    <label for="publication">Publication</label>
                                                    <textarea class="form-control" id="publication" name="publication" rows="3"><?= $read_pub["LIB_PUB"]; ?></textarea>
                                                </div>
                                            <?php endforeach; ?>
                                            <input type="submit" name="edit" class="btn btn-primary pull-right" value="Enregistrer" />
                                            <input type="reset" class="btn btn-default pull-right" value="Annuler" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div><!-- /.col-->
                    </div><!-- /.row -->

                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="copy-main">
                        <div class="copy-left">
                            <p>Design By<a href="#" target="-blank"> NEFFAR</a></p>
                        </div>
                        <div class="copy-right"> 
                            <ul>
                                <li><a href="index.php">Home</a></li>/
                                <li><a href="#">About</a></li>/
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