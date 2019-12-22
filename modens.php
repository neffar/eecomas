<?php
require_once 'includes/DBConnection.php';
require_once 'includes/DBHandler.php';
session_start();
$msg = '';
if (isset($_SESSION['id'])) {
    $condition = array("ID_ENS" => $_SESSION["id"]);
    $enseignant = read($connection, "ENSEIGNANT", array("*"), $condition);

    if (filter_input(INPUT_POST, 'edit')) {

        if (isset($_FILES["photo"]) && !empty($_FILES["photo"])) {
            $target_dir = "uploads/profile/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if ($check !== false) {
                $msg = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }

// Check if file already exists
            if (file_exists($target_file)) {
                $msg = '<div class="alert alert-danger text-center">
                        <span>Ce fichier déjà existe</span>
                    </div>';
                $uploadOk = 0;
            }

// Check file size
            if ($_FILES["photo"]["size"] > 10000000) {
                $msg = '<div class="alert alert-danger text-center">
                        <span>La taille de l\'image très grand</span>
                    </div>';
                $uploadOk = 0;
            }

// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $msg = '<div class="alert alert-danger text-center">
                        <span>JPG & JPEG & PNG & GIF sont autorisée</span>
                    </div>';
                $uploadOk = 0;
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg = '<div class="alert alert-danger text-center">
                        <span>Erreur dans l\'upload de la photo</span>
                    </div>';

// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

                    $login = filter_input(INPUT_POST, 'loign');
                    $password = filter_input(INPUT_POST, 'password');
                    $nom = filter_input(INPUT_POST, 'nom');
                    $prenom = filter_input(INPUT_POST, 'prenom');
                    $mail_perso = filter_input(INPUT_POST, 'mail_perso');
                    $mail_insti = filter_input(INPUT_POST, 'mail_insti');
                    $specialite = filter_input(INPUT_POST, 'specialite');
                    $departement = filter_input(INPUT_POST, 'departement');
                    $filiere = filter_input(INPUT_POST, 'filiere');
                    $equipe = filter_input(INPUT_POST, 'equipe');
                    $photo = "uploads/profile/" . basename($_FILES["photo"]["name"]);

                    $val_cols = array("NOM_ENS" => $nom, "PRENOM_ENS" => $prenom, "EMAIL_PERS_ENS" => $mail_perso, "EMAIL_INST_ENS" => $mail_insti,
                        "LOGIN_ENS" => $login, "MDP_ENS" => $password, "ID_DEP" => $departement, "ID_FIL" => $filiere, "ID_EQUIP" => $equipe,
                        "SPECIALITE" => $specialite, "PHOTO_ENS" => $photo);

                    $where = array("ID_ENS" => filter_input(INPUT_GET, 'id'));
                    if (update($connection, "ENSEIGNANT", $val_cols, $where) !== false) {
                        $msg = '<div class="alert alert-success text-center">
                               <strong>Succes !</strong> Enseignant a été bien enregistré.
                            </div>';
                    } else {
                        $msg = '<div class="alert alert-danger text-center">
                               <strong>Erreur !</strong> Enseignant n\'a pas été bien enregistré !
                            </div>';
                    }
                } else {
                    $msg = '<div class="alert alert-danger text-center">
                                <span>Erreur dans l\'upload de la photo</span>
                            </div>';
                }
            }
        } else {
            $login = filter_input(INPUT_POST, 'loign');
            $password = filter_input(INPUT_POST, 'password');
            $nom = filter_input(INPUT_POST, 'nom');
            $prenom = filter_input(INPUT_POST, 'prenom');
            $mail_perso = filter_input(INPUT_POST, 'mail_perso');
            $mail_insti = filter_input(INPUT_POST, 'mail_insti');
            $specialite = filter_input(INPUT_POST, 'specialite');
            $departement = filter_input(INPUT_POST, 'departement');
            $filiere = filter_input(INPUT_POST, 'filiere');
            $equipe = filter_input(INPUT_POST, 'equipe');

            $val_cols = array("NOM_ENS" => $nom, "PRENOM_ENS" => $prenom, "EMAIL_PERS_ENS" => $mail_perso, "EMAIL_INST_ENS" => $mail_insti,
                "LOGIN_ENS" => $login, "MDP_ENS" => $password, "ID_DEP" => $departement, "ID_FIL" => $filiere, "ID_EQUIP" => $equipe,
                "SPECIALITE" => $specialite);

            $where = array("ID_ENS" => filter_input(INPUT_GET, 'id'));
            if (update($connection, "ENSEIGNANT", $val_cols, $where) !== false) {
                $msg = '<div class="alert alert-success text-center">
                           <strong>Succes !</strong> Enseignant a été bien modifié.
                        </div>';
            } else {
                $msg = '<div class="alert alert-danger text-center">
                           <strong>Erreur !</strong> Enseignant n\'a pas été bien modifié !
                        </div>';
            }
        }
    }
} else {
    redirect('login.php');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Modifier enseignant</title>
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
            <div class="container">

                <div class="row">
                    <?= $msg; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Nouveau Enseignant</div>
                        <div class="panel-body">

                            <?php
                            foreach ($enseignant as $ens) :
                                ?>

                                <form action="modens.php?id=<?= $ens["ID_ENS"]; ?>" method="post" enctype="multipart/form-data">

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <input type="text" name="login" class="form-control" value="<?= $ens["LOGIN_ENS"]; ?>" required="" placeholder="Login" />
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" value="*******" disabled="" required="" placeholder="Password" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="nom" class="form-control" value="<?= $ens["NOM_ENS"]; ?>" required="" placeholder="Nom" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="prenom" class="form-control" value="<?= $ens["PRENOM_ENS"]; ?>" required="" placeholder="Prénom" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="specialite" class="form-control" value="<?= $ens["SPECIALITE"]; ?>" required="" placeholder="Specialité" />
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="mail_perso" class="form-control" value="<?= $ens["EMAIL_PERS_ENS"]; ?>" required="" placeholder="E-mail pérsonne" />
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="mail_insti" class="form-control" value="<?= $ens["EMAIL_INST_ENS"]; ?>" required="" placeholder="E-mail institutionnelle" />
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Filière</label>
                                            <select name="filiere" class="form-control">
                                                <?php
                                                $filiere = read($connection, "FILIERE", array("*"), array());
                                                foreach ($filiere as $fil) :
                                                    ?>
                                                    <option <?php echo $fil["ID_FIL"] === $ens["ID_FIL"] ? 'selected=""' : ""; ?> value="<?= $fil["ID_FIL"]; ?>"><?= $fil["LIB_FIL"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Département</label>
                                            <select name="departement" class="form-control">
                                                <?php
                                                $departement = read($connection, "DEPARTEMENT", array("*"), array());
                                                foreach ($departement as $dep) :
                                                    ?>
                                                    <option <?php echo $dep["ID_DEP"] === $ens["ID_DEP"] ? 'selected=""' : ""; ?> value="<?= $dep["ID_DEP"]; ?>"><?= $dep["LIB_DEP"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Equipes</label>
                                            <select name="equipe" class="form-control">
                                                <?php
                                                $equipe = read($connection, "EQUIPE", array("*"), array());
                                                foreach ($equipe as $eq) :
                                                    ?>
                                                    <option <?php echo $eq["ID_EQUIP"] === $ens["ID_EQUIP"] ? 'selected=""' : ""; ?> value="<?= $eq["ID_EQUIP"]; ?>"><?= $eq["LIB_EQUIP"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" name="photo" />
                                        </div>

                                        <input type="submit" name="edit" class="btn btn-primary pull-right" value="Modifier" />
                                        <input type="reset" class="btn btn-default pull-right" value="Annuler" />
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Photo</div>
                                            <div class="panel-body text-center">
                                                <img src="<?= $ens["PHOTO_ENS"]; ?>" class="img-thumbnail" alt="No photo" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div><!-- /.row -->

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