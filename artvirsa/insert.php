<?php
session_start();
include 'db/conn.php';

if(isset($_POST["radio_a"])){
$id=$_POST['radio_a'];
	$query2=mysqli_query($conn,"update billing_address set extra1= '' where user_id= '".$_SESSION['user_id']."'");
 $query = "update billing_address set extra1= '1'  where id= '".$id."'";
 $result=mysqli_query($conn,$query);

 echo "<script>window.location.href ='myaccount.php?address'</script>";

	
}

?>