<?php

require 'config.php';

//Database connection String
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* check connection */
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}