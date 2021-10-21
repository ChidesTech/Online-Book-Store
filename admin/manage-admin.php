<?php include ("/partials/header.php")?>
<!-- Main Content -->
   <div class="main-content">
    <div class="wrapper">
        <!-- <h1>Admins</h1> -->
        <?php
        if(isset($_SESSION['admin'])){
       echo  $_SESSION['admin'];
       unset( $_SESSION['admin']);
         }
       
         
        if(isset($_SESSION['user-not-found'])){
          echo  $_SESSION['user-not-found'];
          unset( $_SESSION['user-not-found']);
            }
        if(isset($_SESSION['passwords-dont-match'])){
          echo  $_SESSION['passwords-dont-match'];
          unset( $_SESSION['passwords-dont-match']);
            }
        if(isset($_SESSION['change-password'])){
          echo  $_SESSION['change-password'];
          unset( $_SESSION['change-password']);
            }
        ?>
        <br><br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br>
        <br>
    <table class="tbl-full">
       

        
       <?php
        $sql = "SELECT * FROM tbl_admin ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
       
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        echo " <tr>
        <th>S.N</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
     </tr>";
       while($rows= mysqli_fetch_assoc($res)){
        $id = $rows["id"];
        $full_name = $rows["full_name"];
        $username = $rows["username"];
         ?>
 
       <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $full_name; ?></td>
          <td><?php echo $username; ?></td>
          
          <td>
              <!-- <a href="<?php echo SITEURL?>admin/update-password.php?id=<?php echo $id?>" class="btn-primary"> Change Password</a> -->
              <a style="padding:2%" href="<?php echo SITEURL?>admin/update-admin.php?id=<?php echo $id?>" class="btn-primary"> <i class="fa fa-edit"></i></a>
              <a style="padding:2%" href="<?php echo SITEURL?>admin/delete-admin.php?id=<?php echo $id?>" class="btn-danger"><i class="fa fa-trash-alt"></i></a>
         </td>
     </tr>
         <?php
        
    }
         

      }else{
      echo "<h4 class='error'>No Admin Added</h4>";

      }

        }

        
        ?>
        
        
        
    </table>
        </div>
    </div>


    <!-- Footer -->
    

    <?php
    include "/partials/footer.php"
    ?>
</body>

</html>