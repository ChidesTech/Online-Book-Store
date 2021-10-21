<?php include 'partials/header.php' ?>

<div class="main-content">
    <div class="wrapper">
    

        <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Add Category</h2>

            <form action=""  method="post"  class="order">
               <fieldset>
                    <legend>Category Detail</legend>
                    <div class="order-label">Name Of Category</div>
                    <input type="text" name="title" placeholder="Enter Name" class="input-responsive" required>
                   <input type="submit" name="submit" value="Add " class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
       <?php
       if(isset($_POST["submit"])){

        $title = str_replace(" ", "_",mysqli_real_escape_string($conn,$_POST["title"]));

       
   
      
         //SQL Query 
       $sql = "INSERT INTO tbl_category SET
        title = '$title'
         ";
   //   Save in Database
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   // ;
    
   if($res==TRUE){
     $_SESSION['category'] = "<div class='success'>Category Added Successfully</div>";
     header("Location: ".SITEURL."admin/manage-category.php");
   
   }else{
       $_SESSION['category'] = "<div class='error'>Error in adding Category</div>";
       header("Location: ".SITEURL."admin/add-category.php");
   }
       }
       
       
       ?>
        </div>
    </div>




<?php include 'partials/footer.php' ?>
