<?php 

include 'header.php';
include '../db/conn.php';
$QID=$_GET['id'];
$query=mysqli_query($conn,"select * from item_master 
join article_group on article_group.AG_id = item_master.article_group
join category on category.cat_id = item_master.category
join sub_category on sub_category.sub_cat_id = item_master.sub_cat_id

where id='".$QID."'");
$row=mysqli_fetch_array($query);



if(isset($_POST['btn_update'])){

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

    $sqlProduct=mysqli_query($conn,"update item_master set item_name='$itemName' , article_group='$article' , 
    category='$cat' , sub_cat_id='$subCat',item_description='$des' , item_price='$itemPrice', item_discount='$itemDis',
     item_qty='$itemQty', item_feature='$itemfeature' , item_popular='$popular' , item_top_selling='$topselling' where id = '".$QID."' " );
   
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
       }
       // insert image in item_imgs table
       
       else
       {	

       
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
             if(in_array($ext,$extension)) {

             

                 if(!file_exists("../img/item_img/".$file_name)) {
                    

                     $sql2="INSERT INTO item_img(item_id,item_image) values('$item_id','$file_name')";

                     if($res2=$conn->query($sql2)){

                         move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../img/item_img/".$file_name);
                         
                     }
                 }
                 
                 else {
                    
                 $filename=basename($file_name,$ext);
                    $newFileName=$filename.time().".".$ext;
      

                   $sql3="INSERT INTO item_img (item_id,item_image) values('$item_id','$file_name')";
                     
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
                      <option value="<?php echo $row['AG_id']?>"><?php echo $row['AG_des']?></option>
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
                      <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_des']?></option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="exampleInputName1">Sub Category</label>
                      <select name="subcategory" id="subcategory" class="form-control" required >
                      <option value="<?php echo $row['sub_cat_id']?>"><?php echo $row['sub_cat_des']?></option>
                      </select>
                    </div>
                    </div>
                  </div>
                    
                    

                  <div class="row">
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Name</label>
                      <input type="text" class="form-control" value="<?php echo $row['item_name'] ?>" name="item_name" id="exampleInputUsername1" placeholder="Item name" required>
                    </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Price</label>
                      <input type="number" class="form-control" value="<?php echo $row['item_price'] ?>"  name="item_price" id="exampleInputUsername1" placeholder="Item Price" required>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Discount</label>
                      <input type="number" class="form-control" name="item_discount" value="<?php echo $row['item_discount'] ?>" id="exampleInputUsername1" placeholder="Item Discount" >
                    </div>
                    
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Quantity</label>
                      <input type="number" class="form-control " value="<?php echo $row['item_qty'] ?>"  name="item_qty" id="exampleInputUsername1" placeholder="Item Quantity" required>
                    </div>
                    
                    </div>
                    
                  </div>
                  <div class="row">


                    <div class="col-lg-3"><br>

                    <input type="checkbox" <?php if($row['item_feature'] == 1 ) { echo "checked";}; ?> name="feature" id="group1" value="1" title="Main List"  />
                    <label for="group1" >Feature Product</label><br>
                    
                    <input type="checkbox" <?php if($row['item_popular'] == 1 ) { echo "checked";}; ?> name="popular" id="group2" value="1" title="Main List" />
                    <label for="group2">Popular Product</label><br>

                    <input type="checkbox" <?php if($row['item_top_selling'] == 1 ) { echo "checked";}; ?> name="top_selling" id="group3" value="1" title="Main List" />
                    <label for="group3">Top Selling Product</label>
                    
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Description</label>
                      <input type="text" class="form-control" name="description1" value="<?php echo $row['item_description'] ?>"   placeholder="Item Description" required>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Item Images</label>
                      <input type="file" accept="images/*" name="files[]" multiple class="form-control" id="exampleInputUsername1"  placeholder="Item Images">                    
                    <br><br>
                    <div style="border-style: solid;border-width: 1px;border-color: lightgrey;">
                        <div class="container-fluid">
                          <h5><b>Item Images</b></h5>
                        <div class="col-lg-12">
                            <?php 
                            $img=mysqli_query($conn,"select * from item_img where item_id='".$QID."'");
                            while($rrow=mysqli_fetch_array($img)){
                            ?>
                                
                              <img src="../img/item_img/<?php echo $rrow[2] ?>" style="width: 40px; height: 40px;margin-top: 20px;" alt="">&nbsp <a style="margin-left: -15px;width: 15px;height: 15px;padding: 0px;" href="?imgDel=<?php echo $rrow[0] ?>&id=<?php echo $QID?>" class="badge badge-primary">x</a>
                            
                            <?php }?>
                            </div>
                          <br>
                        </div>
                    </div>
                    </div>
                    </div>
                  </div>
               <br><br>
                    <button type="submit" class="btn btn-primary mr-2 Hbtn" name="btn_update" id="redBtn" >Update</button>
                    <a href="show_product.php" class="btn btn-warning  " style="padding:20px ;" id="redBtn">Show Products</a>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php 
    if(isset($_GET['imgDel'])){
      $idd=$_GET['imgDel'];
      $del=mysqli_query($conn,"delete from item_img where item_img_id='".$idd."'");

      echo "<script>window.location.href ='edit_product.php?id=".$_GET['id']." ' </script>";


    }
?>
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
