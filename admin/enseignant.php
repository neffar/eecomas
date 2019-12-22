<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';

session_start();
$msg_rmv = '';
if (isset($_SESSION['id'])) {
    if (filter_input(INPUT_GET, 'delete')) {
        $condition = array("ID_ENS" => filter_input(INPUT_GET, 'delete'));
        if (delete($connection, "ENSEIGNANT", $condition)) {
            $msg_rmv = '<div class="alert bg-success text-center">
                           <strong>Succès !</strong> Enseignant a été bien supprimé !.
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enseignant</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
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
                    <?= $msg_rmv; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des enseignants
                            <a href="nvenseignant.php" class="btn btn-default pull-right"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Nouveau</a>
                        </div>
                        <div class="panel-body">
                            <table data-toggle="table" data-url="#" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th class="text-center" data-field="login" data-sortable="true">Login</th>
                                        <th class="text-center" data-field="nom" data-sortable="true">Nom</th>
                                        <th class="text-center" data-field="prenom" data-sortable="true">Prénom</th>
                                        <th class="text-center" data-field="mail_perso" data-sortable="true">E-mail Pérso</th>
                                        <th class="text-center" data-field="mail_insti" data-sortable="true">E-mail Insti</th>
                                        <th class="text-center" data-field="specialite" data-sortable="true">Spécialité</th>
                                        <th class="text-center" data-field="departement" data-sortable="true">Département</th>
                                        <th class="text-center" data-field="filiere" data-sortable="true">Filière</th>
                                        <th class="text-center" data-field="equipe" data-sortable="true">Equipe</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $enseignants = read($connection, "ENSEIGNANT", array("*"), array());
                                    foreach ($enseignants as $enseignant) :
                                        ?>
                                        <tr>
                                            <td><?= $enseignant["LOGIN_ENS"]; ?></td>
                                            <td><?= $enseignant["NOM_ENS"]; ?></td>
                                            <td><?= $enseignant["PRENOM_ENS"]; ?></td>
                                            <td><?= $enseignant["EMAIL_PERS_ENS"]; ?></td>
                                            <td><?= $enseignant["EMAIL_INST_ENS"]; ?></td>
                                            <td><?= $enseignant["SPECIALITE"]; ?></td>
                                            <td>
                                                <?php
                                                $departement = read($connection, "DEPARTEMENT", array("*"), array("ID_DEP" => $enseignant["ID_DEP"]));
                                                foreach ($departement as $dep) {
                                                    echo $dep["LIB_DEP"];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $filiere = read($connection, "FILIERE", array("*"), array("ID_FIL" => $enseignant["ID_FIL"]));
                                                foreach ($filiere as $fil) {
                                                    echo $fil["LIB_FIL"];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $equipe = read($connection, "EQUIPE", array("*"), array("ID_EQUIP" => $enseignant["ID_EQUIP"]));
                                                foreach ($equipe as $eq) {
                                                    echo $eq["LIB_EQUIP"];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="voirenseignant.php?id=<?= $enseignant["ID_ENS"]; ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="modenseignant.php?id=<?= $enseignant["ID_ENS"]; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" data-href="enseignant.php?delete=<?= $enseignant["ID_ENS"]; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->

        </div>	<!--/.main-->

        <!-- MODAL Bootstrap -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        SUPPRESSION !
                    </div>
                    <div class="modal-body">
                        <div class="alert bg-warning text-center">
                            <strong>ATTENTION !</strong> VOULEZ - VOUS VRAIMENT SUPPRIMER ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger btn-ok">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	
        <script src="js/bootstrap-table.js"></script>
        <script>
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        </script>
    </body>

</html>
