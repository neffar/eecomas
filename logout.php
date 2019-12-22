<?php

require_once 'includes/DBHandler.php';

session_start();
session_unset();
session_destroy();
redirect('index.php');
