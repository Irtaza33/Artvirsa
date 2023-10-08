<?php



include '../db/conn.php';

if($_REQUEST['status']) {

   
   
	$sql = " update orders set order_status = '".$_REQUEST['status']."' where O_id ='".$_REQUEST['id']."' ";

	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	

    $sql2 = mysqli_query($conn,"update order_details set order_status = '".$_REQUEST['status']."' where U_order_id = '".$_REQUEST['id']."' ");


} else {
	echo 0;	
}


?>