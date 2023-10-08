<?php



include '../db/conn.php';


if(! empty($_POST['cityid'])){
    $query1=mysqli_query($conn,"select * from city where state_id = '".$_POST['cityid']."'");
    

?>
  <option value disabled selected >Select City</option>

<?php 

foreach($query1 as $city)
{


?>
<option value="<?php  echo $city["city_id"] ?>"><?php  echo $city["city_title"] ?></option>
<?php } 

}

?>