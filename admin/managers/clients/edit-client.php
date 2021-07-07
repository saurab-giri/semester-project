<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_clients WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);  
}
?>

<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
  <div class="form-div form-group bg-dark text-white">
  <h3 class="text-center head">Edit Client Detail</h3>
<table align="center">
     <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $sch_row['name'];?>" class="form-control col-sm-8" required/></td></tr>
     <tr><td>Address: </td><td><input type="text" name="address" value="<?php echo $sch_row['address'];?>" class="form-control col-sm-8"/></td></tr>
       </tr>
       <tr><td>Age: </td><td><input type="text" name="age" value="<?php echo $sch_row['age'];?>" class="form-control col-sm-8"/></td></tr>
       </tr>
      <tr><td>Phone: </td><td><input type="text" name="phone" value="<?php echo $sch_row['phone'];?>" class="form-control col-sm-8"/></td></tr>
       </tr> 
       <tr>
        <td>Gender: </td>
        <td class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gender" <?php if($sch_row['gender'] == "male") { echo "checked"; }?> value="Male"/>male
          </label>
          </td>
        <td class="form-check-inline">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" <?php if($sch_row['gender'] == "female") { echo "checked"; }?> value="Female"/>Female
          </label>
        </td>
      </tr>
       <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $sch_row['email'];?>" class="form-control col-sm-8"/></td></tr>
       </tr>
        <tr><td>Image: </td><td><input type="file" name="uploadfile" class="form-control"  value="<?php echo $sch_row['image'];?>"></td></tr>
       </tr>
       <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <tr><td></td><td><br><input type="submit" name="edit_client" value="Edit Client" class="btn btn-info"/></td></tr>
    </table>  
  </div>