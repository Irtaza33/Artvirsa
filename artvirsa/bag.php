<?php include 'header.php';
include 'db/conn.php';
if($_SESSION['email'] == ''){
  echo "<script>window.location.href ='registration.php'</script>";

}
?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/cart.jpg" style="width: 100%;height: 20vw;" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>SHOPPING BAG PAGE</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li style="color:white">Bag</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->


 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                  
                        <th></th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                      </tr>
                  
                    </thead>


              
                    <tbody>
                        <?php
                        $cart_sql=mysqli_query($conn,"select * from cart join item_master on item_master.id = cart.product_id where user_id ='".$_SESSION['user_id']."'");
                        if(mysqli_num_rows($cart_sql) ==0){
                          echo "<p style='color:red;font-size:30px;text-align:center' >Your Shopping Bag Is Empty !!</p>";
                        }
                        
                        while($row=mysqli_fetch_array($cart_sql)){
                          $_SESSION['c_id']=$row[2];
                        
                          $_SESSION['item_price']=$row['item_price'];
                        ?>
                     
                      <tr>
                        <td style="display: none;" >
                          <?php echo $row[0]; ?>
                        </td>
                        <td>
                          
                        <a class="remove" href="?remove=<?php echo $row[0] ?>"><fa class="fa fa-close"></fa></a></td>
                          <?php 
                          $img=mysqli_query($conn,"select * from item_img join item_master on item_master.id = item_img.item_id where id ='".$row['id']."' limit 1 ");
                          $img_row=mysqli_fetch_array($img);
                          ?>
                        <td><a href="#"><img src="img/item_img/<?php echo $img_row[2] ?>" alt="img"></a></td>

                        <td><a class="aa-cart-title" href="#"><?php echo $row['item_name'] ?></a></td>
                        <td>RS. <span  id="itemPrice"><?php echo $row['item_price'] ?></span></td>


                        <td><input class="aa-cart-quantity" min="1" id="qtyy" max="<?php echo $row['item_qty'] ?>" type="number" name="qty" value="<?php echo $row[3] ?>">
                        
                        <a href="bag.php" class="btnSelect"> <img  src="img/save.png" style="width: 25px;height: 25px;" alt=""></a>

                      </td>

                      <script>
$(document).ready(function(){
	$(".btnSelect").on('click',function(){
		 var currentRow=$(this).closest("tr");
     

		 var id=currentRow.find("td:eq(0)").html();

    var price=currentRow.find("#itemPrice").html();

     var qty=currentRow.find("#qtyy").val();

      var total = price * qty;
      
    

     $.ajax({
			url: 'insertqty.php',
			dataType: "json",
			data: {qty1: qty , id1: id , price1: total},  
			cache: false,
			
		});
 
   
	}); 
});
 
</script>
                        <td><?php 
                       echo $price=$row['price'];
                       
                        ?></td>
                      </tr>
                      
                      <?php }
                          if(isset($_GET['remove'])){
                            $id= $_GET['remove'];
                            $remove=mysqli_query($conn,"delete from cart where id ='".$id."'");
                            ?>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                          <script>
                                              
                                              swal({  
                                            title: "Your Bag item is successfully Remove",  
                                            icon: "error",  
                                            button: "",  
                                          });  
                        
                                              setTimeout(function(){
                                                  window.location.href = 'bag.php';
                                                  }, 700);
                                                  
                                          </script>
                    <?php
                        }
                
                      ?>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">

                          <div class="aa-cart-coupon"><br><br><br>
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <div class="cart-view-total"style="float:right">
               <h4>Shopping Bag Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td><?php 
                     $total_price=mysqli_query($conn,"select sum(price) from cart where user_id='".$_SESSION['user_id']."'");
                        $total_row=mysqli_fetch_array($total_price);
                        echo "RS. ".$total_row[0];
                     ?></td>
                   </tr>
                  
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proceed to Checkout</a>
             </div>
                        </td>
                      </tr>
                      
                      </tbody>
                    
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <!-- <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td><?php 
                     $total_price=mysqli_query($conn,"select sum(price) from cart where user_id='".$_SESSION['user_id']."'");
                        $total_row=mysqli_fetch_array($total_price);
                        echo "RS. ".$total_row[0];
                     ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo "RS. ".$total_row[0]; ?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div> -->
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

<?php include 'footer.php' ?>