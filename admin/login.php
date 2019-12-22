<?php
require_once '../includes/DBConnection.php';
require_once '../includes/DBHandler.php';
session_start();
$msg = '';
if (filter_input(INPUT_POST, 'submit')) {
    $username = filter_input(INPUT_POST, 'username');
    $password = md5(filter_input(INPUT_POST, 'password'));
    $col = array("*");
    $condition = array("LOGIN_ADMIN" => $username, "MDP_ADMIN" => $password);
    $data = read($connection, "ADMIN", $col, $condition);

    if (!empty($data)) {
        foreach ($data as $d) {
            $_SESSION['id'] = $d["ID_ADMIN"];
            $_SESSION['username'] = $d["LOGIN_ADMIN"];
        }
        redirect('index.php');
    } else {
        $msg = '<div class="alert alert-danger text-center">
                    <span>Username et/ou le mot de pass incorrect!</span>
                </div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN_EECOMAS</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Log in</div>
                    <div class="panel-body">
                        <?= $msg; ?>
                        <form method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	
    </body>

</html>
