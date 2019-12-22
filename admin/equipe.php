<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';

session_start();
$msg = '';
if (isset($_SESSION['id'])) {
    if (filter_input(INPUT_GET, 'delete')) {
        $condition = array("ID_EQUIP" => filter_input(INPUT_GET, 'delete'));
        if (delete($connection, "EQUIPE", $condition)) {
            $msg = '<div class="alert bg-success text-center">
                       <strong>Succès !</strong> Equipe a été bien supprimé !.
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
        <title>Equipes</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap-table.css" rel="stylesheet" />
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
                    <h1 class="page-header">Equipe</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <?= $msg; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des équipes
                            <a href="nvequipe.php" class="btn btn-default pull-right"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Nouveau</a>
                        </div>
                        <div class="panel-body">
                            <table data-toggle="table" data-url="#" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th class="text-center" data-field="id" data-sortable="true">Numéro d'équipe</th>
                                        <th class="text-center" data-field="nom" data-sortable="true">Nom d'équipe</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $equipes = read($connection, "EQUIPE", array("*"), array());
                                    foreach ($equipes as $equipe) :
                                        ?>
                                        <tr>
                                            <td><?= $equipe["ID_EQUIP"]; ?></td>
                                            <td><?= $equipe["LIB_EQUIP"]; ?></td>
                                            <td>
                                                <a href="voirequipe.php?id=<?= $equipe["ID_EQUIP"]; ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="modequipe.php?id=<?= $equipe["ID_EQUIP"]; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" data-href="equipe.php?delete=<?= $equipe["ID_EQUIP"]; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i></a>
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
