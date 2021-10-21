<?php include ("/partials/header.php")?>
<div class="main-content">
    
<?php

       $id = $_GET["id"];
       $sql = "SELECT * FROM tbl_admin where id=$id ";
       $res = mysqli_query($conn, $sql);
        //Check whether Query is executed or not
        if($res==TRUE){
            // Count Rows to check if we have data in the database or not
            $count = mysqli_num_rows($res);  //To get all the rows n database
     


      if($count>0){
     
        while($rows= mysqli_fetch_assoc($res)){
         $full_name = $rows["full_name"];
         $username = $rows["username"];
        }
        

        if(isset($_SESSION['update-admin'])){
       echo  $_SESSION['update-admin'];
       unset( $_SESSION['update-admin']);
         }
        }
    }
        ?>
        <!-- <form action="" method="post">
           <table class="tbl-30">
               <tr>
                   <td>Full Name</td>
                   <td><input  type="text" value="<?php echo $full_name?>" name="full_name" placeholder="Full Name" ></td>
               </tr>
               <tr>
                   <td>Username</td>
                   <td><input type="text" value="<?php echo $username?>" name="username" placeholder="Username" ></td>
               </tr>
               
               <tr>
                <td  >
           <input type="hidden" name="id"  value="<?php echo $id?>" >

                       <input type="submit" name="submit" class="btn-primary" value="Update" ></td>
               </tr>
           </table>

        </form> -->
        <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Update Admin</h2>

            <form action=""  method="post" class="order">
               <fieldset>
                    <legend>Admin Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" value="<?php echo $full_name?>" name="full_name"  placeholder="Enter Full Name" class="input-responsive" required>
                    <div class="order-label">Username</div>
                    <input type="text" value="<?php echo $username?>" name="username" placeholder="Enter Username" class="input-responsive" required>
                    <div class="order-label">Password</div>
                    <input type="password"  name="password" placeholder="Enter Password" class="input-responsive" required>
           <input type="hidden" name="id"  value="<?php echo $id?>" >
                   

                   <input type="submit" name="submit" value="Update" class="btn ">
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
     $full_name = mysqli_real_escape_string($conn,$_POST["full_name"]);
     $username = mysqli_real_escape_string($conn,$_POST["username"]);
     $id = $_POST["id"];
     $password = md5($_POST["password"]);

      //SQL Query 
    $sql = "UPDATE tbl_admin SET
     full_name = '$full_name',
     username = '$username'
     WHERE id=$id
      ";
//   Save in Database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// ;
 
if($res==TRUE){
  $_SESSION['update-admin'] = "<div class='success'>Admin Updated Successfully</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");

}else{
    $_SESSION['update-admin'] = "<div class='error'>Error in Updating Admin</div>";
    header("Location: ".SITEURL."admin/add-admin.php");
}
}
?>
