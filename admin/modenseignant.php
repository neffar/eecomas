<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';

session_start();
$msg = '';
if (isset($_SESSION['id']) && filter_input(INPUT_GET, 'id')) {

    $condition = array("ID_ENS" => filter_input(INPUT_GET, 'id'));
    $enseignant = read($connection, "ENSEIGNANT", array("*"), $condition);

    if (filter_input(INPUT_POST, 'edit')) {

        if (isset($_FILES["photo"]) && !empty($_FILES["photo"])) {
            $target_dir = "../uploads/profile/";
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modifier Enseignant</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span>EECOMAS</span>LAB</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
                <li class="active"><a href="enseignant.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Enseignant</a></li>
                <li><a href="equipe.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Equipe</a></li>
                <li><a href="annonce.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Annonce</a></li>
            </ul>
            <div class="attribution">EECOMAS - Template by <a href="#">NEFFAR</a><br/><a href="#" style="color: #333;">EECOMAS</a></div>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Enseignant</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enseignant</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <?= $msg; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Nouveau Enseignant</div>
                        <div class="panel-body">

                            <?php
                            foreach ($enseignant as $ens) :
                                ?>

                                <form action="modenseignant.php?id=<?= $ens["ID_ENS"]; ?>" method="post" enctype="multipart/form-data">

                                    <div class="col-md-6">

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

                                    <div class="col-md-6">

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

                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->

        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	
    </body>

</html>