<?php 
include('../db/conn.php');

//cat from index.php
if(isset($_POST['search'])){
    $word=mysqli_real_escape_string($conn,$_POST['search']);
  
    if($word=="" ){
        $word=$_POST['search'];
       
        header("location:../search.php?search=$word");
        exit();
    }
    header("location:../search.php?search=$word");
    exit();
}
?>