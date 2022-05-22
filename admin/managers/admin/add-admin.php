
 <div class="form-div form-group bg-dark text-white">
 	<h3 class=" text-center head">Add New Admin</h3>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
	<div class="form-input form-group ">
		<label class="col-form-label col-sm-1">Username : </label>
		<input type="text" name="username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>" class="col-sm-2 input form-control-static" placeholder="username" required>
		<div class="msg">
			<?php
	        if(isset($_SESSION["UserError"])){
	            echo $_SESSION['UserError'];
	            unset($_SESSION["UserError"]);
	        }
	   		 ?>  
		</div>
		<div class="msg">
			<?php
	        if(isset($_SESSION["UsernameError"])){
	            echo $_SESSION['UsernameError'];
	            unset($_SESSION["UsernameError"]);
	        }
	   		 ?>  
		</div>

	</div>
	<div class="form-input form-group ">
		<label class="col-form-label col-sm-1">Email : </label>
		<input type="email" name="email" class="col-sm-2 input form-control-static" placeholder="username" required>
	</div>
	<div class="form-input form-group">
		<label class="col-form-label col-sm-1">Password : </label>
		<input type="password" name="password" class="col-sm-2 input form-control-static" placeholder="password" required>
		<div class="msg">
			<?php
	        if(isset($_SESSION["PassError"])){
	            echo $_SESSION['PassError'];
	            unset($_SESSION["PassError"]);
	        }
	   		 ?>  
		</div>
	</div>
	<div class="form-input form-group">
		<label class="col-form-label col-sm-1">Confirm Password : </label>
		<input type="password" name="confirm_password" class="col-sm-2 input form-control-static" placeholder="confirm password" required>
		<div class="msg">
		<?php
	        if(isset($_SESSION["ConPassError"])){
	            echo $_SESSION['ConPassError'];
	            unset($_SESSION["ConPassError"]);
	        }
	   		 ?>  
	</div>
	</div>
	
	<div class="submit-botton">
		<input type="submit" name="add_admin" value="Add Admin" class="btn btn-info"/></tr>
	</div>
</form>
</div>
