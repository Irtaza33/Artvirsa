
<?php include 'header.php';
include '../db/conn.php'; ?>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">ALL USERS DETAILS</h4>

                  <div class="table-responsive">
                    <table class="table" id="myTable" >
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Country</th>
                          <th>Phone Number</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $query_show=mysqli_query($conn,"SELECT * FROM `users` join country on country.country_id = users.country where type=0  ");
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                       <td> <?php if($row[4]==''){echo "Incomplete Account";} else{ echo $row[4];} ?>  <?php  echo $row[5] ?></td>
                          <td><?php  echo $row[1] ?></td>
                          <td><?php  echo $row[6] ?></td>
                          <td><?php  echo $row[7] ?></td>
                          <td><?php  echo $row['country_title'] ?></td>
                          <td><?php  echo $row[9] ?></td>


                        <td><a class="btn btn-danger btn-sm" name="delete" href="user_details.php?id1=<?php echo  $row[0] ?> " >Delete</a></td>

                            <?php 
                            
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from users where id ='".$id."'");
                                echo "<script>window.location.href = 'user_details.php'</script>";

                            }
                            ?>
                        </tr>

                        
                <div class="modal fade" id="exampleModal<?php echo $row[0]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"></button>
                        </div>
                        </div>
                    </div>
                </div>
                 
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  

                </div>
              </div>
</div>
          </div>
        </div>

        

<?php include 'footer.php' ?>


