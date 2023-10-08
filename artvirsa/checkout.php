<?php include 'header.php';

if($_SESSION['email'] == ''){
  echo "<script>window.location.href ='registration.php'</script>";

}?>
  <!-- catg header banner section -->
  <!-- <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 
 <section id="checkout"><br><br>
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                  <a href="cart.php"><img src="img/back.png" style="width: 30px;" alt=""></a>

                  <div class="row">
            <div class="col-md-3 col-xs-6">
                            <h4 class="news_let"   style="font-weight: bold;">
                            <h4><b>Billing Address</b></h4>

                            </h4>
                            <ul class="ft_conte">
                                <li style="text-transform: capitalize" >
                                No Address found
                                </li>
                            </ul>
                        </div> 

            </div><br>
            <div class="row">
            
            <div class="col-md-3 col-xs-6">
                            <h4 class="news_let"   style="font-weight: bold;">
                            <h4><b>Shipping Address</b></h4>

                            </h4>
                            <ul class="ft_conte">
                                <li style="text-transform: capitalize" >
                               
                                <?php 
                                $Bquery1=mysqli_query($conn,"select * from billing_address where user_id ='".$_SESSION['user_id']."'");
                                $rows=mysqli_fetch_array($Bquery1);
                              
                                if($rows[0] == ''){ ?>
                                No Address found
                                <?php } ?>
                                
                            </li>
                            </ul>
                        </div> 
                        
                        <div class="col-md-3 col-xs-6" style="float: right;" >
                        <br>
                            <a href="myaccount.php?add_address" class="btn btn-danger Hbtn" id="redBtn" style="padding: 15px;"  > NEW ADDRESS </a>
                        </div> 
                        
            </div><br><br>
               
            <?php 
            $Bquery=mysqli_query($conn,"select * from billing_address join city on city.city_id = billing_address.city where user_id ='".$_SESSION['user_id']."'");
            while($row=mysqli_fetch_array($Bquery)){
                // echo $row[0]; 
                $_SESSION['billing_id']=$row[0];
                            
            ?>


            
            <div style="border-style: solid;border-width: 1px;" >
              
            <div style="padding-left: 70px;"><br>

            
               <input id="radio<?php echo $row[0] ?>" value="<?php echo $row[0] ?>"  name="radio_a" type="radio" <?php if( $row[11] == 1 ){echo "checked";} ?>>
               <!-- <input type="hidden" name="id" id="id" value="<?php echo $row[0] ?> " > -->

            <label for="radio<?php echo $row[0] ?>" style="width:100%" >

                   <?php if($row[11] == 1 ){ ?> 

                <p style="font-size: 13px;color:#700f1a" >Selected as default</p>
               <?php } ?>

               
                <p style="text-transform: capitalize;"><b><?php echo $row[2] ?></b></p> <br>  
                <span style="text-transform: capitalize;font-weight:500;" ><?php echo $row[3] ?> <?php echo $row[4] ?></span><br>
                <p style="font-size: 13px;font-weight: 400;" >
                <?php echo $row[7] ?>, <?php echo $row[8] ?><br>
                <?php echo $row[9] ?> ,<?php echo $row[10] ?> , <?php echo $row['city_title'] ?>
                </p>
               <a href="myaccount.php?address&id=<?php echo $row[0]; ?>" style="color: #700f1a;" ><b>DELETE</b></a>
                <br></div>
                <h3 id="result"></h3>

            </div>
        </label>
            
            <br>
<br><br>


            <?php } ?>
            </form>
            <script>

                function radioget(getValue){
                    document.getElementById('result').innerHTML=getValue;
                }

        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var radio_a = $(this).val();
                
                $.ajax({
                    url: "insert2.php",
                    method: "POST",
                    data: {
                        radio_a : radio_a,
                       
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
        });
    </script>
                   <style>
            .Hbtn{
                background-color: #700f1a;
                border-color: #700f1a;
            }
            .Hbtn:hover{
                background-color: white;
                color: #700f1a;
                border-color:#700f1a ;
            }
            #redBtn{
          height: 55px;
          width: 150px;
          border-radius: 0;
        }
        </style> 
                  </div>
                  
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $cart_sql=mysqli_query($conn,"select * from cart join item_master on item_master.id = cart.product_id where user_id ='".$_SESSION['user_id']."'");
                       $count=mysqli_num_rows($cart_sql);
                        while($row=mysqli_fetch_array($cart_sql)){
                          $_SESSION['pro_id']=$row[2];
                          $_SESSION['qty']=$row[3];
                          $_SESSION['pro_price']=$row['item_price'];
                          $_SESSION['total_price']=$row[4];
                        ?>
                      <tr>
                          <td><?php echo $row['item_name'] ?> <strong> x  <?php echo $row[3] ?></strong></td>
                          <td>RS. <?= $row[4]?></td>
                        </tr>
                        <?php }?>
                      </tfoot>
                    </table>
                  </div><br>
                  <form action="" method="post">
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">    
                    <div class="radio-group">                
                          <?php 
                          $payment_sql=mysqli_query($conn,"select * from payment_method");
                          while($Prow=mysqli_fetch_array($payment_sql)){
                          ?>
                    <label for="check<?php echo $Prow[0] ?>"><input type="checkbox" id="check<?php echo $Prow[0] ?>" value="<?php echo $Prow[0] ?>" name="payment_method" > <?php echo $Prow[1] ?></label>
                
                    <?php } ?>
                    </div>
<br>                    
                    <button  class="aa-browse-btn" style="width: 100%;" name="btn_order" >Place Order</button>        
                         
                  </div>
                </form>
                

                <?php 
              if(isset($_POST['btn_order'])){
             
                
                 
                  $user_id=$_SESSION['user_id'];
                  $payment_id=$_POST['payment_method'];

                  if($payment_id==''){
                    ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                  <script>
                                      
                                      swal({  
                                    title: "Your Payment Method is Empty",  
                                    icon: "error",  
                                    button: "OK",  
                                  });  
                
                                      setTimeout(function(){
                                          window.location.href = 'checkout.php';
                                          }, 1000);
                                          
                                  </script>
            <?php
                  }else{

              


                  $billing=mysqli_query($conn,"select * from billing_address where user_id='".$user_id."' AND extra1= 1 ");
                  $billing_row=mysqli_fetch_array($billing);
                  $billing_id=$billing_row[0];
                  if($billing_id == ''  ){
                    ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                  <script>
                                      
                                      swal({  
                                    title: "Your Billing Address is Empty Please Add your Billing Address First",  
                                    icon: "error",  
                                    button: "OK",  
                                  });  
                
                                      setTimeout(function(){
                                          window.location.href = 'checkout.php';
                                          }, 4000);
                                          
                                  </script>
            <?php
                } else{
                  
                  


                  $order_sql=mysqli_query($conn,"select * from cart join item_master on item_master.id = cart.product_id where user_id ='".$_SESSION['user_id']."'");

                  $order_insert=mysqli_query($conn,"insert into orders (user_order_id,order_status) VALUES('".$_SESSION['user_id']."','pending')");
                  
                  $order_select=mysqli_query($conn,"select * from orders order by O_id DESC");
                  $order_srow=mysqli_fetch_array($order_select);



                  while($order_row=mysqli_fetch_array($order_sql)){

                  $product_id=$order_row[2];
                  $qty=$order_row[3];
                  $pro_price=$order_row['item_price'];      
                 $total_price=$qty*$pro_price;



                $insert_sql=mysqli_query($conn,"INSERT INTO `order_details`( `product_id`, `quantity`, `product_price`, `total_price`, `payment_id`,`billing_id`,`order_status`,`U_order_id`) 
                Values('$product_id','$qty','$pro_price','$total_price','$payment_id','$billing_id','pending','$order_srow[0]'
                
                )");
                            }
                            
                        

                          

               ?>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            
                            swal("ORDER SUCCESSFULLY PLACED", "THANK YOU ❤️️");
      
                            setTimeout(function(){
                                window.location.href = 'bag.php';
                                }, 1500);
                                
                        </script>
               <?php 
                  $delete_cart=mysqli_query($conn,"delete from cart where user_id='".$_SESSION['user_id']."'");
              } }}
                ?>

                </div>
              </div>
            </div>
        <script>$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});</script>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php include 'footer.php' ?>