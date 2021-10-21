<?php include 'partials/header.php' ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Categories</h1>
       
        <?php
         if(isset($_SESSION['category'])){
          echo  $_SESSION['category'];
          unset( $_SESSION['category']);
            }
        
        ?>
        <br><br>
        <a href="<?php echo SITEURL?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br>
        <br>
    <table class="tbl-full">
    <?php
        $sql = "SELECT * FROM tbl_category ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
           
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        echo "<tr>
        <th>S.N</th>
        <th>Name</th>
       
        <th>Actions</th>
     </tr>";
       while($rows= mysqli_fetch_assoc($res)){
        $id = $rows["id"];
        $title = $rows["title"];
       
         ?>
 
       <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
         
          
          <td>
              <a style="padding:3%" href="<?php echo SITEURL?>admin/update-category.php?id=<?php echo $id?>" class="btn-primary icon"><i class="fa fa-edit"></i></a>
              <a style="padding:3%" href="<?php echo SITEURL?>admin/delete-category.php?id=<?php echo $id?>" class="btn-danger icon"><i class="fa fa-trash-alt"></i></a>
         </td>
     </tr>
         <?php
        
    }
         

      }else{
      echo "<h4 class='error'>No Category Added</h4>";

      }

        }

        
        ?>
    </table>
    </div>
</div>
<?php include 'partials/footer.php' ?>