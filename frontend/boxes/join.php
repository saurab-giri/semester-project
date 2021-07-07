<?php
session_start();
 ?>
<div class="form-container">
	<div class="container">
		<h2 class="text-center">Fill Up the form</h2>
		<div class="main-form">
			<form class="form" method="post" action='action.php' enctype="multipart/form-data">
				<div class="form-input form-group ">
					<label class="col-form-label">FullName :</label>
					<input type="text" name="name" class="col-2 input form-control-static" placeholder="Name" required>
				</div>
				<div class="form-input form-group ">
					<label class="col-form-label">Address :</label>
					<input type="text" name="address" class="col-2 input form-control-static" placeholder="Address" required>
				</div>
				<div class="form-input form-group ">
					<label class="col-form-label">Age :</label>
					<input type="text" name="age" class="col-1 input form-control-static" placeholder="Age" required>
				</div>
				<div class="form-input form-group ">
					<label class="col-form-label">Contact no. :</label>
					<input type="text" name="contact" class="col-2 input form-control-static" placeholder="Contact" required>
				</div>
				<div class="msg email-msg error">					
					<span>
						<?php if( isset($_SESSION['contact_message']) ){
							echo $_SESSION['contact_message'];
							unset($_SESSION['contact_message']);			
						}
						?>
					</span>    
            	</div>
				<div class="form-input form-group ">
					<label class="col-form-label">Email :</label>
					<input type="text" name="email" class="col-2 input form-control-static" placeholder="Email" required>
				</div>
				<div class="msg email-msg error">					
					<span>
						<?php if( isset($_SESSION['email_message']) ){
							echo $_SESSION['email_message'];
							unset($_SESSION['email_message']);			
						}
						?>
					</span>    
            	</div>
				<div class="form-input form-group">
					<label class="col-form-label col-2">Shift :</label>
					<select class="col-form-label col-2" name="shift">
					  <option value="Morning Shift">Morning Shift</option>
					  <option value="Evening Shift">Evening Shift</option>
					  <option value="Extra Shift">Extra Shift</option>
					</select>
				</div>
				<div class="submit-botton text-center">
					<input type="submit" name="add_form" value="Submit Form" class="btn btn-danger"/></tr>
				</div>
				<div class="msg">					
					<span>
						<?php if( isset($_SESSION['message']) ){
							echo $_SESSION['message'];
							unset($_SESSION['message']);			
						}
						?>
					</span>    
            	</div>	
			</form>
		</div>
	</div>	
</div>