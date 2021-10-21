<?php include 'partials/header.php';
	require 'vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;
    try{
        $client = S3Client::factory([
            'credentials' => array(
            'key'    => "AKIA25HFT5X5JMGZFSEN",
            'secret' => "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",
            ),
            'region'  => 'ca-central-1',
            'version' => "latest"
        ]);
    }
    catch(Exception $e){
    die("Error: ". $e->getMessage());
    } ?>
<?php
if(isset($_GET["id"]) && isset($_GET["cover"])){
    $id = $_GET["id"];
    $image_name = $_GET["cover"];

    $sql3 = "SELECT * FROM tbl_book WHERE id=$id";
    $res3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($res3);
   $title = $row3["title"];
   $author = $row3["author"];
   $description = $row3["book_details"];
   $price = $row3["price"];
   $current_image = $row3["image_name"];
   $current_category = $row3["category_id"];
   $featured = $row3["featured"];

}else{
    $_SESSION["book"] = "<div class='error'>Unauthorized Access</div>";
    header("Location: ".SITEURL."admin/manage-book.php");
}
?>
<div class="main-content">
<div class="wrapper">



<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-top text-white">Update Book</h2>
            <?php
  if(isset($_SESSION["book"])){
      echo $_SESSION["book"];
      unset($_SESSION["book"]);

}?>
            <form action=""  method="post" enctype="multipart/form-data" class="order">
               <fieldset>
                    <legend>Book Details</legend>
                    <div class="order-label">Title</div>
                    <input type="text" name="title" value="<?php echo $title?>" placeholder="Enter Book Title" class="input-responsive" required>
                    <div class="order-label">Author</div>
                    <input type="text" name="author" value="<?php echo $author?>" placeholder="Enter Book Author" class="input-responsive" required>
                    <div class="order-label">Description</div>
<textarea name="description" rows="3" placeholder="Enter Book Description" class="input-responsive" ><?php echo $description;?></textarea>
                    <div class="order-label">Price</div>
                    <input type="number" min="0"  value="<?php echo $price?>" name="price" placeholder="Enter Price" class="input-responsive" required>
                    <div class="order-label">Select New Image (Optional)</div>
                    <input type="file"  class="input-responsive" name="image" >
                    <div class="order-label">Category</div>
                    <select class="input-responsive" required name="category" id="">
<?php
    $sql = "SELECT * FROM tbl_category ";
    $res= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count>0){
    while($rows=mysqli_fetch_assoc($res)){
    $category_id = $rows["id"];
    $title = $rows["title"];
    ?>
    <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id?>"><?php echo $title?></option>
<?php
 }
    }else{
        ?>
    <option value="0">No Category Added</option>
        
        <?php
    }
    ?>
    </select>
              <div class="radio">
                    <div class="order-label ">Featured</div>
                    Yes<input type="radio"name="featured" value="Y"  <?php if($featured=="Y"){echo "checked";}?>>
                    No <input <?php if($featured=="N"){echo "checked";}?> type="radio" name="featured" value="N"  >
                   </div>
                   <input type="hidden" name="id" value="<?php echo $id;?>">
                   <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                   <input type="submit" name="submit" value="Save Changes" class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
<?php
  if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $current_image = $_POST["current_image"];
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author =  mysqli_real_escape_string($conn,$_POST["author"]);
    $description =  mysqli_real_escape_string($conn,$_POST["description"]);
    $price = $_POST["price"];
    $category =  mysqli_real_escape_string($conn,$_POST["category"]);
   if(isset($_POST["featured"])){
  $featured = $_POST["featured"];
   }else{
    $featured = "Y";
    
  }

//  if(isset($_FILES['image'])){
     
// 		$file_name = $_FILES['image']['name']; 
//         if($file_name != ""){
// 	 	$temp_file_location = $_FILES['image']['tmp_name']; 
//          $ext = strtolower(end(explode(".", $file_name)));
//          $file_name = "book".uniqid("", true).".".$ext;
//         //  $tmp = $_FILES["image"]["tmp_name"];
    	
//             $result = $client->putObject(array(
// 	 		'Bucket' => 'chinwendubucket',
// 			 'Key'    => $file_name,
// 			 'SourceFile' => $temp_file_location,			
//            'ACL'    => 'public-read'		
//         ));
//         $url =   $result->get('ObjectURL');
//     }else{
//         $url = $current_image;
//     }

//         $sql2 = "UPDATE tbl_book SET
//         title = '$title',
//         author = '$author',
//         book_details = '$description',
//         price = $price,
//         image_name = '$url',
//         category_id = $category,
//         featured = '$featured'
//         WHERE id=$id
//       ";
  
//       $res2 = mysqli_query($conn, $sql2);
  
//       if($res2==true){
//           $_SESSION["book"] = "<div class='success'>Book Updated Successfully</div>";
//           header("Location: ".SITEURL."admin/manage-book.php");
  
//       }else{
//           $_SESSION["book"] = "<div class='error'>Failed To Update Book</div>";
//           header("Location: ".SITEURL."admin/manage-book.php");
  
  
//       }
//   }


if(isset($_FILES["image"]["name"])){
    $image_name = $_FILES["image"]["name"];
    
    if($image_name!= ""){

     $ext = strtolower(end(explode(".", $image_name)));
     $image_name = "book".uniqid("", true).".".$ext;
     $tmp = $_FILES["image"]["tmp_name"];
     $destination = "../images/books/".$image_name;
     $upload = move_uploaded_file($tmp, $destination);
    //  if($upload == false ){
        
    //     $_SESSION["book"] = "<div class='error'>Failed To Upload the Image</div>";
    //  header("Location: ".SITEURL."admin/add-book.php");

    //     die();
    //  }
    }else{

        $image_name = $current_image;
    }
}else{

    $image_name = $current_image;
}


  $sql2 = "UPDATE tbl_book SET
  title = '$title',
  author = '$author',
  book_details = '$description',
  price = $price,
  image_name = '$image_name',
  category_id = $category,
  featured = '$featured'
  WHERE id=$id
";

$res2 = mysqli_query($conn, $sql2);

if($res2==true){
    $_SESSION["book"] = "<div class='success'>Book Updated Successfully</div>";
     header("Location: ".SITEURL."admin/manage-book.php");

}else{
    $_SESSION["book"] = "<div class='error'>Failed To Update Book</div>";
    header("Location: ".SITEURL."admin/manage-book.php");



}


















 }


?>


</div>
</div>






















<?php include 'partials/footer.php' ?>
