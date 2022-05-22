<?php
$id = isset($_GET['id'])?$_GET['id']:'';
$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM gym_trainer WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $sch_row = mysqli_fetch_assoc($result);
    //print_r($sch_row);
}


?>

</form>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Edit Trainer Information</h3>
    <table align="center">
     <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $sch_row['name'];?>" class="form-control"/></td></tr>
      <tr><td>Address: </td><td><input type="text" name="address" value="<?php echo $sch_row['address'];?>" class="form-control"/></td></tr>
       </tr> 
       <tr><td>Phone: </td><td><input type="number" name="phone" value="<?php echo $sch_row['phone'];?>" class="form-control"/></td>
        <td class="msg"><?php
              if(isset($_SESSION["contact_message"])){
                  echo $_SESSION['contact_message'];
                  unset($_SESSION["contact_message"]);
              }
             ?> 
          </td>
       </tr>
       <tr><td>Email: </td><td><input type="email" name="email" value="<?php echo $sch_row['email'];?>" class="form-control"/></td></tr>
       </tr>
        <tr><td>Professional: </td><td><input type="text" name="qualification" value="<?php echo $sch_row['qualification'];?>" class="form-control"/></td></tr>
       </tr>
       <tr><td>Image: </td>


            <td>image available
              <?php 
              if(!empty($sch_row['image'])){?>
              <img src="<?php echo SITE_URL.'/admin/images/'.$sch_row['image'];?>" width="50" height="50">
              <?php }else{?>
              <p>No Image</p>
              <?php }?></td>
            
              </tr>
        <tr><td></td><td><input type="file" name="uploadfile" class="image-input form-control"  value="<?php echo $sch_row['image'];?>"></td>
       </tr>
       <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <tr><td></td><td><br><input type="submit" name="edit_trainer" value="Edit Trainer" class="btn btn-info"/></td></tr>
    </table>  
  </div>
</form>