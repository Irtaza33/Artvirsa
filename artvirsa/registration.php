<?php include 'header.php' ?>
<?php
include 'mail_function.php';
include 'db/conn.php';


 date_default_timezone_set("Asia/Karachi");


$success="";
$error_msg="";


if(isset($_POST["submit_email"])){
	$email = $_POST["email"];

	
	$_SESSION['Oemail']=$email;
	
	 
        $result1 = mysqli_query($conn,"select * from users where email='".$_POST["email"]."'");  
				
        if(mysqli_num_rows($result1)) {
            $result1 = mysqli_query($conn,"select * from users where email='".$_POST["email"]."'");  
            $count = mysqli_fetch_array($result1);	
        }
        else{
        $sql=mysqli_query($conn,"insert into users (email,country) VALUES('$email','1')") ;
		
        $result1 = mysqli_query($conn,"select * from users where email='".$_POST["email"]."'");  
		
        $count = mysqli_fetch_array($result1);
		

            }
       
		
       
	
		$results=mysqli_query($conn,"SELECT * FROM otp_exp WHERE  otp_expry=1 AND otp_email = '".$_POST["email"]."'  ") or die("error");
	
		if(isset($count[2]) == $email){
           
			
					
							  //Random OTP
								 $otp = rand(1000,9999); 
								   //sending otp
								   $sub="Verify your email address , Your OTP is: $otp";
								   $message_body = "
								   Hey! <b> $email, </b> <br>
								   <br>
								   To finish setting up your account,<br>
								   <br>
								   we just need to make sure that this email address is yours.<br>
								   To verify your email address, use this security code: <b> $otp </b><br>
								   <br> If you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.<br>
								   <b>Thanks,</b> <br>
								   <br>
								   <b>The account team  </b>";
								  $mail_status = smtp_mailer($_POST["email"],$sub,$message_body);
		   
								 if($mail_status == true){
			
			
										  $result2 = mysqli_query($conn,"INSERT INTO `otp_exp`(`otp_code`, `otp_expry`, `otp_email`, `otp_date`) VALUES 
											 ('$otp','0','".$_POST["email"]."', '".Date('Y-m-d H:i:s') ."' )");
			 									
											 $current_id = mysqli_insert_id($conn);
		   
											  if(!empty($current_id)){
										   $success=1;
											  }else {
										  $error_msg = "id = ".$current_id;}
			
								 }
								
						 
		   }
		   else{ $error_msg ="Email does not exists!";}
					

	
		
	
		   
	 }    

	        
if(isset($_POST["submit_otp"])){
	
    
	$o1=$_POST['o1'];
	$o2=$_POST['o2'];
	$o3=$_POST['o3'];
	$o4=$_POST['o4'];
	
	$ottp = $o1.$o2.$o3.$o4;
	 $emailss=$_POST['otpemail'];

    $q = "SELECT * FROM   otp_exp  WHERE  otp_code = $ottp 
    AND otp_expry=0 AND NOW() <= DATE_ADD(otp_date,INTERVAL 15 MINUTE) " ;
   $result3 = mysqli_query($conn,$q);

    $count = mysqli_num_rows($result3);

    if(!empty($count)){
		

        $q1=" UPDATE otp_exp SET otp_expry = 1 WHERE otp_code = $ottp   ";
         $result4 = mysqli_query($conn,$q1);

		 $_SESSION['email'] = $emailss;
	
		
		 echo "<script>window.location.href ='myaccount.php?profile'</script>";
		 
     //header('Location: login.php'); 
     
        } else {
            $success=1;
            $error_msg="Invalid OTP!";
        
    }

    
}	
	

	  
?>

<style>   #redBtn{
						height: 50px;
					
						border-radius: 0;
						
						}
							.Hbtn{
                		background-color: #700f1a;
						border-color: #700f1a;
						margin-top: -4px;
					}
					.Hbtn:hover{
						background-color: white;
						color: #700f1a;
						border-color:#700f1a ;
					}
					#redBtn1{
						height: 50px;
						width: 80px;
						border-radius: 0;
						
						}

						
            
						</style>

<script> 
        $(window).ready(function() {
        $("#reg_form").on("keypress", function (event) {
            console.log("aaya");
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                
                event.preventDefault();
                return false;
            }
        });
        });
  
    </script> 
	<style>
						@media screen and (max-device-width: 480px)
									and (orientation: portrait) {
									#emailss {
										width: 100%;
									}
									.Hbtn{
										width: 100%;
										margin-top: 10px;
									}
									}
									
							/* For Desktop View */
								@media screen and (min-width: 1024px) {
									#emailss {
										width: 400px;
								}
								.Hbtn{
										width: 150px;
										
									}
								}

								@media screen and (min-width: 800px) {
									#emailss {
										width: 400px;
								}
								.Hbtn{
									width: 150px;

									}
								}
								
								@media screen and (min-width: 768px) {
									#emailss {
										width: 400px;
								}
								.Hbtn{
									width: 150px;

									}
								}

								/* For Tablet View */
									@media screen and (max-width: 720px)
								{
										#emailss  {
										width: 100%;
									}
									.Hbtn{
										width: 100%;
										margin-top: 10px;

									}
									}
 
					 </style>
<section>
    <div class="container">
        <div class="row">
            <div class="col lg-2"></div>
            <div class="col-lg-6">
            <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<!-- <img  src="images/png-clipart-logistics-warehouse-management-system-cargo-cross-docking-warehouse-miscellaneous-transport-thumbnail-removebg-preview.png" alt="IMG"> -->
									</div>
                                <br>
									<form class="login100-form validate-form" method="post" id="reg_form"  >
										<span class="login100-form-title">
                                             Log in to your account
										</span>

										
					<?php  if($success== 1) { ?>
						

						<p style="color: black; font-size: 20px;"> Check your Email for the OTP </p>
						<br>
						<div class=""  >
					 <label for="" style="font-size: 12px;" >Enter Your Email</label><br>    

							<input type="text" name="otpemail"  value="<?php echo 	$_SESSION['Oemail']; ?>"   disabled style="height: 50px;width: 400px;" id=""   >
							<button type="submit"   id="redBtn"  class="btn btn-danger Hbtn" style=""  >SEND PIN</button>
							
             		</div><br><br>

						<div class="form-group">
						<label for="" style="font-size: 12px" >Enter Verification Code</label><br>    
							<input type="hidden" name="otpemail" value="<?php echo 	$_SESSION['Oemail']; ?>"  id="">


							<!-- <input type="text" name="otp" style="height: 50px;width: 200px;letter-spacing: 5px;" maxlength="6"   required >   -->
							
<style>
  #otppp{
	float: left;
  width: 40px;
  height: 50px;
  border-top: none;
  border-left: none;
  border-right: none;
  margin-left: 4px;
  background-color: #E5E7E9;
  font-size: 20px;
  text-align: center;
  outline: none;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
} 
</style>
 
        <input id="otppp" name="o1" oninput="inputInsideOtpInput(this)"
               maxlength="1" type="number">

        <input id="otppp" name="o2" oninput="inputInsideOtpInput(this)"
               maxlength="1" type="number">

        <input id="otppp" name="o3" oninput="inputInsideOtpInput(this)"
               maxlength="1" type="number">

        <input id="otppp" name="o4" oninput="inputInsideOtpInput(this)"
               maxlength="1" type="number">

    

    <script>

      
      function inputInsideOtpInput(el) {
            if (el.value.length > 1){
                el.value = el.value[el.value.length - 1];
            }
            try {
                if(el.value == null || el.value == ""){
                    this.foucusOnInput(el.previousElementSibling);
                }else {
                    this.foucusOnInput(el.nextElementSibling);
                }
            }catch (e) {
                console.log(e);
            }
        }

       function foucusOnInput(ele){
           ele.focus();
           let val = ele.value;
           ele.value = "";
           // ele.value = val;
           setTimeout(()=>{
               ele.value = val;
           })
       }
    </script>

							<input type="submit" id="redBtn1" name="submit_otp" value="submit" style="margin-left: 20px;margin-top: 1px;" class="btn btn-danger Hbtn tableheader" >  
						
						</div>

							<br>
						
						


							<br>
						
							
							<?php  
						} else if ($success == 2){
						
						
							?>
						<p style="color: #31ab00; font-weight: bold; font-size: 20px; "> Welcome, You have successfully verified!  </p>
						<?php
						
						
						}
						else{
						?>
						
						<div  style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"> </div>
						<br>
						<!-- <div class="form-group">
                        <label for="" style="font-size: 12px;" >Enter Your Email</label><br>    
						
                        <input class="" style="height: 45px;" type="email" name="email"
						placeholder="" required >   </div>

						<div  class=""> <input type="submit"
						name="submit_email" class="btn btn-danger" value="SEND PIN" style="height:45px ;color: white;background-color: #700f1a;border-color: #700f1a;"   > 
					 </div> -->
					 

						<br>
					 <div class=""  >
					 <label for="" style="font-size: 12px;" >Enter Your Email</label><br>    

							<input type="text" name="email" style="height: 50px;margin-top:20px" id="emailss" required  >
							<button type="submit"  value="SEND PIN" id="redBtn" name="submit_email" class="btn btn-danger Hbtn" >SEND PIN</button>
							
             		</div>	
						<?php
						}
						?><br><br><br><br>
						
						<?php  
						if(!empty($error_msg)){
						?>
						<div style="color: red; font-weight: bold; font-size: 20px;" class="message error_message"><?php echo $error_msg ?>    <br> </div>
						
						<?php 
						}
						?>

						
						</div>
						<br>
						
					

					<div class="text-center p-t-136">
						
					</div>
				</form>
			</div>
		</div>
	
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php' ?>