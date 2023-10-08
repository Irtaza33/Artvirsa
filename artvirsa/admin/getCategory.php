<?php



include '../db/conn.php';


if(! empty($_POST['category_id'])){
    $query=mysqli_query($conn,"select * from category where AG_id = '".$_POST['category_id']."'");
    

?>
  <option value disabled selected >Select Category</option>

<?php 

foreach($query as $category)
{


?>
<option value="<?php  echo $category["cat_id"] ?>"><?php  echo $category["cat_des"] ?></option>
<?php } 

}

?>