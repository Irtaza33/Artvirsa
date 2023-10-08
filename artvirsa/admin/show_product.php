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

                  <h4 class="card-title">ALL ITEMS DETAILS</h4>

                  <div class="table-responsive">
                    <table class="table" id="myTable" >
                      <thead>
                        <tr>
                          <th>Item Name</th>
                          <th>Item Category</th>
                          <th>Item Price</th>
                          <th>Item Quantity</th>
                          <th>Item Discount</th>
                          <th>Item Images</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $query_show=mysqli_query($conn,"SELECT * FROM `item_master` join sub_category on sub_category.sub_cat_id = item_master.sub_cat_id ");
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                       <td> <?php  echo $row[4] ?></td>
                          <td><?php echo $row['sub_cat_des'] ?></td>
                          <td>RS. <?php  echo $row[6] ?></td>
                          <td><?php  echo $row[7] ?> qty</td>
                          <td>RS. <?php  echo $row[8] ?></td>
                          
                          <td><?php
                          $item_sql=mysqli_query($conn,"select * from item_img where item_id='".$row[0]."'");
                          while($item_row=mysqli_fetch_array($item_sql)){
                          ?>
                        <img src="../img/item_img/<?php echo $item_row[2] ?>" alt="">
                            <?php }?>
                            </td>
                        <td>
                        <a name="delete" href="edit_product.php?id=<?php echo  $row[0] ?> " ><img src="../img/edit.png" style="width: 30px;height: 30px;" alt=""></a>

                          <a name="delete" href="show_product.php?id1=<?php echo  $row[0] ?> " ><img src="../img/trash.png" style="width: 30px;height: 30px;" alt=""></a>
                        </td>
                            <?php 
                            
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from item_master where id ='".$id."'");
                                echo "<script>window.location.href = 'show_product.php'</script>";

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