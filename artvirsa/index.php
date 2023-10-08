 <?php include 'header.php';
 include 'db/conn.php'; ?>
 <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area" style="position: sticky;" >
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li  >
              <div class="seq-model">
                <img data-seq src="img/slider/1.jpg" style="width: 100%;" alt="ArtVirsa Art Collection" />
              </div>
              <div class="seq-title"><br><br>
              <h1 style="color:white;font-size:50px" >ArtVirsa Collection</h1>                

                <a data-seq href="products.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/2.jpg" alt="ArtVirsa Art Collection" />
              </div>
              <div class="seq-title">
                <h1 style="color:white;font-size:50px" >ArtVirsa Collection</h1>                
                <a data-seq href="products.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
        
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/3.jpg" alt="ArtVirsa Art Collection" />
              </div>
              <div class="seq-title">
                <h1 style="color:white;font-size:50px" >ArtVirsa Collection</h1>                
                <a data-seq href="products.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
        
                            
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
  <!-- / slider -->
  <!-- Start Promo section -->

  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <br><br>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php 
                      
                        $product=mysqli_query($conn,"select * from item_master  ORDER BY RAND () LIMIT 8");
                        while($row=mysqli_fetch_array($product)){
                        
                        ?>
                        <li >
                        
                          <figure>

                          <?php  
                            $img=mysqli_query($conn,"select * from item_img where item_id = '".$row[0]."' limit 1");
                            while($item_row=mysqli_fetch_array($img)){
                            
                            
                             ?>
                              <div class="card">
                            <a class="aa-product-img" href="product_details.php?id=<?php echo $row[0] ?>"><img src="img/item_img/<?php echo $item_row[2] ?>" style="width: 100%;height: 250px;" alt="artvirsa collection images"></a>
                              </div>
                            <?php }?>
                         <form action="" method="post">
                         <?php if($row['item_qty'] == 0){?>
                          <a class="aa-add-card-btn" href="?out_of_stock"><span class="fa fa-close"></span> OUT OF STOCK</a>

                          <?php
                         }else{ ?>
                         <a class="aa-add-card-btn" href="?addtobag=<?= $row[0]?>"><span class="fa fa-shopping-cart"></span>Add To Bag</a>
                          <?php } ?>
                            </form>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $row[4] ?></a></h4>
                              <span class="aa-product-price">RS.<?php echo $row[6] ?></span>
                             
                              
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="?wishlist=<?php echo $row[0]; ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                           -->
                          </div>
                          <!-- product badge -->
                        </li>
                        <?php }
                        if(isset($_GET['wishlist'])){
                          $W_ID=$_GET['wishlist'];

                          $select_wish=mysqli_query($conn,"select * from wishlist where item_id= '".$W_ID."' ");
                          if(mysqli_num_rows($select_wish) > 0 ){

                          }else{
                            if($_SESSION['user_id']==''){
                              echo "<script>window.location.href ='registration.php'</script>";
                            }else{
                              if($_SESSION['email']==''){
                                echo "<script>window.location.href ='registration.php'</script>";
                              }else{
                          $Wsql=mysqli_query($conn,"insert into wishlist (item_id,user_id) VALUES('$W_ID','".$_SESSION['user_id']."')");
                          echo "<script>window.location.href ='index.php'</script>";
                              }
                            }
                        }
                      }

                        ?>

                        <?php 
                    
                    if(isset($_GET['addtobag'])){
                      $pro_id=$_GET['addtobag'];
                      
                      $pro_sql=mysqli_query($conn,"select item_price from item_master where id = '".$pro_id."'");
                      $row2=mysqli_fetch_array($pro_sql);

                      if($_SESSION['email']==''){
                        echo "<script>window.location.href ='registration.php'</script>";
                      }else{
                        

                        $user_id=$_SESSION['user_id'];
                        $qty= 1;
                        
                        $price= $row2[0];

                        $select_cart=mysqli_query($conn,"select * from cart where product_id= '".$pro_id."' ");
                        if(mysqli_num_rows($select_cart) > 0 ){
                          ?>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script>
                                            
                                            swal({  
                                          title: " Your item is Already Exists in Bag",  
                                          text: "Go to Bag",  
                                          icon: "error",  
                                          button: "oh no!",  
                                        });  
                      
                                            setTimeout(function(){
                                                window.location.href = 'index.php';
                                                }, 1200);
                                                
                                        </script>
                  <?php
                        }else{


                          $cart_sql=mysqli_query($conn,"insert into cart(user_id,product_id,quantity,price) values('$user_id','$pro_id','$qty','$price')");
                          ?>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script>
                                            
                                            swal("Add to Bag!", "Successfully ❤️️");
                      
                                            setTimeout(function(){
                                                window.location.href = 'index.php';
                                                }, 700);
                                                
                                        </script>
                  <?php
                        }


                      }

                    }




                    ?>
                    
                 
                          
                      </ul>
                      <a class="aa-browse-btn" href="products.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    
                  
                  </div>
                  <!-- quick view modal -->                  
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">                      
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">                              
                              <div class="aa-product-view-slider">                                
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                              <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="" id="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                        
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="img/banner2.png" style="height: 80px;width: 100%;" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" style="font-size: 13px;" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab" style="font-size: 13px;">Featured</a></li>
                <li><a href="#latest" data-toggle="tab" style="font-size: 13px;">Top Selling</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <?php 
                    $popular=mysqli_query($conn,"select * from item_master where item_popular=1");
                    while($popular_row=mysqli_fetch_array($popular)){
                    ?>
                  <!-- start single product item -->
                    <li>
                      <figure>
                      <?php 
                    $popular_img=mysqli_query($conn,"select * from item_img where item_id='".$popular_row[0]."' limit 1");
                    while($popular_img_row=mysqli_fetch_array($popular_img)){
                    ?>




                        <a class="aa-product-img" href="product_details.php?id=<?php echo $popular_row[0] ?>"><img src="img/item_img/<?php echo $popular_img_row[2] ?>" style="width: 100%;height: 250px;" alt="polo shirt img"></a>
                      
                      
                        <?php } ?>
                        <?php if($popular_row['item_qty'] == 0){?>
                          <a class="aa-add-card-btn" href="?out_of_stock"><span class="fa fa-close"></span> OUT OF STOCK</a>

                          <?php
                         }else{ ?>
                        <a class="aa-add-card-btn" href="?addtobag=<?= $popular_row[0]?>"><span class="fa fa-shopping-cart"></span>Add To Bag</a>
                        <?php } ?>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#"><?php echo $popular_row[4] ?></a></h4>
                          <span class="aa-product-price">RS.<?php echo $popular_row[6] ?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="?wishlist=<?php echo $popular_row[0]; ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                             -->
                      </div>
                      <!-- product badge -->
                    </li>
                    <?php } ?>
                                                       
                  </ul>
                  <a class="aa-browse-btn" href="products.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                   
                 <?php 
                    $feature=mysqli_query($conn,"select * from item_master where item_feature=1");
                    while($feature_row=mysqli_fetch_array($feature)){
                    ?>
                    <li>
                      <figure>
                      <?php 
                    $feature_img=mysqli_query($conn,"select * from item_img where item_id='".$feature_row[0]."' limit 1");
                    while($feature_img_row=mysqli_fetch_array($feature_img)){
                    ?>
                        <a class="aa-product-img" href="product_details.php?id=<?php echo $feature_row[0] ?>"><img src="img/item_img/<?php echo $feature_img_row[2] ?>" style="width: 100%;height: 250px;" alt="polo shirt img"></a>
                       <?php } ?>               
                       <?php if($feature_row['item_qty'] == 0){?>
                          <a class="aa-add-card-btn" href="?out_of_stock"><span class="fa fa-close"></span> OUT OF STOCK</a>

                          <?php
                         }else{ ?>       
                       <a class="aa-add-card-btn" href="?addtobag=<?= $feature_row[0]?>"><span class="fa fa-shopping-cart"></span>Add To Bag</a>
                       <?php }?> 
                       <figcaption>
                          <h4 class="aa-product-title"><a href="#"><?php echo $feature_row[4] ?></a></h4>
                          <span class="aa-product-price">RS. <?php echo $feature_row[6] ?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="?wishlist=<?php echo $feature_row[0]; ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> -->
                      </div>
                      <!-- product badge -->
                      <!-- <span class="aa-badge aa-hot" href="#">HOT!</span> -->
                    </li> 
                         <?php } ?>                                                                            
                  </ul>
                  <a class="aa-browse-btn" href="products.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                    <?php 
                    $item_top_selling=mysqli_query($conn,"select * from item_master where item_top_selling=1");
                    while($item_top_selling_row=mysqli_fetch_array($item_top_selling)){
                    ?>
                    <li>
                      <figure>
                      <?php 
                    $item_top_selling_img=mysqli_query($conn,"select * from item_img where item_id='".$item_top_selling_row[0]."' limit 1");
                    while($item_top_selling_img_row=mysqli_fetch_array($item_top_selling_img)){
                    ?>
                        <a class="aa-product-img" href="product_details.php?id=<?php echo $item_top_selling_row[0] ?>"><img src="img/item_img/<?php echo $item_top_selling_img_row[2] ?>" style="width: 100%;height: 250px;" alt="polo shirt img"></a>
                       <?php } ?>        
                       <?php if($item_top_selling_row['item_qty'] == 0){?>
                          <a class="aa-add-card-btn" href="?out_of_stock"><span class="fa fa-close"></span> OUT OF STOCK</a>

                          <?php
                         }else{ ?>                  
                       <a class="aa-add-card-btn" href="?addtobag=<?= $item_top_selling_row[0]?>"><span class="fa fa-shopping-cart"></span>Add To Bag</a>
                       <?php }?> 
                       <figcaption>
                          <h4 class="aa-product-title"><a href="#"><?php echo $item_top_selling_row[4] ?></a></h4>
                          <span class="aa-product-price">RS. <?php echo $item_top_selling_row[6]  ?></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="?wishlist=<?php echo $item_top_selling_row[0]; ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> -->
                      </div>
                      <!-- product badge -->
                      <!-- <span class="aa-badge aa-hot" href="#">HOT!</span> -->
                    </li> 
                         <?php } ?>              
                  
                                                                                                  
                  </ul>
                   <a class="aa-browse-btn" href="products.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4 style="font-size: 15px;"  >FREE SHIPPING</h4>
          
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4 style="font-size: 15px;" >30 DAYS MONEY BACK</h4>
              
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4 style="font-size: 15px;"  >SUPPORT 24/7</h4>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12"  style="">
        <div id="app"></div>

<script src="src/index.js">
</script>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->






<?php include 'footer.php' ?>