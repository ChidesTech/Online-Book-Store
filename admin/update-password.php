<?php include ("/partials/header.php")?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
<br>
<?php

      $id = $_GET["id"];
     

        
    
        ?>

        <br>
        <form  method="post">
           <table class="tbl-30">
               <tr>
                   <td>Current Password</td>
                   <td><input  type="password"  name="current_password" required placeholder="Current Password" ></td>
               </tr>
               <tr>
                   <td>New Password</td>
                   <td><input type="password" required name="new_password" placeholder="New Password" ></td>
               </tr>
               <tr>
                   <td>Confirm Password</td>
                   <td><input type="password" required name="confirm_password" placeholder="Confirm Password" ></td>
               </tr>
               
               <tr>
                <td colspan="2" >
                  <input type="hidden" name="id"  value="<?php echo $id?>" >
                   <input type="submit"  name="submit" class="btn-primary" value="Update" ></td>
               </tr>
           </table>

        </form>
       
        </div>
    </div>

<?php include "/partials/footer.php"?>
<?php 
    // FORM VALUATION;

    if(isset($_POST['submit'])){
     $current_password = md5($_POST["current_password"]);
     $new_password = md5($_POST["new_password"]);
     $id = $_POST["id"];
     $confirm_password = md5($_POST["confirm_password"]);

     $sql = "SELECT * FROM tbl_admin where id=$id AND password='$current_password' ";
     $res = mysqli_query($conn, $sql);
      //Check whether Query is executed or not
      if($res==TRUE){
          // Count Rows to check if we have data in the database or not
          $count = mysqli_num_rows($res);  //To get all the rows n database
   


    if($count==1){
        if($new_password == $confirm_password){
            $sql2 = "UPDATE tbl_admin SET
             password = '$new_password'
                WHERE id=$id
                 ";
                  $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                  if($res2==TRUE){
                    $_SESSION['change-password'] ="<div class='success'>Password changed successfully</div>";
                    header("Location: ".SITEURL."admin/manage-admin.php");
                    
                     }else{
                        $_SESSION['change-password'] ="<div class='error'>Error in changing password</div>";
                        header("Location: ".SITEURL."admin/manage-admin.php");
                     }

        }else{
            $_SESSION['passwords-dont-match'] ="<div class='error'>The passwords don't match</div>";
            header("Location: ".SITEURL."admin/manage-admin.php");
        }

          
    }else{
        $_SESSION['user-not-found'] ="<div class='error'>User Not Found</div>";
        header("Location: ".SITEURL."admin/manage-admin.php");
    }
    }



}
?>
