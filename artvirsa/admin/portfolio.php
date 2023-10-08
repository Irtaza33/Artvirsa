<?php include 'header.php';
include '../db/conn.php';
if(isset($_POST['btn_submit'])){

  $image=$_FILES['image']['name'];
        $target='../img/portfolio/'.basename($image); 
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
    
    $insert_query="insert into profolio_slider(slider_url) VALUES('$image')";
    $insert_result=mysqli_query($conn,$insert_query);
    if($insert_result){
        echo "Record Inserted";
        echo "<script>window.location.href = 'portfolio.php'</script>";
    }
        else{
            echo "Not Inserted";
        }
    }
}

?>


<div class="main-panel">        
<div class="content-wrapper">
          <div class="row">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">New Item Entry</h4>
                  <form action="" method="post" enctype="multipart/form-data" >
                 <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> <div class="form-group">
                      <label for="exampleInputUsername1">Portfolio Image</label>
                      <input type="file" class="form-control" name="image" id="" placeholder="Portfolio Image" required>
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
                    <table class="table" id="myTable" >
                      <thead>
                        <tr>
                          <th>Portfolio ID</th>
                          <th>Portfolio Image</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from profolio_slider");
                          while($Prow=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow[0] ?></td>
                        <td><img src="../img/portfolio/<?php echo $Prow[1] ?>" alt=""></td>
                        <td><a href="?delete=<?php echo $Prow[0]; ?>" class="btn btn-danger btn-sm" >Delete</a></td>
                        </tr>
                        <?php }?>

                      </tbody>
                    
                    </table>
          </div>
</div>
<?php 
                      if(isset($_GET['delete'])){
                        $del=$_GET['delete'];
                        $delete=mysqli_query($conn,"delete from profolio_slider where P_id='".$del."'");
                        echo "<script>window.location.href = 'portfolio.php'</script>";

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