<?php



include '../db/conn.php';


if(! empty($_POST['category_id'])){
    $query1=mysqli_query($conn,"select * from category where AG_id = '".$_POST['category_id']."'");
    

?>
  <option value disabled selected >Select Category</option>

<?php 

foreach($query1 as $cat)
{


?>
<option value="<?php  echo $cat["cat_id"] ?>"><?php  echo $cat["cat_des"] ?></option>
<?php } 

}

?>