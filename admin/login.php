<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<script src='assets/bootstrap/js/bootstrap.min.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
</head>
<body class="login-box">
		<div class="box text-center">
			<img src="../images/login1.png" class="login-img">
			<form class="form" method="post" action="action.php"  enctype="multipart/form-data">
				<div class="form-input">
				<i class="fa fa-user"></i>
				<label>Username</label>
					<input type="text" name="username" class="login-input" required  placeholder="username">
				</div>
				<div class="form-input">
				<i class="fa fa-key"></i>
				<label>Password</label>
					<input type="password" name="password" class="login-input" placeholder="password" required>
				</div>
				<div class="msg">					
					<span>
						<?php if( isset($_SESSION['Error']) ){
							echo $_SESSION['Error'];
							unset($_SESSION['Error']);			
						}
						?>
					</span>    
            	</div>
				<input type="submit" name="login_submit" value="LOGIN" class="btn-login"><br>
				<input type="checkbox" name="remember"><span class="keep-login">keep me login</span>
				
			</form>
		</div>
	</body>
</html>