<?php include 'header.php';
include '../db/conn.php';
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <span style="color:#700f1a ;" >ArtVirsa</span></h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                 
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Karachi</h4>
                        <h6 class="font-weight-normal">Pakistan</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Earnings</p>
                      <p class="fs-30 mb-2">
                      <?php 
                        $order=mysqli_query($conn,"select sum(total_price) from order_details where order_status= 'complete'");
                         $count1=mysqli_fetch_array($order);
                         echo "RS. ".$count1[0]." /-"; ?>
                      </p>
                      <p>(Total Earnings)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Products</p>
                      <p class="fs-30 mb-2">
                      <?php 
                        $product=mysqli_query($conn,"select * from item_master");
                        echo $count2=mysqli_num_rows($product); ?>
                      </p>
                      <p>(Total Products)</p>

                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Users</p>
                      <p class="fs-30 mb-2">
                      <?php 
                        $users=mysqli_query($conn,"select * from users where type=0");
                        echo $count3=mysqli_num_rows($users); ?>
                      </p>
                      <p>2.00% (30 days)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Orders</p>
                      <p class="fs-30 mb-2"> <?php 
                        $order=mysqli_query($conn,"select * from orders");
                        echo $count1=mysqli_num_rows($order); ?></p>
                      <p>(30 days)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="card-title">New Orders</p>
                  <a href="orders.php" class="text-info">View all</a>
                 </div>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>User Name</th>
                         
                          <th>Order Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php 
                        $order_sql=mysqli_query($conn,"select * from orders 
                        join users on users.id = orders.user_order_id order by O_id DESC limit 5 
                        ");

                        while($order_row=mysqli_fetch_array($order_sql)){
                        ?>
                        <tr>
                          <td><?= $order_row[0]?></td>
                          <td class="font-weight-bold"><a href="invoice.php?id=<?php echo $order_row[0] ?>"><?= $order_row['firstname'] ?> <?= $order_row['lastname'] ?></a></td>
                          <td><?= $order_row[2]?></td>
                          <?php if($order_row[4] == 'pending'){ ?>
                          <td class="font-weight-medium"><div class="badge badge-danger"><a href="" style="color:white" >Pending</a></div></td>
                            <?php }else if($order_row[4] == 'complete'){ ?>
                              <td class="font-weight-medium"><div class="badge badge-success"><a href="" style="color:white" >Complete</a></div></td>
                              <?php } else if($order_row[4] == 'processing'){
                                ?>
                          <td class="font-weight-medium"><div class="badge badge-warning"><a href="" style="color:white" >Processing</a></div></td>
                                <?php
                              }else if($order_row[4] == 'cancelled'){
                              ?>
                           <td class="font-weight-medium"><div class="badge badge-danger"><a href="" style="color:white" >Cancelled</a></div></td>
                             <?php }?>
                        </tr>
                       <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <style>
              @media screen and (max-device-width: 480px)
                and (orientation: portrait) {
                  #donutchart {
                  
                    
                  }
                }
            </style>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Orders Status Report</p>
                  <a href="orders.php" class="text-info">View all</a>
                 </div>
                  <div >
                  <div id="donutchart" style="width: 700px; height: 500px;margin-left: -60px;margin-top: -20px;"></div>
                               
                              </div>


                              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php
            $pending=mysqli_query($conn,"select * from orders where order_status='pending'");
            $count1=mysqli_num_rows($pending);
            $processing=mysqli_query($conn,"select * from orders where order_status='processing'");
            $count2=mysqli_num_rows($processing);

            $complete=mysqli_query($conn,"select * from orders where order_status='complete'");
            $count3=mysqli_num_rows($complete);
            $cancelled=mysqli_query($conn,"select * from orders where order_status='cancelled'");
            $count4=mysqli_num_rows($cancelled);
            ?>
          ['Task', 'Orders Status'],
          ['Pending',     <?php echo $count1 ?>],
          ['Cancelled', <?php echo $count4 ?>],
          ['Processing',      <?php echo $count2 ?>],
       
          ['Complete',  <?php echo $count3 ?>],
      
        ]);

        var options = {
          title: '',
          pieHole: 0.6,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
                </div>
              </div>
            </div>
          </div>
          
          <!-- <div class="row">
            
            <div class="col-md-3 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">To Do Lists</h4>
									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Meeting with Urban Team
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Duplicate a project for new customer
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Project meeting with CEO
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Follow up of team zilla
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Level up for Antony
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
										</ul>
                  </div>
                  <div class="add-items d-flex mb-0 mt-2">
										<input type="text" class="form-control todo-list-input"  placeholder="Add new task">
										<button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
									</div>
								</div>
							</div>
            </div>
          </div> -->


      
       
        <!-- content-wrapper ends -->
<?php include 'footer.php' ?>