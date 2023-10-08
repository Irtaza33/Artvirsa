<?php 

include 'header.php';
include 'db/conn.php';


if(isset($_GET['search'])){

    $word=mysqli_real_escape_string($conn,$_GET['search']);

    $word=strtolower($word);
    $WORD=strtoupper($word);
    $Word=ucwords($word);
	$_SESSION['wrd1'] = $word; 
	$_SESSION['wrd2'] = $WORD; 
	$_SESSION['wrd3'] = $Word; 

    $countSql="SELECT count(id) FROM `item_master`";
    $tot_result=mysqli_query($conn,$countSql);
    $row=mysqli_fetch_row($tot_result);
    $limit = 12;
    $total_records=$row[0];
    $total_pages=ceil($total_records/$limit);
    if (isset($_GET["page"])) {
        $page  = $_GET["page"]; 
        } else {
            $page=1;
            };
    $start_from = ($page-1) * $limit;



    $sql=mysqli_query($conn,"select * from item_master where item_name LIKE '%$word%' AND item_name LIKE '%$WORD%' AND item_name LIKE '%$Word%' Order by id DESC LIMIT $start_from, $limit");
    
}


?>


  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
               
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->

                <?php 
              
                
                if(mysqli_num_rows($sql) == 0){
                  echo "<p style='color:red;font-size:30px;text-align:center' >No Items Found !!</p>";
                }
                while($sql_row=mysqli_fetch_array($sql)){

                

                ?>



                <li>
                  <figure>
                  <?php 
                    $img=mysqli_query($conn,"select * from item_img where item_id='".$sql_row[0]."' limit 1");
                    while($img_row=mysqli_fetch_array($img)){
                    ?>
                    <a class="aa-product-img" href="product_details.php?id=<?php echo $sql_row[0] ?>"><img src="img/item_img/<?php echo $img_row[2] ?>" style="width: 100%;height: 250px;" alt="polo shirt img"></a>
                    <?php } ?>
                    <form action="" method="post">
                    <?php if($sql_row['item_qty'] == 0){?>
                          <a class="aa-add-card-btn" href=""><span class="fa fa-close"></span> OUT OF STOCK</a>

                          <?php
                         }else{ ?>  
                    <a class="aa-add-card-btn" href="?addtobag=<?= $sql_row[0]?>&search=<?php echo $_GET['search'] ?>"><span class="fa fa-shopping-cart"></span>Add To Bag</a>
                    <?php }?>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $sql_row[4] ?></a></h4>
                      <span class="aa-product-price">RS. <?php echo $sql_row[6] ?></span>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="?wishlist=<?php echo $sql_row[0]; ?>&search=<?php echo $_GET['search']?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <!-- <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                             -->
                  </div>
                  <!-- product badge -->
                </li>
                <?php }   ?>
         
                <?php 
                        if(isset($_GET['wishlist'])){
                          $W_ID=$_GET['wishlist'];

                          $select_wish=mysqli_query($conn,"select * from wishlist where item_id= '".$W_ID."' ");
                          if(mysqli_num_rows($select_wish) > 0 ){
                            echo "<script>window.location.href ='search.php?search=".$_GET['search']." ' </script>";

                          }else{
                            if($_SESSION['email']==''){
                              echo "<script>window.location.href ='registration.php'</script>";
                            }else{
                          $Wsql=mysqli_query($conn,"insert into wishlist (item_id,user_id) VALUES('$W_ID','".$_SESSION['user_id']."')");
                          echo "<script>window.location.href ='search.php?search=".$_GET['search']." ' </script>";
                            }
                        }
                      }

                        ?>                              
              </ul>
             
            </div>
          
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <?php 
              $article_group=mysqli_query($conn,"select * from article_group");
              while($row=mysqli_fetch_array($article_group)){ ?>
                <li><a href="article_group.php?id=<?= $row[0]?>"><?= $row[1]?></a></li>
                <?php }?>
              </ul>
            </div>
                     <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                <?php 
              
                $sql1=mysqli_query($conn,"select * from item_master limit 3");
                if(mysqli_num_rows($sql1) ==0){
                  echo "<p style='color:red;font-size:30px;text-align:center' >No Items Found !!</p>";
                }
                while($sql_row1=mysqli_fetch_array($sql1)){
                ?>
                  <li>
                  <?php 
                    $img1=mysqli_query($conn,"select * from item_img where item_id='".$sql_row1[0]."' limit 1");
                    while($img_row1=mysqli_fetch_array($img1)){
                    ?>
                    <a href="product_details.php?id=<?php echo $sql_row1[0] ?>" class="aa-cartbox-img"><img alt="img" style="width: 100px;height: 100px;" src="img/item_img/<?php echo $img_row1[2] ?>"></a>
                    <?php }?>
                    <div class="aa-cartbox-info">
                      <h4><a href="product_details.php?id=<?php echo $sql_row1[0] ?>"><?php echo $sql_row1[4] ?></a></h4>
                      <p style="color:#700f1a" >RS. <?php echo $sql_row1[6] ?></p>
                    </div>                    
                  </li>
                  <?php }?>
                                                
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
      
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
                                          title: " Your item is Already Exists in cart",  
                                          text: "Go to Cart",  
                                          icon: "error",  
                                          button: "oh no!",  
                                        });  
                      
                                            setTimeout(function(){
                                            window.location.href ='search.php?search=<?php echo $_GET['search'] ?>';

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
                                                window.location.href = 'search.php?search=<?php echo $_GET['search'] ?> ';
                                                }, 700);
                                                
                                        </script>
                  <?php
                        }


                      }

                    }




                    ?>
                    
      </div>
    </div>
  </section>
  <!-- / product category -->
<?php  include 'footer.php' ?>










