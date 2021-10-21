<?php include("partials-client/header.php");?>
    <main>
    <section class="categories">
      <div class="container">
      <ul class="category-books top-category">
    <a  href="<?php echo SITEURL?>category.php"><li><div >All</div></li></a> 
        
      <?php
          $sql = "SELECT * FROM tbl_category  ";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          if($count>0){
         while($rows= mysqli_fetch_assoc($res)){
                  $id= $rows["id"];
                  $title= $rows["title"];
                  ?>
    <a  href="<?php echo SITEURL?>category.php?category_id=<?php echo $id?>"><li><div > <?php echo $title?></div></li></a> 
<?php
     }
}
          ?>
  
  
        
        
        
      </div> 
    </section> 
    <section class="food-menu">
        <!-- <div class="container"> -->

     
      <ul class="books">
      <?php
    if(isset($_GET["category_id"])){
      $category_id = $_GET['category_id'];
      $sql1 = "SELECT * FROM tbl_book WHERE category_id=$category_id";
          $res1 = mysqli_query($conn, $sql1);
          $count1 = mysqli_num_rows($res1);
          if($count1>0){
         while($row1= mysqli_fetch_assoc($res1)){
                  $id= $row1["id"];
                  $title= $row1["title"];
                  $author= $row1["author"];
                  $details= $row1["book_details"];
                  $price= $row1["price"];
                  $cover= $row1["image_name"];
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
              <a href="order.php?book_id=<?php echo $id?>" class="btn">ORDER NOW</a >
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
}



    }else{
      $sql2 = "SELECT * FROM tbl_book ";
      $res2 = mysqli_query($conn, $sql2);
      $count2 = mysqli_num_rows($res2);
      if($count2>0){
     while($row2= mysqli_fetch_assoc($res2)){
              $id= $row2["id"];
              $title= $row2["title"];
              $author= $row2["author"];
              $details= $row2["book_details"];
              $price= $row2["price"];
              $cover= $row2["image_name"];
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
}


      
    }
    
    
    ?>
 
 
 
 </ul>
      
<div class="clearfix"></div>
<!-- </div> -->
    </section>
    </main>
<?php include("partials-client/footer.php");?>
   