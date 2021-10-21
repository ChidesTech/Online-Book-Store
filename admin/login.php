<?php
  include('../config/constants.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Document</title>
</head>
<body>
    <section class="menubar">
        <div class="container">
        <div class="logo">
          <!-- <img class="responsive-image" src="images/hero1.jpg"  alt=""></div> -->
         <a href="../index.php"> <i style="color: #5cfdb2; margin-left:-2rem; font-size:2rem;font-family:san-serif;font-weight: bolder; text-transform: uppercase" class=" "> ChidesBooks</i>
         </a>
          </div>
        <div class="menu text-right">
           <ul>
               <li><a href="../index.php">Home</a> </li>
               <li><a href="../category.php">Categories</a> </li>
               
               <li><a href="">Login</a> </li>
            </ul>
        </div>
    <div class="clearfix"></div>

    </div>
    </section>



<div class="container-log">
     <!-- <img class="fas fa-book-reader" src="../images/hero1.jpg" alt="">  -->
     <i class="fas fa-book-reader"></i>
    <h2>Login</h2>
    <?php
if(isset($_SESSION['login'])){
    echo  $_SESSION['login'];
    unset( $_SESSION['login']);
      }
if(isset($_SESSION['unauthorized'])){
    echo  $_SESSION['unauthorized'];
    unset( $_SESSION['unauthorized']);
      }
?>
    <form action="" method="post">
        <label >Username</label>
    <input type="text" required name="username" placeholder="Username">
    <label >Password</label>
    <input type="password" required name="password" placeholder="Password">
   <button type="submit" name="submit"><span>Login</span></button>
    </form>
</div>
    <!-- <form  method="post">
    <input type="text" name="username" placeholder="Username">
    <br>
    <br>
    <input type="password" name="password" placeholder="Password">
    <br>
    <br>
    <input type="submit" name="submit" class="btn-primary" value="login" placeholder="Password">

    </form> -->
   
</div>

    </body>
</html>

<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1){
        $_SESSION['user'] = $username;

       header("Location: ".SITEURL."admin/");


    }else{
       $_SESSION['login'] = "<div class='error'>Invalid Login Credentials</div>";
       header("Location: ".SITEURL."admin/login.php");

    }

}

?>