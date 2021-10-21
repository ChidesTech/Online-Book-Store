

<?php if(isset($_GET["book_id"])){
  include("config/constants.php");

   $book_id = $_GET["book_id"];
  $sql = "SELECT * FROM tbl_book WHERE id=$book_id";
  $res = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
  if($count==1){
   $row = mysqli_fetch_assoc($res);
   $title = $row["title"];
   $cover = $row["image_name"];
   $price = $row["price"];

  }else{
    header("Location: index.php");
  }

}else{
  header("Location: index.php");

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chides Books</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?=SITEURL?>css/all.min.css">

    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="menubar">
        <div class="container">
        <!-- <div class="logo">
          <img class="responsive-image" src="images/hero1.jpg"  alt=""></div> -->
          <div class="logo">
          <!-- <img class="responsive-image" src="images/hero1.jpg"  alt=""></div> -->
         <a href="index.php"> <i style="color: #5cfdb2; margin-left:-2rem; font-size:2rem; font-family:san-serif; font-weight: bolder" class=" "> ChidesBooks</i>
         </a>
          </div>
        <div class="menu text-right">
           <ul>
               <li><a href="index.php">Home</a> </li>
               <li><a href="category.php">Categories</a> </li>
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
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-top text-green">Fill this form to confirm your order.</h2>

            <form method="post" class="order">
                <fieldset>
                    <legend>Selected Book</legend>

                    <div class="food-menu-img">
                        <img src="./images/books/<?php echo $cover?>" alt="" class="img-responsive img-curve">
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="book-order"><?php echo $title?></h3>
                        <input type="hidden" name="book" value="<?php echo $title?>">
                        <p class="book-price">₦<?php echo $price?></p>
                        <input type="hidden" name="price" value="<?php echo $price?>">
                         
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" min="0" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter Full Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter Phone Number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter E-mail" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="3" placeholder="Enter Address" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

<?php
  if(isset($_POST["submit"])){
    $book = $_POST["book"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $total = $price * $qty;
    $order_date = date("d-m-y");
    $status="Ordered";
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    
$sql2 = "INSERT INTO tbl_order SET
  book = '$book',
  price = $price,
  qty = $qty,
  total = $total,
  order_date = '$order_date',
  status = '$status',
  customer_name = '$full_name',
  customer_contact = '$contact',
  customer_email = '$email',
  customer_address = '$address'

";

    $res2 = mysqli_query($conn, $sql2);
  if($res2==true){
    $_SESSION["order"] = "<div class=' success'>Order Successfully Sent.</div>";
     header("Location: index.php");
     
  }else{
    $_SESSION["order"] = "<div class='error'>Your Order Wasn't Sent, Try Again.</div>";
  header("Location: index.php");
    
  }
  }

?>

        </div>
    </section>
   
    <?php include("partials-client/footer.php");?>
