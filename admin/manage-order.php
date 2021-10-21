<?php include 'partials/header.php' ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Orders</h1>
    <br>
    <?php
         if(isset($_SESSION['order'])){
          echo  $_SESSION['order'];
          unset( $_SESSION['order']);
          echo "<br>";
          echo "<br>";
            }
        
        ?>
       
    <table class="tbl-full">
       

<?php
     $sql = "SELECT * FROM tbl_order";
     $res = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($res);
     $sn = 1;

     if($count>0){
     echo " <tr>
     <th>S.N</th>
     <th>Book</th>
     <th>Qty</th>
     <th>Total</th>
     <!-- <th>Date</th> -->
     <th>Name</th>
     <th>Contact</th>
     <th>Address</th>
     <th>Email</th>
     <th>Actions</th>
  </tr>";
       while($row = mysqli_fetch_assoc($res)){
        $id = $row['id'];
        $book = $row['book'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_address = $row['customer_address'];
        $customer_email = $row['customer_email'];

        ?>
  <tr>
             <td><?php echo $sn++?></td>
             <td><?php echo $book?></td>
             <td><?php echo $qty?></td>
             <td><?php echo $total?></td>
             <!-- <td><?php echo $order_date?></td> -->
             <td><?php echo $customer_name?></td>
             <td><?php echo $customer_contact?></td>
             <td><?php echo  $customer_address?></td>
             <td><?php echo $customer_email?></td>
            
             <td>
                 <a style="padding:7%" href="<?php echo SITEURL?>admin/delete-order.php?id=<?php echo $id?>" class="btn-danger icon"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
         

        <?php
       }

     }else{

        echo "<div class='error'>No Orders Yet.</div>";
     }

?>
       
        
    </table>
    </div>
</div>
<?php include 'partials/footer.php' ?>