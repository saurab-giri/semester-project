
<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_login WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);
}
?>


<div class="form-div form-group bg-dark text-white">
	<h3 class="text-center head">Edit Admin</h3>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
	<div class="form-input form-group ">
		<label class="col-form-label col-2">Username: </label>
		<input type="text" name="username" class="col-sm-2 input form-control-static" value="<?php echo $sch_row['username'];?>"required>
	</div>
	<div class="form-input form-group ">
		<label class="col-form-label col-2">Email: </label>
		<input type="email" name="email" class="col-sm-2 input form-control-static" value="<?php echo $sch_row['email'];?>"required>
	</div>
	<div class="form-input form-group">
		<label class="col-form-label col-2">Old Password: </label>
		<input type="text" name="password" class="col-sm-2 input form-control-static"  value="<?php echo $sch_row['password'];?>"  required>

	</div>
	<div class="form-input form-group">
		<label class="col-form-label col-2">New Password: </label>
		<input type="text" name="newpassword" class="col-sm-2 input form-control-static"  value=""  required>
		<div class="msg">
			<?php
	        if(isset($_SESSION["PassError"])){
	            echo $_SESSION['PassError'];
	            unset($_SESSION["PassError"]);
	        }
	   		 ?>  
		</div>
		<div class="msg">
			<?php
	        if(isset($_SESSION["Error"])){
	            echo $_SESSION['Error'];
	            unset($_SESSION["Error"]);
	        }
	   		 ?>  
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
	<div class="submit-botton">
		<input type="submit" name="edit_admin" value="Edit Admin" class="btn btn-info"/></tr>
	</div>
</form>
</div>