<?php
session_start();
include 'db/conn.php';

if(isset($_POST["radio_a"])){
$id=$_POST['radio_a'];
	$query2=mysqli_query($conn,"update tob_billing_address set billing_activate= '' where billing_user_id= '".$_SESSION['user_id']."'");
 $query = "update tob_billing_address set billing_activate= '1'  where billing_user_id= '".$id."'";
 $result=mysqli_query($conn,$query);

 echo "<script>window.location.href ='myaccount.php?address'</script>";

	
}

?>