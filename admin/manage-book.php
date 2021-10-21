<?php include 'partials/header.php' ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Books</h1>
    <br>
  <?php 
  // if(isset($_SESSION["add-book"])){
  //   echo $_SESSION["add-book"];
  //   unset($_SESSION["add-book"]);
  //   }
    if(isset($_SESSION["book"])){
      echo $_SESSION["book"];
      unset($_SESSION["book"]);
    }
      
?>
<br>
        <a href="<?php echo SITEURL?>admin/add-book.php" class="btn-primary">Add Book</a>
        <br>
        <br>
    <table class="tbl-full">
    <?php
        $sql = "SELECT * FROM tbl_book ";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
           
        $count = mysqli_num_rows($res);  $sn = 1;  
      if($count>0){
        echo "<tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Cover</th>
        <th>Author</th>
        <th>Price</th>
        <th>Featured</th>
       <th>Actions</th>
     </tr>";
       while($rows= mysqli_fetch_assoc($res)){
        $id = $rows["id"];
        $title = $rows["title"];
        $cover = $rows["image_name"];
        $price = $rows["price"];
        $author = $rows["author"];
        $featured = $rows["featured"];
       
         ?>
 
       <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
          <td><img height="60px" src="../images/books/<?php echo $cover; ?>" width="50px" alt=""></td>
          <td><?php echo $author; ?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo $featured; ?></td>
         
          
          <td>
              <a href="<?php echo SITEURL?>admin/update-book.php?id=<?php echo $id?>&cover=<?php echo $cover?>" class="btn-primary icon"><i class="fa fa-edit"></i></a>
              <a href="<?php echo SITEURL?>admin/delete-book.php?id=<?php echo $id?>&cover=<?php echo $cover?>" class="btn-danger icon"><i class="fa fa-trash-alt"></i></a>
         </td>
     </tr>
         <?php
        
    }
         

      }else{
      echo "<h4 class='error'>No Book Added</h4>";

      }

        }

        
        ?>
    </table>
    </div>
</div>
<?php include 'partials/footer.php' ?>