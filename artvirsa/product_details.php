<?php 

include 'header.php';

include 'db/conn.php';

$id=$_GET['id'];
$_SESSION['p_id']=$id;?>
   <?php 
                $desSql=mysqli_query($conn,"select * from item_master join sub_category on sub_category.sub_cat_id = item_master.id where id= '".$id."'");
                $Drow=mysqli_fetch_array($desSql);
              
                ?>
  <!-- catg header banner section -->

  <section id="aa-catg-head-banner" >
    <img src="img/banner22.png" width="100%" height="300px" alt="">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $Drow[4]; ?></h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li><a href="#">Product</a></li>
          
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-6 col-sm-6 col-xs-12">                              
                <script>
    $(document).ready(function(){
  $('.customer-logos1').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: true,
    dots: true,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 400,
      settings: {
        slidesToShow: 1
      }
    }]
  });
});
  </script>
                <section id="aa-slider">
                      <div class="aa-slider-area">
                        <div id="sequence" class="seq">
                          <div class="seq-screen">
                            <ul class="customer-logos1 slider">
                              <!-- single slide item -->
                              <?php 
                              $slider=mysqli_query($conn,"select * from item_img where item_id='".$id."'");
                              while($Srow=mysqli_fetch_array($slider)){
                              ?>
                              <li>
                                <div class="">
                                  <img data-seq src="img/item_img/<?php echo $Srow[2] ?>" style="width: 100%;height: 600px;background-size: cover;" alt="Item Images" />
                                </div>
                                
                              </li>
                              <?php }?>
                              <!-- single slide item -->
                                                                      
                            </ul>
                          </div>
                          <!-- slider navigation btn -->
                          <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                            <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                            <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                          </fieldset>
                        </div>
                      </div>
                      
  </section>
  <style>
    #redBtn{
          height: 60px;
          width: 300px;
          border-radius: 0;
          padding: 18px;
        }
        .Hbtn{
                background-color: #700f1a;
                border-color: #700f1a;
            }
            .Hbtn:hover{
                background-color: white;
                color: #700f1a;
                border-color:#700f1a ;
            }
            /* -- quantity box -- */

.quantity {
 display: inline-block; }

.quantity .input-text.qty {
 width: 80px;
 height: 42px;
 padding: 0 5px;
 text-align: center;
 background-color: transparent;
 border: 1px solid #efefef;
}

.quantity.buttons_added {
 text-align: left;
 position: relative;
 white-space: nowrap;
 vertical-align: top; }

.quantity.buttons_added input {
 display: inline-block;
 margin: 0;
 vertical-align: top;
 box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
 padding: 7px 10px 8px;
 height: 42px;
 background-color: #ffffff;
 border: 1px solid #efefef;
 cursor:pointer;}

.quantity.buttons_added .minus {
 border-right: 0; }

.quantity.buttons_added .plus {
 border-left: 0; }

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
 background: #eeeeee; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
 -webkit-appearance: none;
 -moz-appearance: none;
 margin: 0; }
 
 .quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
 outline: none; }


</style>
<script>
  function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});
</script>
                </div><br><br>
                <div class="col-md-1 col-sm-1"></div>
                <!-- Modal view content -->
                <div class="col-md-5 col-sm-5 col-xs-12" style="" id="fixed" >
                  <div class="aa-product-view-content">
                    <h2  ><b style="font-size: 25px;" ><?php   echo $Drow[4]; ?></b></h2>
                    <p><?php   echo $Drow[5]; ?></p>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><b>RS. <?php   echo $Drow[6]; ?></b></span>
                     <?php if($Drow['item_qty'] == 0){
                      ?>
                      <br><br> <p class="aa-product-avilability">Avilability: <span style="color:red" >Out of stock</span></p>
                      <?php
                     } else{ ?>
                      <br><br> <p class="aa-product-avilability">Avilability: <span style="color:green" >In stock</span></p>
                     <?php }?>
                    </div>
                   
                    <div class="aa-prod-quantity">
                    <form action="" method="post">
                      <div class="quantity buttons_added" style="border-color:black" >
                      
	<input type="button" value="-" style="border-color:black" class="minus"  <?php if($Drow['item_qty'] == 0){echo "disabled";}?> ><input  type="number" step="1" min="1" max="<?php  echo $Drow['item_qty'];?>" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" style="border-color:black;"><input type="button" style="border-color:black" value="+" <?php if($Drow['item_qty'] == 0){echo "disabled";}?>  class="plus">        

  <a href="?wishlist=<?php echo $Drow[0]; ?>&wish=<?php echo $Drow[0];?>"><img src="img/heart.png" style="width: 30px;margin-left:15px ;margin-top: 5px;"  alt=""></a>                     
                    </div><br><br>
                    <?php 
                        if(isset($_GET['wishlist'])){
                          $W_ID=$_GET['wishlist'];

                          $select_wish=mysqli_query($conn,"select * from wishlist where item_id= '".$W_ID."' ");
                          if(mysqli_num_rows($select_wish) > 0 ){
                            echo "<script>window.location.href ='product_details.php?id=".$_GET['wish']." ' </script>";
                          }else{
                            if($_SESSION['email']==''){
                              echo "<script>window.location.href ='registration.php'</script>";
                            }else{
                          $Wsql=mysqli_query($conn,"insert into wishlist (item_id,user_id) VALUES('$W_ID','".$_SESSION['user_id']."')");
                          echo "<script>window.location.href ='product_details.php?id=".$_GET['wish']." ' </script>";
                            }
                        }
                      }

                        ?>
                    <p class="aa-prod-category">

                    <?php $CAT_sql=mysqli_query($conn,"select * from sub_category where sub_cat_id='".$Drow[3]."'");
                          $rowd=mysqli_fetch_array($CAT_sql); ?>
                        Category: <a href="#" style="color: #700f1a;" ><?php echo $rowd[2] ?></a>
                      </p><br>

                    <div class="aa-prod-view-bottom">
                      
                    <?php if($Drow['item_qty'] == 0){?>
                      <button class="btn btn-primary Hbtn" id="redBtn" name="" >OUT OF STOCK</button>
                      <?php }else {?>
                      <button class="btn btn-primary Hbtn" id="redBtn" name="add_to_bag" >ADD TO BAG</button>
                     <?php } ?>
                      </form>
                    <?php 
                    
                    if(isset($_POST['add_to_bag'])){
                      if($_SESSION['email']==''){
                        echo "<script>window.location.href ='registration.php'</script>";
                      }else{
                        $user_id=$_SESSION['user_id'];
                        $qty=$_POST['quantity'];
                        $price=$qty * $Drow[6 ];
                        $select_cart=mysqli_query($conn,"select * from cart where product_id= '".$id."' ");
                        if(mysqli_num_rows($select_cart) > 0 ){
                          ?>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script>
                                            
                                            swal({  
                                          title: " Your item is Already Exists in cart",  
                                          text: "Go to Cart",  
                                          icon: "error",  
                                          button: "oh no!",  
                                        });  
                      
                                            setTimeout(function(){
                                                window.location.href = 'product_details.php?id=<?php echo $id ?>';
                                                }, 1200);
                                                
                                        </script>
                  <?php
                        }else{


                          $cart_sql=mysqli_query($conn,"insert into cart(user_id,product_id,quantity,price) values('$user_id','$id','$qty','$price')");
                          ?>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script>
                                            
                                            swal("Add to Bag!", "Successfully ❤️️");
                      
                                            setTimeout(function(){
                                                window.location.href = 'product_details.php?id=<?php echo $id ?>';
                                                }, 700);
                                                
                                        </script>
                  <?php
                        }


                      }

                    }




                    ?>

                      <!-- <a class="" href="#">Wishlist</a> -->
                      <!-- <a class="aa-add-to-cart-btn" href="#">Compare</a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>
                                <?php echo $Drow[5] ?>

                  </p>
                 </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>Reviews for <?php echo $Drow[4] ?></h4> 
                   <ul class="aa-review-nav">
                   <?php 
                      $rquery=mysqli_query($conn,"select * from reviews where item_id='".$id."'");
                      if($rrr=mysqli_num_rows($rquery)==0){
                        echo "<p style='color:#700f1a' >No Reviews</p>";
                      }
                      
                      while($rrow=mysqli_fetch_array($rquery)){

                        
                      ?>
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <!-- <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a> -->
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong><?php echo $rrow[5] ?></strong> - <span><?php echo date('F jS Y', strtotime($rrow[3]));?></span></h4>
                            <div class="aa-product-rating">
                              <?php if($rrow[2]==1){ ?>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <?php } elseif($rrow[2]==2){ ?>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <?php }elseif($rrow[2]==3){ ?>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <?php }elseif($rrow[2]==4){ ?>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <?php }elseif($rrow[2]==5){ ?>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <?php }?>
                            </div>
                            <p><?php echo $rrow[1] ?></p>
                          </div>
                        </div>
                      </li>
                      <?php }?>
                   </ul>



                   <h4>Add a review</h4>
                   <?php  if($_SESSION['email']==''){
                    echo "<p >Please <a style='color:#700f1a'  href='registration.php' >Login</a> to Add Review</p>";
                   }
                   else{
                   ?>
                   <div>
                       <!-- review form -->
                       <form action="" method="post" class="aa-review-form">
          
                       <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="whatever1" class="rating-value" value="1">
                        <input type="hidden" name="whatever1" class="rating-value" value="2">
                        <input type="hidden" name="whatever1" class="rating-value" value="3">
                        <input type="hidden" name="whatever1" class="rating-value" value="4">
                        <input type="hidden" name="whatever1" class="rating-value" value="5">
                      
                      </div>
<style>
  .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: #ff6600;}
</style>
                <script>
                        var $star_rating = $('.star-rating .fa');

                        var SetRatingStar = function() {
                          return $star_rating.each(function() {
                            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                              return $(this).removeClass('fa-star-o').addClass('fa-star');
                            } else {
                              return $(this).removeClass('fa-star').addClass('fa-star-o');
                            }
                          });
                        };

                        $star_rating.on('click', function() {
                          $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                          return SetRatingStar();
                        });

                        SetRatingStar();
                        $(document).ready(function() {

                        });
                </script>
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message" name="message" required ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                      </div>

                      <button type="submit" id="redBtn" name="btnSubmit" class="btn btn-default Hbtn">Submit</button>
                   </form>
                   </div>
                   <?php }?>
                 </div>
                </div>            
              </div>
            </div>
            <?php 
              $_SESSION['idl']=$id;
            if(isset($_POST['btnSubmit'])){
              $item_idd=$id;
            
              $rating=$_POST['whatever1'];
              $message=$_POST['message'];
              $name=$_POST['name'];
              $email=$_POST['email']; 
              $review=mysqli_query($conn,"insert into reviews(Rev_description,ratings,item_id,Rev_name,Rev_email) VALUES('$message','$rating','$item_idd','$name','$email')");

              echo "<script>window.location.href ='product_details.php?id=".$_SESSION['idl']."'</script>";


            } ?>
            <!-- Related product -->
            <style>
    #redBtn{
          height: 55px;
          width: 150px;
          border-radius: 0;
        }
        .Hbtn{
                background-color: #700f1a;
                border-color: #700f1a;
                color:white;
            }
            .Hbtn:hover{
                background-color: white;
                color: #700f1a;
                border-color:#700f1a ;
            }
</style>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

  <?php include 'footer.php' ?>

