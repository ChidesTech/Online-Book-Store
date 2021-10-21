<?php  include("config/constants.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=SITEURL?>css/all.min.css">

    <title>Chides Books</title>
</head>
<body>
    <section class="menubar">
        <div class="container">
        <div class="logo">
          <!-- <img class="responsive-image" src="images/hero1.jpg"  alt=""></div> -->
         <a href="index.php"> <i style="color: #5cfdb2; margin-left:-2rem; font-size:2rem; font-weight:600; font-family:san-serif" class=" "> CHIDESBOOKS</i>
         </a>
          </div>
        <div class="menu text-right">
           <ul>
               <li><a href="index.php">Home</a> </li>
               <li><a href="category.php">Categories</a> </li>
               <!-- <li><a href="about.php">About</a> </li> -->

               <?php if(isset($_SESSION['user'])){
    ?>
              <li><a href="<?php echo SITEURL?>admin/">Dashboard</a></li>
      <?php
      }else{
          ?>
              <li><a href="<?php echo SITEURL?>admin/login.php">Login</a></li>
<?php
      }
      ?>
            </ul>
        </div>
    <div class="clearfix"></div>

    </div>
    </section>