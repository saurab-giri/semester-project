<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_equipment WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);  
}
?>


<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
  <div class="form-div form-group bg-dark text-white">
  <h3 class="text-center head">Edit Equipment Detail</h3>
  <table align="center">
    <tr>
      <td>Equipment Name: </td>
      <td>
        <input type="text" name="equipment_name" value="<?php echo $sch_row['equipment_name'];?>" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td>Description: </td>
      <td>
        <textarea type="text" name="description" class=" input form-control" required><?php echo $sch_row['description'];?></textarea>
      </td>
    </tr> 
    <tr>
      <td>Quantity: </td>
      <td>
        <input type="text" name="quantity" class=" input form-control" value="<?php echo $sch_row['quantity'];?>"required>
      </td>
    </tr>
    <tr>
      <td>image: </td>
      <td>
        <input type="file" name="uploadfile" class="image-input form-control">
      </td>
    </tr>
     <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <tr><td></td><td><br><input type="submit" name="edit_visitor" value="Edit Visitor" class="btn btn-info"/></td></tr>
  </table>
</div>
</form>
   