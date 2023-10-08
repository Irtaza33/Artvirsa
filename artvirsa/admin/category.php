<?php include 'header.php';
include '../db/conn.php';
if(isset($_POST['btn_submit'])){

    $AGDES=$_POST['AGDES'];
    
    $insert_query="insert into article_group(AG_des) VALUES('$AGDES')";
    $insert_result=mysqli_query($conn,$insert_query);
    if($insert_result){
        echo "Record Inserted";
        echo "<script>window.location.href = 'category.php?Article_group'</script>";
    }
        else{
            echo "Not Inserted";
        }
    }

    if(isset($_POST['btn_submit1'])){

      $AG=$_POST['article_group'];
      $cat=$_POST['cat'];
      
      $insert_query="insert into category(AG_id,cat_des) VALUES('$AG','$cat')";
      $insert_result=mysqli_query($conn,$insert_query);
      if($insert_result){
          echo "Record Inserted";
          echo "<script>window.location.href = 'category.php?category'</script>";
      }
          else{
              echo "Not Inserted";
          }
      }
      
      if(isset($_POST['btn_submit2'])){

        $category=$_POST['category'];
        $subCat=$_POST['subCat'];

        
        $insert_query="insert into sub_category(sub_cat_cat_id,sub_cat_des) VALUES('$category','$subCat')";
        $insert_result=mysqli_query($conn,$insert_query);
        if($insert_result){
            echo "Record Inserted";
            echo "<script>window.location.href = 'category.php?sub_category'</script>";
        }
            else{
                echo "Not Inserted";
            }
        }
  


?>
<script>
    $(document).ready( function () {
    $('#myTable1').DataTable();
} );
$(document).ready( function () {
    $('#myTable2').DataTable();
} );
$(document).ready( function () {
    $('#myTable3').DataTable();
} );
</script>

<div class="main-panel">   

<?php if(isset($_GET['Article_group'])){ ?>

<div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Category Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> <div class="form-group">
                      <label for="exampleInputUsername1">Articel Group</label>
                      <input type="text" class="form-control" name="AGDES" id="" placeholder="Article Group" required>
                    </div>
                    <button id="redBtn"  class="btn btn-block Hbtn" name="btn_submit">Submit</button>
                </div>
                    <div class="col-lg-2"></div>
                 
                 </div>
                  </form>

                </div>
              </div>
          </div>
          </div>

          <div class="table-responsive">
                    <table class="table" id="myTable1" >
                      <thead>
                        <tr>
                          <th>Country ID</th>
                          <th>Country Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from article_group");
                          while($Prow=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow[0] ?></td>
                        <td><?php echo $Prow[1] ?></td>
                        <td><a href="?delete=<?php echo $Prow[0]; ?>" class="btn btn-danger btn-sm" >Delete</a></td>
                        </tr>
                        <?php }?>

                      </tbody>
                    </table>
          </div>


     
</div>



<!-- category -->


<?php } else if(isset($_GET['category'])){ ?>
  <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Category Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> 
                      <div class="form-group">
                      <label for="exampleInputUsername1">Article Group</label>
                      <select name="article_group" class="form-control" id="">
                        <option value="" selected disabled>--Select Country--</option>
                        <?php $article_group=mysqli_query($conn,"select * from article_group");
                        while($Crow=mysqli_fetch_array($article_group)){ ?>
                          <option value="<?php echo $Crow[0] ?>"><?php echo $Crow[1] ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" class="form-control" name="cat" id="" placeholder="State Name" required>
                    </div>
                    <button id="redBtn"  class="btn btn-block Hbtn" name="btn_submit1">Submit</button>
                </div>
                    <div class="col-lg-2"></div>
                 
                 </div>
                  </form>

                </div>
              </div>
          </div>
          </div>

          <div class="table-responsive">
                    <table class="table" id="myTable2" >
                      <thead>
                        <tr>
                          <th>Category ID</th>
                          <th>Arttice Group</th>
                          <th>Category Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from category join article_group on article_group.AG_id = category.AG_id");
                          while($Prow1=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow1[0] ?></td>
                        <td><?php echo $Prow1['AG_des'] ?></td>
                        <td><?php echo $Prow1[2] ?></td>
                        <td><a href="?delete1=<?php echo $Prow1[0]; ?>" class="btn btn-danger btn-sm" >Delete</a></td>
                        </tr>
                        <?php }?>

                      </tbody>
                    </table>
          </div>


     
</div>
              

  <?php }  else if(isset($_GET['sub_category'])){ ?>

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



                  </script>
    <!-- City -->
  <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Category Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> 
                      <div class="form-group">
                      <label for="exampleInputUsername1">Article Group Name</label>
                      <select name="article" class="form-control" id="article" onChange="getCategory(this.value);"   required >
                        <option value="" selected disabled>--Select Article Group--</option>
                        <?php $AG=mysqli_query($conn,"select * from article_group");
                        while($Crow=mysqli_fetch_array($AG)){ ?>
                          <option value="<?php echo $Crow[0] ?>"><?php echo $Crow[1] ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <select name="category" class="form-control" id="category" >
                        <option value="">Select Category</option>
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputUsername1">Sub Category Name</label>
                      <input type="text" class="form-control" name="subCat" id="" placeholder="Sub Category Name" required>
                    </div>
                    <button id="redBtn"  class="btn btn-block Hbtn" name="btn_submit2">Submit</button>
                </div>
                    <div class="col-lg-2"></div>
                 
                 </div>
                  </form>

                </div>
              </div>
          </div>
          </div>

          <div class="table-responsive">
                    <table class="table" id="myTable3" >
                      <thead>
                        <tr>
                          <th>Sub Category ID</th>
                          <th>Article Group</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from sub_category join category on category.cat_id = sub_category.sub_cat_cat_id join article_group on category.AG_id = article_group.AG_id");
                          while($Prow1=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow1[0] ?></td>
                        <td><?php echo $Prow1['AG_des'] ?></td>
                        <td><?php echo $Prow1['cat_des'] ?></td>
                        <td><?php echo $Prow1[2] ?></td>
                    
                        <td><a href="?delete2=<?php echo $Prow1[0]; ?>" class="btn btn-danger btn-sm" >Delete</a></td>
                        </tr>
                        <?php }?>

                      </tbody>
                    </table>
          </div>


     
</div>
  <?php }?>



<?php 

if(isset($_GET['delete'])){
  $del=$_GET['delete'];
  $delete=mysqli_query($conn,"delete from article_group where AG_id='".$del."'");
  echo "<script>window.location.href = 'category.php?Article_group'</script>";

}
                      if(isset($_GET['delete1'])){
                        $del=$_GET['delete1'];
                        $delete=mysqli_query($conn,"delete from category where cat_id='".$del."'");
                        echo "<script>window.location.href = 'category.php?category'</script>";

                      }

                      if(isset($_GET['delete2'])){
                        $del=$_GET['delete2'];
                        $delete=mysqli_query($conn,"delete from sub_category where sub_cat_id='".$del."'");
                        echo "<script>window.location.href = 'category.php?sub_category'</script>";

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
                color: white;
            }
            .Hbtn:hover{
                background-color: white;
                color: #700f1a;
                border-color:#700f1a ;
            }
</style>
<?php include 'footer.php'; ?>