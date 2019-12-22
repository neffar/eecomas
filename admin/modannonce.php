<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';

session_start();
$msg = '';
if (isset($_SESSION['id']) && filter_input(INPUT_GET, 'id')) {

    $condition = array("ID_ANNONCE" => filter_input(INPUT_GET, 'id'));
    $ann = read($connection, "ANNONCE", array("*"), $condition);

    if (filter_input(INPUT_POST, 'edit')) {

        if (isset($_FILES["photo"]) && !empty($_FILES["photo"])) {
            $target_dir = "../uploads/annonce/";
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

                    $titre = filter_input(INPUT_POST, 'titre');
                    $annonce = filter_input(INPUT_POST, 'annonce');
                    $image = "uploads/annonce/" . basename($_FILES["photo"]["name"]);

                    $val_cols = array("NOM_ANNONCE" => $titre, "DATE_ANNONCE" => date("Y-m-d"), "IMAGE_ANNONCE" => $image,
                        "TEXTE_ANNONCE" => $annonce);

                    $where = array("ID_ANNONCE" => filter_input(INPUT_GET, 'id'));

                    if (update($connection, "ANNONCE", $val_cols, $where) !== false) {
                        $msg = '<div class="alert alert-success text-center">
                           <strong>Succes !</strong> ANNONCE a été bien modifiée.
                        </div>';
                    } else {
                        $msg = '<div class="alert alert-danger text-center">
                           <strong>Erreur !</strong> ANNONCE n\'a pas été bien modifiée !
                        </div>';
                    }
                } else {
                    $msg = '<div class="alert alert-danger text-center">
                            <span>Erreur dans l\'upload de la photo</span>
                        </div>';
                }
            }
        } else {
            $titre = filter_input(INPUT_POST, 'titre');
            $annonce = filter_input(INPUT_POST, 'annonce');

            $where = array("ID_ANNONCE" => filter_input(INPUT_GET, 'id'));
            $val_cols = array("NOM_ANNONCE" => $titre, "DATE_ANNONCE" => date("Y-m-d"), "TEXTE_ANNONCE" => $annonce);

            if (update($connection, "ANNONCE", $val_cols, $where) !== false) {
                $msg = '<div class="alert alert-success text-center">
                           <strong>Succes !</strong> ANNONCE a été bien modifiée.
                        </div>';
            } else {
                $msg = '<div class="alert alert-danger text-center">
                           <strong>Erreur !</strong> ANNONCE n\'a pas été bien modifiée !
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
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nouvelle équipe</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

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
                    <a class="navbar-brand" href="#"><span>EECOMAS</span>LAB</a>
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
                <li><a href="enseignant.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Enseignant</a></li>
                <li><a href="equipe.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Equipe</a></li>
                <li class="active"><a href="annonce.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Annonce</a></li>
            </ul>
            <div class="attribution">EECOMAS - Template by <a href="#">NEFFAR</a><br/><a href="#" style="color: #333;">EECOMAS</a></div>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Annonce</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nouvelle Annonce</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <?= $msg; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Nouvelle équipe</div>
                        <div class="panel-body col-lg-offset-3">

                            <?php foreach ($ann as $a): ?>
                                <form action="modannonce.php?id=<?= $a["ID_ANNONCE"]; ?>" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <input type="text" name="titre" class="form-control" value="<?= $a["NOM_ANNONCE"]; ?>" required="" placeholder="Titre" />
                                        </div>

                                        <div class="form-group">
                                            <textarea name="annonce" class="form-control" required="" placeholder="Annonce"><?= $a["TEXTE_ANNONCE"]; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="photo" />
                                        </div>

                                        <input type="submit" name="edit" class="btn btn-primary pull-right" value="Modifier" />
                                        <input type="reset" class="btn btn-default pull-right" value="Annuler" />
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	

    </body>

</html>
