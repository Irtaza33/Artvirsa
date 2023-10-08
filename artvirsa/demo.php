<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .box{
    display: flex;
  }
  .inner{
    width: 800px;
    height: 100px;
    line-height: 100px;
    font-size: 5em;
    font-family: sans-serif;
    font-weight: 800;
    white-space: nowrap;
    overflow: hidden;

  }
  .inner:first-child{
    background-color: #0578C3;
    color: orange;
    transform-origin: right;
     transform: perspective(50px)rotateY(-10deg);

  }
  .inner:last-child{
  background-color: #1885CA;
    color: #FCB018;
    transform-origin: left;
     transform: perspective(50px)rotateY(10deg);

  }
  .inner span{
    position: absolute;
    animation: marquee 4s linear infinite;
    
  }
  .inner:first-child span{
    animation-delay: 2s;
    left:-100%;
  }
  @keyframes marquee{
      from{
        left:100%; 
      }
      to{
        left:-100%;
      }     
  }


</style>
<body>



<br><br><br>

<div class="box">
  <div class="inner">

    <span>NEW FEATURE</span>
  </div>
  
  <div class="inner">
    <span>NEW FEATURE</span>
  </div>
  
</div>


</body>
</html>


























<?php include 'header.php';
include '../db/conn.php'; ?>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
      "lengthChange": false,
      "searching": false,
      "language": {
      "info": "Total:_TOTAL_ ",
      "lengthChange": false
    }
    });
} );

$(document).ready( function () {
    $('#myTable1').DataTable({
      "lengthChange": false,
      "searching": false,
      "language": {
      "info": "Total:_TOTAL_ ",
    }
    });
} );
$(document).ready( function () {
    $('#myTable2').DataTable({
      "lengthChange": false,
      "searching": false,
      "language": {
      "info": "Total:_TOTAL_ ",
    }
    });
} );
</script>

<style>

</style>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <h4 class="card-title">ADD CATEGORY</h4><br>
                 <div class="row">   
                 <div class="col-lg-3">

                  <div class="table-responsive">
                    <table class="table" id="myTable" >
                      <thead>
                        <tr>
                          <th>Article Group</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $query_show=mysqli_query($conn,"SELECT * FROM `article_group` ");
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                          <td><?php  echo $row[1] ?></td>  
                          <td><a class="btn btn-danger btn-sm delete" name="delete" href="user_details.php?id1=<?php echo  $row[0] ?> " >Delete</a></td>

                            <?php 
                            
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from users where id ='".$id."'");
                                echo "<script>window.location.href = 'user_details.php'</script>";

                            }
                            ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                    </div>
                  <div class="col-lg-4">

                  <div class="table-responsive">
                    <table class="table" id="myTable1" >
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $query_show=mysqli_query($conn,"SELECT * FROM `category` ");
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                          <td><?php  echo $row[2] ?></td>  
                          <td><a class="btn btn-danger btn-sm delete" name="delete" href="user_details.php?id1=<?php echo  $row[0] ?> " >Delete</a></td>

                            <?php 
                            
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from users where id ='".$id."'");
                                echo "<script>window.location.href = 'user_details.php'</script>";

                            }
                            ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                    </div>

                                     <div class="col-lg-5">

                  <div class="table-responsive">
                    <table class="table" id="myTable2" >
                      <thead>
                        <tr>
                          <th>Sub Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $query_show=mysqli_query($conn,"SELECT * FROM `sub_category` ");
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                          <td><?php  echo $row[2] ?></td>  
                          <td><a class="btn btn-danger btn-sm delete" name="delete" href="category.php?id1=<?php echo  $row[0] ?> " >Delete</a></td>

                            <?php 
                            
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from users where id ='".$id."'");
                                echo "<script>window.location.href = 'user_details.php'</script>";

                            }
                            ?>
                        </tr>
                        <?php } ?>
                     </tbody>
                    </table>
                  </div>
                    </div>
                    

                    </div>
                    
                 </div>
              </div>
        </div>
    </div>
</div>
          
       

        

<?php include 'footer.php' ?>

<script>
$(document).ready(function(){

    $('#show').click(function() {
      $('#myDIV').toggle("slide");
    });

    $('#show1').click(function() {
      $('#myDIV1').toggle("slide");
    });

});


</script>
<?php 
                  if(isset($_POST['btn_insert'])){
                    $art=$_POST['article'];
                    $insert=mysqli_query($conn,"insert into article_group(AG_des) Values('$art')");
                    ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                  <script>
                                      
                                      swal("Category Uploaded!", "Successfully ❤️️");
                
                                      setTimeout(function(){
                                          window.location.href = 'category.php';
                                          }, 700);
                                          
                                  </script>
            <?php
                  }

                  if(isset($_POST['btn_insert1'])){
                    $cat=$_POST['category'];
                    $art=$_POST['article'];
                    $insert1=mysqli_query($conn,"insert into category(AG_id,cat_des) Values('$cat','$art')");
                    ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                  <script>
                                      
                                      swal("Category Uploaded!", "Successfully ❤️️");
                
                                      setTimeout(function(){
                                          window.location.href = 'category.php';
                                          }, 700);
                                          
                                  </script>
            <?php
                  }
                  ?>