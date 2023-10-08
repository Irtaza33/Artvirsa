<?php



include '../db/conn.php';


if(! empty($_POST['state_id1'])){
    $query=mysqli_query($conn,"select * from state where country_id = '".$_POST['state_id1']."'");
    

?>
  <option value disabled selected >Select State</option>

<?php 

foreach($query as $state)
{


?>
<option value="<?php  echo $state["state_id"] ?>"><?php  echo $state["state_title"] ?></option>
<?php } 

}

?>