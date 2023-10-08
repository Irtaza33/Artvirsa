<?php 


if(isset($_GET['id'])){
  $cart_id=$_GET['id'];
  $qty=$_POST['qty'];
  
    $update_cart=mysqli_query($conn,"update cart set quantity='$qty' where product_id='".$cart_id."' ");
  
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    swal("Cart Updated", "Successfully ❤️️");

setTimeout(function(){
  window.location.href = 'cart.php';
  }, 700);
                        
                </script>
<?php
}
?>

