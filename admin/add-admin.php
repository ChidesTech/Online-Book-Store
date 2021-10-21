<?php include ("/partials/header.php")?>
<div class="main-content">
    <div class="wrapper">
      
<?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
       unset( $_SESSION['admin']);
         }
        ?>
        
        <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Add Admin</h2>

            <form action=""  method="post" class="order">
               <fieldset>
                    <legend>Admin Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter Full Name" class="input-responsive" required>
                    <div class="order-label">Username</div>
                    <input type="text" name="username" placeholder="Enter Username" class="input-responsive" required>
                    <div class="order-label">Password</div>
                    <input type="password"  name="password" placeholder="Enter Password" class="input-responsive" required>
                   

                   <input type="submit" name="submit" value="Add " class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
       
        </div>
    </div>

<?php include "/partials/footer.php"?>
<?php 
    // FORM VALUATION;

    if(isset($_POST['submit'])){
     $full_name =mysqli_real_escape_string($conn,$_POST["full_name"]);
     $username = mysqli_real_escape_string($conn,$_POST["username"]);
     $password = md5($_POST["password"]);

      //SQL Query 
    $sql = "INSERT INTO tbl_admin SET
     full_name = '$full_name',
     username = '$username',
     password = '$password'
      ";
//   Save in Database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// ;
 
if($res==TRUE){
  $_SESSION['admin'] = "<div class='success'>Admin Added Successfully</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");

}else{
    $_SESSION['admin'] = "<div class='error'>Error in adding Admin</div>";
    header("Location: ".SITEURL."admin/add-admin.php");
}
    }
?>
