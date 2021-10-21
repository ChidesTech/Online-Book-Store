
   <?php
    include "/partials/header.php";
    ?>

    <!-- Main Content -->

    <div class="main-content">
    
    <div class="wrapper">
        <!-- <h1>Dashboard</h1> -->
        <br>

<div class="flex">
<div class="col-4 text-center">
<?php
$sql = "SELECT * FROM tbl_category";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

?>
   <h1><span class="text-black"><?php echo $count?></span> <span style="color:black"   class="fa fa-clipboard"></h1>
   <br>
<span class="text-black">
Categories
</span>
</div>
<div class="col-4 text-center">
<?php
$sql1 = "SELECT * FROM tbl_book";
$res1 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($res1);

?>
   <h1><span class="text-black"><?php echo $count1?></span>  <span style="color:black"   class="fa fa-book"></h1>
   <br>
<span class="text-black">
Books 
</span>
</div>
<div class="col-4 text-center">
<?php
$sql2 = "SELECT * FROM tbl_order";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);

?>
   <h1><span  class="text-black"><?php echo $count2 ?></span> <span style="color:black"   class="fa fa-shopping-cart"></span></h1>
   
   <br>
<span class="text-black">
Total Orders 
</span>
</div>
<div class="col-4 text-center">
<?php
$sql3 = "SELECT SUM(total) AS Total FROM tbl_order";
$res3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($res3);
 $income  = $row["Total"];

?>
   <h1><span class="text-black">₦<?php echo $income ?></span> <span style="color:black"   class="fas fa-money-bill-wave"></span></h1>
   <br>
<span class="text-black">
Total Income
</span>
</div>




<div class="clearfix"></div>
</div>
        </div>
    </div>


    <!-- Footer -->
    

    <?php
    include "/partials/footer.php"
    ?>

</body>

</html>