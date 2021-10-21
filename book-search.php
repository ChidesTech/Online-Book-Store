<?php include("partials-client/header.php");
 $search = mysqli_real_escape_string($conn,$_POST["search"]);

?>



    <section class="food-search text-center">
        <div class="container">
            <h1 class="results">
            Showing Results For "<?php echo $search?>"

            </h1>    
</div>
    </section>
    
    <section class="food-menu">
       
      <ul class="books">
      <?php
if(isset( $_POST["search"])){
   $sql = "SELECT * FROM tbl_book where title LIKE '%$search%' OR author LIKE '%$search%' ";
   $res = mysqli_query($conn, $sql);
   $count = mysqli_num_rows($res);
   if($count>0){
    while($row= mysqli_fetch_assoc($res)){
      $id= $row["id"];
      $title= $row["title"];
      $author= $row["author"];
      $details= $row["book_details"];
      $price= $row["price"];
      $cover= $row["image_name"];
      ?>

<li>
 <div class="book">
                <img src="./images/books/<?php echo $cover?>" alt=""/>
                <div class="book-name"><?php echo $title;?></div>
                <div class="author-price"> 
                 <div class="category"> <?php echo $author;?></div>
                 <div class="price">₦<?php echo $price;?></div>
                </div>
                <!-- <p  class="book-category">African Literature</p> -->

              <div class="rating-review"> 
   <p> <?php if($details!=""){echo substr($details,0,150);}else{echo "A very nice book<br/><br/>Do well to get a copy<br/>";}?> ...</p>   

                </div>
                <div class="addtocart">
              <a href="order.php?book_id=<?php echo $id?>" class="btn">ORDER NOW</a>
            </div>
                <!-- Hover -->
                 <div class="hover">
                 <div class="flex-right addtocart">
                 <button style="border-radius: 20px 3px 3px 3px"  class="btn"><i style="padding:.1rem 1rem; " class="fa fa-info"></i></button>
            </div>
                <div class="info">
                  <p><?php echo $title;?></p>
                  <p> <?php if($details!=""){echo substr($details,0,780);}else{echo "A very nice book, do well to get a copy";}?> ...</p>   
              <!-- <div class="addtocart">
                <button class="btn-reverse">ORDER NOW</button>
              </div> -->
                      </div>
                      
              </div>
           <!-- Hover End -->
              
             
 </div>
                 
        </li> 






<?php
}


   }else{
     echo "<h1>No Results Found</h1>";
   }






}







 else{
  header("Location: index.php");
    
 }

?>
 
 
 
<div class="clearfix"></div>
<!-- </div> -->
    </section>
    <?php include("partials-client/footer.php");?>
