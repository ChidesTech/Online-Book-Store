<?php
include('../config/constants.php');

$_SESSION = array();

session_destroy();

unset($_SESSION);
header("Location: ".SITEURL."admin/login.php");
?>