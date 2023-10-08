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

                  <h4 class="card-title">ALL ORDERS DETAILS</h4>
                    
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
                  <div class="table-responsive">
                    <table class="table"  id="myTable" >
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>User Name</th>
                          <th>Order Date</th>
                          <th>Order Time</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          // $query_show=mysqli_query($conn,"SELECT * FROM `order_details` join item_master on item_master.id = order_details.product_id 
                          // join users on users.id = order_details.user_id
                          // join payment_method on payment_method.payment_id =  order_details.payment_id
                          
                          // " );
                          //where order_status='pending'
                          $query_show=mysqli_query($conn,"SELECT * FROM `orders` join users on users.id = orders.user_order_id " );
                          while($row=mysqli_fetch_array($query_show)){
                          ?>
                        <tr>
                       <td> <?php  echo $row[0] ?></td>
                       <td> <a href="invoice.php?id=<?= $row[0]?>" style="color:#700f17" target="blank" ><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?> </a></td>
                       <td> <?php  echo $row[2] ?></td>

                            <td><?php echo date("g:i a", strtotime($row[3] ));  ?>  </td>
                          
                        <td>
                          
                            <select name="status"  class="form-control " id="status"  style="color:black;border-color: black;"  >
                              <option value="" selected disabled style="text-transform:capitalize;"><?= $row[4] ?></option>
                            <option  value="processing">Processing </option>
                            <option value="complete">Complete</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                      
                      </td>
                        <td>
                        <a href="orders.php" class="btnSelect"> <img  src="../img/save.png" style="width: 30px;height: 30px;" alt=""></a>
                        </td>
                      
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                   
                            <?php 
                            
                          //   if(isset($_GET['id'])){
                          // $id=$_GET['id'];
                          //    $status=$_GET['status'];
                          //     $query = "update orders set  order_status= '$status'  where O_id= '".$id."'";
                          //     $result=mysqli_query($conn,$query);
                          //   }
                        

                            if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $delete=mysqli_query($conn,"delete from item_master where id ='".$id."'");
                                echo "<script>window.location.href = 'show_product.php'</script>";

                            }
                            ?>
                        </tr>
                        <script>
$(document).ready(function(){
	$(".btnSelect").on('click',function(){
      var currentRow=$(this).closest("tr");
      
      var Oid=currentRow.find("td:eq(0)").html();
    

     var id=currentRow.find(":selected").val();
     

     $.ajax({
			url: 'insertStatus.php',
			dataType: "json",
			data: {status: id, id: Oid},  
			cache: false,
			
		});
 
   
	}); 
});
</script>   
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