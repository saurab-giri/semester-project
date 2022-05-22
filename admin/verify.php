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
				<p class="msg">Please enter your email here, we will send you your information.</p>
				<div class="form-input">
				<i class="fa fa-user"></i>
				<label>Enter your email</label>
					<input type="email" name="email" <?php echo isset($_POST['email'])?$_POST['email']:''; ?> class="login-input" required  placeholder="email">
				</div>
				<div class="msg">					
					<span>
						<?php if( isset($_SESSION['mail_message']) ){
							echo $_SESSION['mail_message'];
							unset($_SESSION['mail_message']);			
						}
						?>
					</span>    
            	</div>
				
				<input type="submit" name="verify" value="Verify Email" class="btn-login"><br>
				<div class="msg success">					
					<span>
						<?php if( isset($_SESSION['mail_message_success']) ){
							echo $_SESSION['mail_message_success'];
							unset($_SESSION['mail_message_success']);			
						}
						?>
					</span>    
            	</div>
				<a href="login.php" class="login-btn">Login Here <i class="fa fa-arrow-right"></i> </a>
				
			</form>
		</div>
	</body>
</html>