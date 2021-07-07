<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_schedule WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);
}


?>

<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Edit Schedule</h3>
    <table align="center">
      <tr><td>Day</td><td><input type="text" name="day" value="<?php echo $sch_row['day'];?>" class="form-control" required/></td></tr>
      <tr><td>Time</td><td><input type="text" name="time" value="<?php echo $sch_row['time'];?>" class="form-control" required/></td></tr>
        </tr> 
        <tr><td>Session</td><td><input type="text" name="session" value="<?php echo $sch_row['session'];?>" class="form-control" required/></td></tr>
        <tr><td>Shift</td><td><input type="text" name="class" value="<?php echo $sch_row['class'];?>" class="form-control" required/></td></tr>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <tr class="edit-btn"><td ><br><input type="submit" name="edit_schedule" value="Edit Schedule" class="btn btn-info"/></td></tr>
    </table>  
  </div>

</form>

