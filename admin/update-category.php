<?php include ("/partials/header.php")?>
<div class="main-content">
    <div class="wrapper">
       
<?php

       $id = $_GET["id"];
       $sql = "SELECT * FROM tbl_category where id=$id ";
       $res = mysqli_query($conn, $sql);
        //Check whether Query is executed or not
        if($res==TRUE){
            // Count Rows to check if we have data in the database or not
            $count = mysqli_num_rows($res);  //To get all the rows n database
     


      if($count>0){
     
        while($rows= mysqli_fetch_assoc($res)){
         $title = $rows["title"];
         
        }
        

       
        }
    }
        ?>
       
       
        
        <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Update Category</h2>

            <form action=""  method="post"  class="order">
               <fieldset>
                    <legend>New Detail</legend>
                    <div class="order-label">Name Of Category</div>
                    <input type="text"  value="<?php echo $title?>" name="title" placeholder="Enter Name" class="input-responsive" required>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                  
                    <input type="submit" name="submit" value="Update" class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
       
        </div>
    </div>

<?php include "/partials/footer.php"?>
<?php
       if(isset($_POST["submit"])){

        $title = mysqli_real_escape_string($conn,$_POST["title"]);
        $id = $_POST["id"];
      
         //SQL Query 
       $sql2 = "UPDATE tbl_category SET
        title = '$title'
        WHERE id=$id
         ";
   //   Save in Database
   $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
   // ;
    
   if($res2==TRUE){
     $_SESSION['category'] = "<div class='success'>Category Updated Successfully</div>";
     header("Location: ".SITEURL."admin/manage-category.php");
   
   }else{
       $_SESSION['category'] = "<div class='error'>Error In Adding Category</div>";
       header("Location: ".SITEURL."admin/manage-category.php");
   }
       }
       
       
       ?>