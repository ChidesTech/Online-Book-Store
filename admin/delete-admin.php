<?php
  include('../config/constants.php');
  if(isset($_GET['id'])){
//Get the id of admin to be deleted
 $id = $_GET["id"];
//Create SQL query to delete admin

$sql = "DELETE FROM tbl_admin where id=$id";

// Execute Query

$res = mysqli_query($conn, $sql);

if($res == TRUE){
  //Session Variable to display Message
  $_SESSION['admin'] = "<div class='success'>Admin Deleted Successfully</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");
}else{
    $_SESSION['admin'] = "<div  class='error'>Error in Deleting Admin</div>";
    header("Location: ".SITEURL."admin/manage-admin.php");
}

  }
//Redirect to manage-admin.php with success or failure message
else{
  $_SESSION['admin'] = "<div class='error'>Unauthorized Access</div>";
  header("Location: ".SITEURL."admin/manage-admin.php");
}


?>