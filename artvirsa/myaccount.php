<?php include 'header.php';
include 'db/conn.php';
if(isset($_GET['remove1'])){
    $WI_ID=$_GET['remove1'];
    $delete=mysqli_query($conn,"delete from wishlist where w_id =  '".$WI_ID."' and user_id = '".$_SESSION['user_id']."' ");
    echo "<script>window.location.href ='myaccount.php?wishlist'</script>";

}
if($_SESSION['email'] == ''){
    echo "<script>window.location.href ='registration.php'</script>";

}

$sql=mysqli_query($conn,"select * from users where email='".$_SESSION['email']."'");
$row=mysqli_fetch_array($sql);

$_SESSION['user_id']=$row[0];

if(isset($_POST['btn_update'])){
    $firstname=$_POST['firstName'];
    $lastname=$_POST['lastName'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $country=1;
    $phoneNo=$_POST['phoneNumber'];
    
    $update_query=mysqli_query($conn,"update users set firstname='$firstname' , lastname='$lastname' , gender='$gender' , birth_date='$dob' ,
    country ='$country' , phone_no='$phoneNo' where email='".$_SESSION['email']."'");
  
    if($update_query){
      ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>swal("Profile Updated!", "Successfully ❤️️");
      
       setTimeout(function(){
            window.location.href = 'myaccount.php?profile';
         }, 800);
         


    </script>
      <?php
        // echo "<script>window.location.href ='myaccount.php?profile'</script>";

    }

}

?>

<style>
    .btn:hover{
        border-bottom: solid;
        border-width: 1px ;
        transition: 0.5s;

    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<div class="container-fluid" >
   
    <div class="row" style="margin-top: 120px;">
        <div class="col-lg-3" ><br>
           <a href="myaccount.php?profile" class="btn " style="height: 45px;width: 100%;" ><span style="float: left;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp My Account</span> <span style="float:right" >></span> </a><br>
           <a href="myaccount.php?address" class="btn " style="height: 45px;width: 100%;"><span style="float: left;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Addresses </span> <span style="float:right" >></span>  </a><br>
           <a href="myaccount.php?wishlist" class="btn " style="height: 45px;width: 100%;"><span style="float: left;"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp Wishlist </span><span style="float:right" >></span>  </a><br>
           <a href="myaccount.php?orders" class="btn " style="height: 45px;width: 100%;"><span style="float: left;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp Orders   </span> <span style="float:right" >></span></a><br>
           <a href="logout.php" class="btn " style="height: 45px;width: 100%;"><span style="float: left;"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp Logout   </span><span style="float:right" >></span> </a><br>

        </div>
       <style>
        *{   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        #font1{
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }
        #redBtn{
          height: 55px;
          width: 150px;
          border-radius: 0;
        }
  
       </style>
        <?php if(isset($_GET['profile'])){ ?><br>
        <div class="col-lg-6" >
            <h4><b>My Account</b></h4>
            <form action="" method="post" >
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1" id="font1" >First Name</label>
                        <input type="text" class="form-control" name="firstName"  value="<?php echo $row[4] ?>" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" name="" id="asd" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">Last Name</label>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $row[5] ?>" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  name="" id="" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                       
                        <div class="form-check">
                        <label for="" id="font1">Gender</label><br>
                            <input class="form-check-input" name="gender" required value="male" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?php if($row[6]=='male'){ echo "checked";} else{} ?>>
                            <label class="form-check-label" style="font-weight: 100;" for="flexRadioDefault1">
                               Male
                            </label>
                            </div>
                    </div><br>
                    <div class="col-lg-6">  
                            <div class="form-check">
                            <input class="form-check-input" name="gender" required value="female" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?php if($row[6]=='female'){ echo "checked";} else{} ?> >
                            <label class="form-check-label" style="font-weight: 100;"  for="flexRadioDefault2">
                                Female
                            </label>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1">Birthdate</label>
                        <input type="date" name="dob" value="<?php echo $row[7] ?>" required  style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" >
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">Country</label>
                        <select  name="country" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" required>
                            <option value="Pakistan" disabled class="form-control" selected >Pakistan</option>
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1">Email</label>
                        <input type="email"   value="<?php echo $row[1] ?>" disabled  style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">Phone Number</label>
                        <input type="number" name="phoneNumber" value="<?php echo $row[9] ?>"  style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" name="" id="" required>
                    </div>
                </div><br>
                <button class="btn btn-danger Hbtn" name="btn_update" id="redBtn" >SAVE CHANGES</button>

                <br><br>
            </form>
        </div>
         <?php } 
         else if(isset($_GET['add_address'])){
         ?>
           <div class="col-lg-6">
           <h3><b>ADD NEW ADDRESS</b></h3>
                <form action="" method="post">
           <div class="row">
            <div class="col-lg-12">
                <label for="" id="font1">Address Label</label>
                <select name="address_label" id="" class="form-control" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;">
                    <option value="work" selected >Work</option>
                    <option value="home" >Home</option>
                </select>
            </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1">First Name</label>
                        <input type="text" class="form-control" name="firstName"  style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" name="" id="" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">Last Name</label>
                        <input type="text" class="form-control" name="lastName"  style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  name="" id="" required>
                    </div>
                </div><br>
                <div class="row">
                <div class="col-lg-6">
                        <label for="" id="font1">Phone Number</label>
                        <input type="number" name="phoneNumber"   style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" name="" id="" required>
                    </div>

                    <script>
                    function getstate(val){
                      $.ajax({
                        type: "POST",
                        url: "country/getstate.php",
                        data: 'state_id1='+val,
                        success:function(data){
                          $("#state").html(data);
                          getcity();
                        }
                      })
                    }

                    
                    function getcity(val){
                      $.ajax({
                        type: "POST",
                        url: "country/getcity.php",
                        data: 'cityid='+val,
                        success:function(data){
                          $("#city").html(data);
                        }
                      })
                    }

                  </script>
                  

                <div class="col-lg-6">
                        <label for="" id="font1">Country</label>
                        <select  name="country" id="country" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" onChange="getstate(this.value);"  class="form-control" required>
                        <option selected disabled >Select Country</option>

                        <?php 
                      $sql=mysqli_query($conn,"select * from country");
                      while($country=mysqli_fetch_array($sql)){
                      ?>
                <option value="<?php echo $country['country_id'] ?>"  ><?php echo $country['country_title'] ?></option>
                      <?php } ?>
                    </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1">Region / State</label>
                        <select name="state" id="state" class="form-control" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  onChange="getcity(this.value);" required >
                         
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">City</label>
                        <select name="city" id="city" class="form-control" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"    >
                            
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="" id="font1">Street Address</label>
                        <input type="text " name="streetAddress" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" class="form-control" required >
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="" id="font1">Apartment, Building </label>
                        <input type="text " name="building" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" class="form-control" required >
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" id="font1">Floor</label>
                        <input type="text" name="floor" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="" id="font1">Postal Code</label>
                        <input type="number" name="postalcode" style="height: 45px;border-color: #E5E7E9;box-shadow:none ;"  class="form-control" required>
                    </div>
                </div><br>
                <button class="btn btn-danger Hbtn" name="btn_address" id="redBtn" >SAVE</button>


                <br><br>


           </div>
           </form>
        <?php }
        else if(isset($_GET['address'])){
            $showSQL=mysqli_query($conn,"select * from billing_address where user_id = '".$_SESSION['user_id']."'");
            $showRow=mysqli_fetch_array($showSQL);
            ?>
      <br>
            <div class="col-lg-6">
                <div class="row">
            <div class="col-md-3 col-xs-6">
                            <h4 class="news_let"   style="font-weight: bold;">
                            <h4><b>Billing Address</b></h4>

                            </h4>
                            <ul class="ft_conte">
                                <li style="text-transform: capitalize" >
                                No Address found
                                </li>
                            </ul>
                        </div> 

            </div><br>
            <div class="row">
            
            <div class="col-md-3 col-xs-6">
                            <h4 class="news_let"   style="font-weight: bold;">
                            <h4><b>Shipping Address</b></h4>

                            </h4>
                            <ul class="ft_conte">
                                <li style="text-transform: capitalize" >
                               
                                <?php 
                                $Bquery1=mysqli_query($conn,"select * from billing_address where user_id ='".$_SESSION['user_id']."'");
                                $rows=mysqli_fetch_array($Bquery1);
                              
                                if($rows[0] == ''){ ?>
                                No Address found
                                <?php } ?>
                                
                            </li>
                            </ul>
                        </div> 
                        
                        <div class="col-md-3 col-xs-6" style="float: right;" >
                        <br>
                            <a href="myaccount.php?add_address" class="btn btn-danger Hbtn" id="redBtn" style="padding: 15px;"  > NEW ADDRESS </a>
                        </div> 
                        
            </div><br><br>
               
            <?php 
            $Bquery=mysqli_query($conn,"select * from billing_address join city on city.city_id = billing_address.city where user_id ='".$_SESSION['user_id']."'");
            while($row=mysqli_fetch_array($Bquery)){
                // echo $row[0]; 
                $_SESSION['billing_id']=$row[0];
                            
            ?>


            
            <div style="border-style: solid;border-width: 1px;" >
              
            <div style="padding-left: 70px;"><br>

            
               <input id="radio<?php echo $row[0] ?>" value="<?php echo $row[0] ?>"  name="radio_a" type="radio" <?php if( $row[11] == 1 ){echo "checked";} ?>>
               <!-- <input type="hidden" name="id" id="id" value="<?php echo $row[0] ?> " > -->

            <label for="radio<?php echo $row[0] ?>" style="width:100%" >

                   <?php if($row[11] == 1 ){ ?> 

                <p style="font-size: 13px;color:#700f1a" >Selected as default</p>
               <?php } ?>

               
                <p style="text-transform: capitalize;"><b><?php echo $row[2] ?></b></p> <br>  
                <span style="text-transform: capitalize;font-weight:500;" ><?php echo $row[3] ?> <?php echo $row[4] ?></span><br>
                <p style="font-size: 13px;font-weight: 400;" >
                <?php echo $row[7] ?>, <?php echo $row[8] ?><br>
                <?php echo $row[9] ?> ,<?php echo $row[10] ?> , <?php echo $row['city_title'] ?>
                </p>
               <a href="myaccount.php?address&id=<?php echo $row[0]; ?>" style="color: #700f1a;" ><b>DELETE</b></a>
                <br></div>
                <h3 id="result"></h3>

            </div>
        </label>
            
            <br>
<br><br>


            <?php } ?>
            
            <script>

                function radioget(getValue){    
                    document.getElementById('result').innerHTML=getValue;
                }

        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var radio_a = $(this).val();
                
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        radio_a : radio_a,
                       
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
        });
    </script>
        </div>
       
        
        </div>
        <?php 
              

                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $delete_sql=mysqli_query($conn,"DELETE FROM `billing_address` WHERE id='".$id."'");
                    echo "<script>window.location.href ='myaccount.php?address'</script>";

                } }
                else if(isset($_GET['orders'])){ ?>
            <div class="col-lg-6">
                <div class="row"><br>
                <h4><b>Orders</b></h4>
                <table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-weight: 500;">Order Number</th>
      <th scope="col" style="font-weight: 500;">Order Date</th>
     
      <th scope="col" style="font-weight: 500;">Tracking</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql_order=mysqli_query($conn,"select * from orders where user_order_id = '".$_SESSION['user_id']."' ");
    while($row3=mysqli_fetch_array($sql_order)){
    ?>
    <tr>
        <td><?php echo $row3[0] ?></td>
        
        <td><?php echo $row3[2] ?>, <?php echo date("g:i a", strtotime($row3[3] ));  ?></td>
        <td style="text-transform:Uppercase;" ><?php echo $row3[4] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
            </div>
            </div>
                <?php }
                 else if(isset($_GET['wishlist'])){
                    ?>
                    
            <div class="col-lg-6"><br>
            <h4><b>Wishlist</b></h4>
            <table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-weight: 500;">Item</th>
      <th scope="col" style="font-weight: 500;">Details</th>
     
      <th scope="col" style="font-weight: 500;">Price</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql_order=mysqli_query($conn,"select * from wishlist
    
    join item_master on item_master.id = wishlist.item_id
        where user_id = '".$_SESSION['user_id']."' ");
       

    while($row3=mysqli_fetch_array($sql_order)){
    ?>
    <tr>
        <td>
        <?php echo $row3[0] ?>
        </td>
        
        <td  ><b><a href="product_details.php?id=<?php echo $row3[1] ?>"><?php echo $row3['item_name'] ?></a></b><br>

        <span style="color:grey;font-size: 13px;">
        <?php 
        
        
        echo $row3['item_description'];
        
      ?></span>
    </td>
        <td style="text-transform:Uppercase;" ><br>RS. <?php echo $row3['item_price'] ?></td>
        <form action="" method="post">    
        <td><br><a href="?remove1=<?php echo $row3[0] ?>" title="Delete Wishlist" ><img src="img/heart.png"  style="width: 20px;" alt=""></a></td>
        </form>
    </tr>
    <?php } 
    
   

    ?>
  </tbody>
</table>


            </div>
                    <?php
                 }
                ?>






            <?php 
                if(isset($_POST['btn_address'])){
                    $address_label=$_POST['address_label'];
                    $firstname=$_POST['firstName'];
                    $lastname=$_POST['lastName'];
                    $phNo=$_POST['phoneNumber'];
                    $city=$_POST['city'];
                    $streetAd=$_POST['streetAddress'];
                    $building=$_POST['building'];
                    $floor=$_POST['floor'];
                    $postalcode=$_POST['postalcode'];
                    $user=$_SESSION['user_id'];

                    $address_query=mysqli_query($conn,"INSERT INTO `billing_address`(`user_id`, `address_label`, `firstName`, `lastName`, 
                    `phone_no`, `city`, `street_address`, `appartment`, `floor`, `postal_code`)
                    VALUES ('$user' , '$address_label' ,'$firstname' ,'$lastname','$phNo' ,'$city',' $streetAd',
                    ' $building','$floor','$postalcode')" );
                     
                     if($address_query){
                        ?>
                              <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            
                            swal("Address Updated!", "Successfully ❤️️");
      
                            setTimeout(function(){
                                window.location.href = 'myaccount.php?address';
                                }, 700);
                                
                        </script>
                        <?php
                        // echo "<script>window.location.href ='myaccount.php?address'</script>";
                
                    }
                }
                // }
                
            ?>



        <style>
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
        <div class="col-lg-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>
