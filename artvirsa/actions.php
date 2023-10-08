<?php 
include 'db/conn.php';

if (isset($_POST['addCart'])) {
    $p_id = $_POST['addCart'];
    session_start();


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=array();
    }
    if (in_array($p_id,$_SESSION['cart']))  //check the item already in the cart
     {
         echo $_SESSION['message']=" Item Already In The Cart";
    }
    else {
        array_push($_SESSION['cart'],$p_id);
        echo $_SESSION['message']=" Item Added In The Cart";

    }
   // print_r($_SESSION['cart']);
}   
?>