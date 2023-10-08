<?php include 'header.php';



include '../db/conn.php';

if(isset($_POST['btn_submit'])){
  $article=$_POST['article'];
  $cat=$_POST['category'];
  $subCat=$_POST['subcategory'];
 $itemName=$_POST['item_name'];
 $des=mysqli_real_escape_string($conn,$_POST['description1']);
 $itemPrice=$_POST['item_price'];
 $itemDis=$_POST['item_discount'];
 $itemQty=$_POST['item_qty'];
 $itemfeature=$_POST['feature'];
 $popular=$_POST['popular'];
 $topselling=$_POST['top_selling'];
  $sqlProduct=mysqli_query($conn,"insert into item_master(article_group,category,sub_cat_id,item_name,item_description,item_price,item_qty,item_discount,item_feature,
  item_popular,item_top_selling) VALUE('$article','$cat','$subCat','$itemName','$des','$itemPrice','$itemQty','$itemDis','$itemfeature','$popular','$topselling')");

  $sql1="SELECT id FROM item_master WHERE item_name='$itemName'";
  $item_id=0;
  $res1=$conn->query($sql1);

  while($row1=$res1->fetch_array()){
      $item_id=$row1['id'];
  }
 
      $error=array();
      $extension=array("jpeg","jpg","png","gif");
      foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    


    $file_name=$_FILES["files"]["name"][$key];
          $file_tmp=$_FILES["files"]["tmp_name"][$key];

          // if filename is null, insert 'null' in IMG_URL 
          
    if(empty($file_name))
    {
      $sql9="INSERT INTO item_img(item_id) values('$item_id')";
      $res9=$conn->query($sql9);
    }
    // insert image in item_imgs table
    else
    {	
         
          $ext=pathinfo($file_name,PATHINFO_EXTENSION);
          if(in_array($ext,$extension)) {
              if(!file_exists("../img/item_img/".$file_name)) {
                  $sql2="INSERT INTO item_img(item_id,item_image) values('$item_id','$file_name')";
        //echo '<br>sql2:'.$sql2;
                  if($res2=$conn->query($sql2)){
                      move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../img/item_img/".$file_name);
                      
                  }
              }
              
              else {
                  $filename=basename($file_name,$ext);
                  $newFileName=$filename.time().".".$ext;
                  $sql3="INSERT INTO item_img(item_id,item_image) values('$item_id','$file_name')";
        //echo '<br>sql3:'.$sql3;
                  if($res3=$conn->query($sql3)){
                  move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../img/item_img/".$newFileName);
                 
              }
              }
          }
        } 
          
  }
      

  ?>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            
                            swal("Product Uploaded!", "Successfully ❤️️");
      
                            setTimeout(function(){
                                window.location.href = 'show_product.php';
                                }, 700);
                                
                        </script>
  <?php

}



?>

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">New Item Entry</h4>

                  <script>
                    function getCategory(val){
                      $.ajax({
                        type: "POST",
                        url: "getCategory.php",
                        data: 'category_id='+val,
                        success:function(data){
                          $("#category").html(data);
                          getSubcat();
                        }
                      })
                    }

                    
                    function getsubCategory(val){
                      $.ajax({
                        type: "POST",
                        url: "getsubCategory.php",
                        data: 'subCat_id='+val,
                        success:function(data){
                          $("#subcategory").html(data);
                          getSubcat();
                        }
                      })
                    }

                  </script>
                  
                  <form class="forms-sample" method="post" enctype="multipart/form-data" >


                  <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="exampleInputName1">Article Group</label>
                      <select name="article" id="article" class="form-control" onChange="getCategory(this.value);" required >
                      <option value="">Select Article Group</option>
                      <?php 
                      $sql=mysqli_query($conn,"select * from article_group");
                      while($article=mysqli_fetch_array($sql)){
                      ?>
                <option value="<?php echo $article['AG_id'] ?>"><?php echo $article['AG_des'] ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select name="category" id="category" class="form-control" onChange="getsubCategory(this.value);" required >
                      <option value="">Select Category</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="exampleInputName1">Sub Category</label>
                      <select name="subcategory" id="subcategory" class="form-control" required >
                      <option value="">Select Sub Category</option>
                      </select>
                    </div>
                    </div>
                  </div>
                    
                    

                  <div class="row">
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Name</label>
                      <input type="text" class="form-control" name="item_name" id="exampleInputUsername1" placeholder="Item name" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Price</label>
                      <input type="number" class="form-control" name="item_price" id="exampleInputUsername1" placeholder="Item Price" required>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Discount</label>
                      <input type="number" class="form-control" name="item_discount" id="exampleInputUsername1" placeholder="Item Discount" >
                    </div>
                    
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Quantity</label>
                      <input type="number" class="form-control" name="item_qty" id="exampleInputUsername1" placeholder="Item Quantity" required>
                    </div>
                    
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-3"><br>
                    <input type="checkbox" name="feature" id="group1" value="1" title="Main List" />
                    <label for="group1">Feature Product</label><br>
                    <input type="checkbox" name="popular" id="group2" value="1" title="Main List" />
                    <label for="group2">Popular Product</label><br>

                    <input type="checkbox" name="top_selling" id="group3" value="1" title="Main List" />
                    <label for="group3">Top Selling Product</label>
                    
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Description</label>
                      <input type="text" class="form-control" name="description1"  placeholder="Item Description" required>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Images</label>
                      <input type="file" accept="images/*" name="files[]" multiple class="form-control" id="exampleInputUsername1" title="Add Item Images" required placeholder="Item Images">
                    </div>
                    </div>
                  </div>
               <br><br>
                    <button type="submit" class="btn btn-primary mr-2 Hbtn" name="btn_submit" id="redBtn" >Submit</button>
                    <a href="show_product.php" class="btn btn-warning  " style="padding:20px ;" id="redBtn">Show Products</a>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<style>
    #redBtn{
          height: 55px;
          width: 150px;
          border-radius: 0;
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
</style>
<?php include 'footer.php' ?>
