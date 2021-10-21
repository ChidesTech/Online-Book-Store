<?php
session_start();


define('SITEURL', 'http://localhost/Book-Order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'book-order');
// define('SITEURL', 'https://chidesbooks.herokuapp.com/');
//  define('LOCALHOST', 'us-cdbr-east-04.cleardb.com');
//  define('DB_USERNAME', 'bd18e35131968a');
//  define('DB_PASSWORD', 'af64c243');
//  define('DB_NAME', 'heroku_332532f2cbe223f');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME)  or die(mysqli_error());
?>