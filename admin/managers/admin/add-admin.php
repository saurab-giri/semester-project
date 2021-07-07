<?php
session_start();
?>
 <div class="form-div form-group bg-dark text-white">
 	<h3 class=" text-center head">Add New Admin</h3>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
	<div class="form-input form-group ">
		<label class="col-form-label col-sm-1">Username</label>
		<input type="text" name="username" class="col-sm-2 input form-control-static" placeholder="username" required>
	</div>
	<div class="form-input form-group">
		<label class="col-form-label col-sm-1">Password</label>
		<input type="password" name="password" class="col-sm-2 input form-control-static" placeholder="password" required>
	</div>
	<div class="msg">
		<?php
	        if(isset($_SESSION["Error"])){
	            echo $_SESSION['Error'];
	            unset($_SESSION["Error"]);
	        }
	   		 ?>  
	</div>
	<div class="submit-botton">
		<input type="submit" name="add_admin" value="Add Admin" class="btn btn-info"/></tr>
	</div>
</form>
</div>
