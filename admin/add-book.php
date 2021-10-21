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
    }



?>

<div class="main-content">
<div class="wrapper">



<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-top text-white">Add Book</h2>
            <?php
  if(isset($_SESSION["book"])){
      echo $_SESSION["book"];
      unset($_SESSION["book"]);

}?>
            <form   method="post" enctype="multipart/form-data" class="order">
               <fieldset>
                    <legend>Book Details</legend>
                    <div class="order-label">Title</div>
                    <input type="text" name="title" placeholder="Enter Book Title" class="input-responsive" required>
                    <div class="order-label">Author</div>
                    <input type="text" name="author" placeholder="Enter Book Author" class="input-responsive" required>
                    <div class="order-label">Description</div>
                    <textarea name="description" rows="3" placeholder="Enter Book Description" class="input-responsive" ></textarea>
                    <div class="order-label">Price</div>
                    <input type="number" min="0" name="price" placeholder="Enter Price" class="input-responsive" required>
                    <div class="order-label">Select Image</div>
                    <input type="file"  class="input-responsive" required  name="image" >
                    <div class="order-label">Category</div>
                    <select class="input-responsive" required name="category" id="">
<?php
    $sql = "SELECT * FROM tbl_category ";
    $res= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count>0){
    while($rows=mysqli_fetch_assoc($res)){
    $id = $rows["id"];
    $title = $rows["title"];
    ?>
    <option value="<?php echo $id?>"><?php echo $title?></option>
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
                    Yes<input type="radio" name="featured" value="Y" >
                    No <input type="radio"name="featured" value="N"  >
                   </div>
                   <input type="submit" name="submit" value="Add" class="btn ">
                </fieldset>

            </form>

        </div>
    </section>
<?php
  if(isset($_POST["submit"])){
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author =  mysqli_real_escape_string($conn,$_POST["author"]);
    $description =  mysqli_real_escape_string($conn,$_POST["description"]);
    $price = $_POST["price"];
    $category =  mysqli_real_escape_string($conn,$_POST["category"]);

if(isset($_POST["featured"])){
  $featured = $_POST["featured"];
}else{
  $featured = "Yes";
    
}



if(isset($_FILES["image"]["name"])){
    $image_name = $_FILES["image"]["name"];
    
    if($image_name!= ""){

     $ext = strtolower(end(explode(".", $image_name)));
     $image_name = "book".uniqid("", true).".".$ext;
     $tmp = $_FILES["image"]["tmp_name"];
     $destination = "../images/books/".$image_name;
     $upload = move_uploaded_file($tmp, $destination);
     if($upload == false ){
        
        $_SESSION["book"] = "<div class='error'>Failed To Upload the Image</div>";
     header("Location: ".SITEURL."admin/add-book.php");

        die();
     }
    }
}else{

    $image_name = "";
}


 if($image_name){

    $sql2 = "INSERT INTO tbl_book SET
      title = '$title',
      author = '$author',
      book_details = '$description',
      price = $price,
      image_name = '$image_name',
      category_id = $category,
      featured = '$featured'

    ";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true){
        $_SESSION["book"] = "<div class='success'>Book Added Successfully</div>";
        header("Location: ".SITEURL."admin/manage-book.php");

    }else{
        $_SESSION["book"] = "<div class='error'>Failed To Add Book</div>";
        header("Location: ".SITEURL."admin/manage-book.php");


    }
}else{
    $_SESSION["book"] = "<div class='error'>Please Select An Image</div>";
    header("Location: ".SITEURL."admin/add-book.php");

}

















 }
// if(isset($_POST["submit"])){
//     $title = mysqli_real_escape_string($conn,$_POST["title"]);
//     $author =  mysqli_real_escape_string($conn,$_POST["author"]);
//     $description =  mysqli_real_escape_string($conn,$_POST["description"]);
//     $price = $_POST["price"];
//     $category =  mysqli_real_escape_string($conn,$_POST["category"]);

// if(isset($_POST["featured"])){
//   $featured = $_POST["featured"];
// }else{
//   $featured = "Y";
    
// }
//  if(isset($_FILES['image'])){
// 		$file_name = $_FILES['image']['name'];   
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
       
   
//    $url =   $result->get('ObjectURL');
   
//           $sql2 = "INSERT INTO tbl_book SET
//           title = '$title',
//           author = '$author',
//           book_details = '$description',
//           price = $price,
//           image_name = '$url',
//           category_id = $category,
//           featured = '$featured'
  
//         ";
  
//         $res2 = mysqli_query($conn, $sql2);
  
//         if($res2==true){
//             $_SESSION["book"] = "<div class='success'>Book Added Successfully</div>";
//             header("Location: ".SITEURL."admin/manage-book.php");
  
//         }else{
//             $_SESSION["book"] = "<div class='error'>Failed To Add Book</div>";
//             header("Location: ".SITEURL."admin/manage-book.php");
  
  
//         }
     
//   }else{
//       $_SESSION["book"] = "<div class='error'>Please Select An Image</div>";
//       header("Location: ".SITEURL."admin/add-book.php");
  
//   }
  

















//  }






?>


</div>
</div>






















<?php include 'partials/footer.php' ?>
