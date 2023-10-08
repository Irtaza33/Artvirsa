<?php



include 'db/conn.php';

if($_REQUEST['qty1'] || $_REQUEST['price1']) {
    
   
	$sql = "update cart set quantity = '".$_REQUEST['qty1']."' , price = '".$_REQUEST['price1']."' where id='".$_REQUEST['id1']."' ";

	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	



} else {
	echo 0;	
}


?>