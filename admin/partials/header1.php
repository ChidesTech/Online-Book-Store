<?php
  include('../config/constants.php');
  if(!isset($_SESSION['user'])){
       
    $_SESSION['unauthorized'] = "<div class='error' >You are not authorized to access this page</div>";
    header("Location: ".SITEURL."admin/login.php");

      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="../css/admin1.css">
    <title>Admin Panel</title>
</head>
<body>
<div class="menu">
        <div class="wrapper">
        <ul>
            <li><a href="../index.php">Shop</a></li>
            <!-- <li><a href="index.php">Dashboard</a></li> -->
            <!-- <li><a href="manage-admin.php">Admins</a></li> -->
            <li><a href="manage-category.php">Categories</a></li>
            <li><a href="manage-book.php">Books</a></li>
            <li><a href="manage-order.php">Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
    </ul>
        </div>
    </div>

    
