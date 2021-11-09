<?php 
session_start();
define('SITEURL', 'http://localhost/WEBPROG/Final_SecretShop');
define('SITEURL1', 'http://localhost/WEBPROG/Final_SecretShop/');
define('LOCALHOST','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'secret_shop');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME); 

if (mysqli_connect_error()) {
die("Database connection failed: " . mysqli_connect_error());
}
else
 echo "Ja DaytaBes Suksesfully Cunnected";?>