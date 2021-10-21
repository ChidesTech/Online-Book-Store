<?php include("partials-client/header.php");?>
<main>
    <section class="food-search text-center">
        <div class="container">
          <div class="hero">
            <h1 class="rotate">Chides B<span class="o1 ">o</span><span class=" o2">o</span>ks</h1>
            <p>Bringing the most entertaining books to you.</p>
          </div>
   
       <form action="book-search.php" method="post">

        <input type="search" required name="search" placeholder="Search For Your Favourite Books...">
        <input type="submit" name="submit" class="btn btn-reverse-search" value="Search">
       </form>
    </div>
    </section>
    <section class="box-group">
     
     <div class="box">
      
      <i class="fas fa-book-reader"></i>

      <div>
      <h2>Read Books</h2>
<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed corporis quam magni, error eveniet eaque odit nesciunt numquam magnam nobis. Pariatur, maiores. Ratione corrupti ab vel consectetur excepturi accusantium placeat!</h3>       </div>
    </div>
     <div class="box">
      
      <i class="fa fa-graduation-cap"></i>

      <div>
      <h2>Read Books</h2>
<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed corporis quam magni, error eveniet eaque odit nesciunt numquam magnam nobis. Pariatur, maiores. Ratione corrupti ab vel consectetur excepturi accusantium placeat!</h3>       </div>
    </div>
     <div class="box">
      
      <i class="fas fa-award"></i>

      <div>
      <h2>Read Books</h2>
<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed corporis quam magni, error eveniet eaque odit nesciunt numquam magnam nobis. Pariatur, maiores. Ratione corrupti ab vel consectetur excepturi accusantium placeat!</h3>       </div>
    </div>
    
    
    
    
    </section>
    <?php
     if(isset($_SESSION['order'])){
      echo  $_SESSION['order'];
      unset( $_SESSION['order']);
        }
    
    
    ?>
    <section class="categories">
      <div class="container">
      <h2 class="text-center">Categories</h2>
      <ul class="category-books">
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

           <!-- BOOKS -->

    </section> 
    
    <section class="food-menu">

      <h2 class="text-center">Best Sellers</h2>
      <ul class="books">
     
      <?php
          $sql2 = "SELECT * FROM tbl_book WHERE featured='Y'";
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
              <a  href="order.php?book_id=<?php echo $id?>" class="btn">ORDER NOW</a>
            </div>
                <!-- Hover -->
                 <div class="hover">
                 <div class="flex-right addtocart">
              <button style="border-radius: 20px 3px 3px 3px;"  class="btn"><i style="padding:.1rem 1rem; " class="fa fa-info"></i></button>
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
          ?>
 
 
 
 </ul>

<div class="clearfix"></div>
    </section>




    
    <section class="food-menu">

      <h2 class="text-center">Our Library</h2>
      <ul class="books">
      
 
      <?php
          $sql2 = "SELECT * FROM tbl_book WHERE featured='N'";
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
          ?>
 
 
 
 </ul>

<div class="clearfix"></div>
    </section>
    </main>
<?php include("partials-client/footer.php");?>
   