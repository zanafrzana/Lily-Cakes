<?php

//start session
session_start();

//create constant
define('SITEURL', 'http://localhost/lilycakes/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lilycakes');

//database connection
$connect = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
//database selection
$db_select = mysqli_select_db($connect, DB_NAME) or die(mysqli_error());

?>