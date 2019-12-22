<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';

session_start();
$msg = '';
if (isset($_SESSION['id']) && filter_input(INPUT_GET, 'id')) {
    $condition = array("ID_EQUIP" => filter_input(INPUT_GET, 'id'));
    $equipe = read($connection, "EQUIPE", array("*"), $condition);

    if (filter_input(INPUT_POST, 'edit')) {
        $nom = filter_input(INPUT_POST, 'nom');
        $val_cols = array("LIB_EQUIP" => $nom);

        $where = array("ID_EQUIP" => filter_input(INPUT_GET, 'id'));
        if (update($connection, "EQUIPE", $val_cols, $where) !== false) {
            $msg = '<div class="alert alert-success text-center">
                       <strong>Succes !</strong> EQUIPE a été bien enregistré.
                    </div>';
        } else {
            $msg = '<div class="alert alert-danger text-center">
                       <strong>Erreur !</strong> EQUIPE n\'a pas été bien enregistré !
                    </div>';
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
                <li><a href="enseignant.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Enseignant</a></li>
                <li class="active"><a href="equipe.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Equipe</a></li>
                <li><a href="annonce.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Annonce</a></li>
            </ul>
            <div class="attribution">EECOMAS - Template by <a href="#">NEFFAR</a><br/><a href="#" style="color: #333;">EECOMAS</a></div>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Equipe</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nouvelle équipe</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <?= $msg; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Nouvelle équipe</div>
                        <div class="panel-body col-lg-offset-3">
                            <?php
                            foreach ($equipe as $e) :
                                ?>
                                <form action="modequipe.php?id=<?= $e["ID_EQUIP"]; ?>" method="post">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <input type="text" name="nom" class="form-control" value="<?= $e["LIB_EQUIP"]; ?>" required="" placeholder="Nom d'équipe" />
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
