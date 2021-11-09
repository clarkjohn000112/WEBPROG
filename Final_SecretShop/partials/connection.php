<?php 
session_start();
define('SITEURL', 'http://localhost/final_secretshop');
define('SITEURL1', 'http://localhost/final_secretshop/');
define('LOCALHOST','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'secret_shop');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME); ?>