<?php

include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET["cover"])){
    $id = $_GET["id"];
    $image_name = $_GET["cover"];
    $path = "../images/books/".$image_name;
    $remove = unlink($path);

    $sql = "DELETE FROM tbl_book where id=$id";
   
    // Execute Query
    
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE){
      //Session Variable to display Message
      $_SESSION['book'] = "<div class='success'>Book Deleted Successfully</div>";
      header("Location: ".SITEURL."admin/manage-book.php");
    }else{
        $_SESSION['book'] = "<div  class='error'>Error In Deleting Book</div>";
        header("Location: ".SITEURL."admin/manage-book.php");
    }


}else{
    $_SESSION['book'] = "<div  class='error'>Unauthorized Access</div>";
    header("Location: ".SITEURL."admin/manage-book.php");
}




?>