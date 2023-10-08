<?php



include '../db/conn.php';


if(! empty($_POST['subCat_id'])){
    $query1=mysqli_query($conn,"select * from sub_category where sub_cat_cat_id = '".$_POST['subCat_id']."' ");
    

?>
  <option value disabled selected >Select Sub Category</option>

<?php 

foreach($query1 as $subcategory){
?>
<option value="<?php  echo $subcategory['sub_cat_id'] ?>"><?php  echo $subcategory['sub_cat_des']; ?></option>
<?php } }?>