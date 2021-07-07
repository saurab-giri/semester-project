<?php
$id = isset($_GET['id'])?$_GET['id']:'';
$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM gym_visitor WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $sch_row = mysqli_fetch_assoc($result);
    //print_r($sch_row);
}


?>

<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-group form-control bg-dark text-white">
    <h3 class="text-center head">Edit Visitor Information</h3>
    <table align="center">
      <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $sch_row['name'];?>" class="form-control"/></td></tr>
        <tr><td>Address: </td><td><input type="text" name="address" value="<?php echo $sch_row['address'];?>" class="form-control"/></td></tr>
      </tr> 
      <tr><td>Contact: </td><td><input type="text" name="contact" value="<?php echo $sch_row['contact'];?>" class="form-control"/></td></tr>
       </tr> 
        <tr><td>Age: </td><td><input type="text" name="age" value="<?php echo $sch_row['age'];?>" class="form-control"/></td></tr>
       </tr>
       <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $sch_row['email'];?>" class="form-control"/></td></tr>
       </tr>
       <tr><td>Shift: </td><td><select class="" name="shift" value="<?php echo $sch_row['shift'];?>"> 
          <option value="<?php echo $sch_row['shift'];?>"><?php echo $sch_row['shift'];?></option>
          <option value="Morning Shift">Morning Shift</option>
          <option value="Evening Shift">Evening Shift</option>
          <option value="Extra Shift">Extra Shift</option>
        </select></td></tr>
       </tr>
       <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <tr><td></td><td><br><input type="submit" name="edit_visitor" value="Edit Visitor" class="btn btn-info"/></td></tr>
    </table>  
  </div>
</form>