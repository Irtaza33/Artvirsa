<?php include 'header.php';
include '../db/conn.php';
if(isset($_POST['btn_submit'])){

    $title=$_POST['country'];
    
    $insert_query="insert into country(country_title) VALUES('$title')";
    $insert_result=mysqli_query($conn,$insert_query);
    if($insert_result){
        echo "Record Inserted";
        echo "<script>window.location.href = 'location.php?country'</script>";
    }
        else{
            echo "Not Inserted";
        }
    }

    if(isset($_POST['btn_submit1'])){

      $country=$_POST['country'];
      $state=$_POST['state'];
      
      $insert_query="insert into state(country_id,state_title) VALUES('$country','$state')";
      $insert_result=mysqli_query($conn,$insert_query);
      if($insert_result){
          echo "Record Inserted";
          echo "<script>window.location.href = 'location.php?state'</script>";
      }
          else{
              echo "Not Inserted";
          }
      }
      
      if(isset($_POST['btn_submit2'])){

        $state=$_POST['state22'];
        $city=$_POST['city'];

        
        $insert_query="insert into city(state_id,city_title) VALUES('$state','$city')";
        $insert_result=mysqli_query($conn,$insert_query);
        if($insert_result){
            echo "Record Inserted";
            echo "<script>window.location.href = 'location.php?city'</script>";
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

<?php if(isset($_GET['country'])){ ?>

<div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Country Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> <div class="form-group">
                      <label for="exampleInputUsername1">Country Name</label>
                      <input type="text" class="form-control" name="country" id="" placeholder="Country Name" required>
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
                          $sql=mysqli_query($conn,"select * from country");
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



<!-- state -->


<?php } else if(isset($_GET['state'])){ ?>
  <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Country Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> 
                      <div class="form-group">
                      <label for="exampleInputUsername1">Country Name</label>
                      <select name="country" class="form-control" id="">
                        <option value="" selected disabled>--Select Country--</option>
                        <?php $country=mysqli_query($conn,"select * from country");
                        while($Crow=mysqli_fetch_array($country)){ ?>
                          <option value="<?php echo $Crow[0] ?>"><?php echo $Crow[1] ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">State Name</label>
                      <input type="text" class="form-control" name="state" id="" placeholder="State Name" required>
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
                          <th>State ID</th>
                          <th>Country Name</th>
                          <th>State name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from state join country on country.country_id = state.country_id");
                          while($Prow1=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow1[0] ?></td>
                        <td><?php echo $Prow1['country_title'] ?></td>
                        <td><?php echo $Prow1[2] ?></td>
                        <td><a href="?delete1=<?php echo $Prow1[0]; ?>" class="btn btn-danger btn-sm" >Delete</a></td>
                        </tr>
                        <?php }?>

                      </tbody>
                    </table>
          </div>


     
</div>
              

  <?php }  else if(isset($_GET['city'])){ ?>
    <script>
                     function getstate(val){
                      $.ajax({
                        type: "POST",
                        url: "../country/getstate.php",
                        data: 'state_id1='+val,
                        success:function(data){
                          $("#state").html(data);
                          getcity();
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
                  <h4 class="card-title">All Country Details</h4>

                  <form action="" method="post" >
                  <div class="row">
                    
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> 
                      <div class="form-group">
                      <label for="exampleInputUsername1">Country Name</label>
                      <select name="country22" class="form-control" id="country2" onChange="getstate(this.value);"  required >
                        <option value="" selected disabled>--Select Country--</option>
                        <?php $country=mysqli_query($conn,"select * from country");
                        while($Crow=mysqli_fetch_array($country)){ ?>
                          <option value="<?php echo $Crow[0] ?>"><?php echo $Crow[1] ?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">State Name</label>
                      <select name="state22" class="form-control" id="state" >
                        <option value="">Select State</option>
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputUsername1">City Name</label>
                      <input type="text" class="form-control" name="city" id="" placeholder="State Name" required>
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
                          <th>City ID</th>
                          <th>Country Name</th>
                          <th>State name</th>
                          <th>City Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $sql=mysqli_query($conn,"select * from city join state on state.state_id = city.state_id join country on state.country_id = country.country_id");
                          while($Prow1=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        
                        <td><?php echo $Prow1[0] ?></td>
                        <td><?php echo $Prow1['country_title'] ?></td>
                        <td><?php echo $Prow1['state_title'] ?></td>
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
  $delete=mysqli_query($conn,"delete from country where country_id='".$del."'");
  echo "<script>window.location.href = 'location.php?country'</script>";

}
                      if(isset($_GET['delete1'])){
                        $del=$_GET['delete1'];
                        $delete=mysqli_query($conn,"delete from state where state_id='".$del."'");
                        echo "<script>window.location.href = 'location.php?state'</script>";

                      }

                      if(isset($_GET['delete2'])){
                        $del=$_GET['delete2'];
                        $delete=mysqli_query($conn,"delete from city where city_id='".$del."'");
                        echo "<script>window.location.href = 'location.php?city'</script>";

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