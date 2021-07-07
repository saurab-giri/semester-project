<?php 
session_start();
?>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
	<div class="form-div form-group bg-dark text-white">
		<h3 class="text-center head">Payment Information</h3>
		<table align="center">
			<tr>
				<td>Name: </td>
				<td>
					<input type="text" name="name" class="form-control" required />
				</td>
			</tr>
			<tr>
				<td>Phone: </td>
				<td>
				<input type="text" name="phone" class="form-control" required />
				</td>
			 	<td class="msg"><?php
			        if(isset($_SESSION["contact_message"])){
			            echo $_SESSION['contact_message'];
			            unset($_SESSION["contact_message"]);
			        }
			   		 ?> 
			   	</td>
			</tr>
			<tr>
				<td>Email: </td>
				<td>
					<input type="text" name="email" class="form-control" required />
				</td>
				<td class="msg email-msg error">         
			    <span>
			      <?php if( isset($_SESSION['email_message']) ){
			        echo $_SESSION['email_message'];
			        unset($_SESSION['email_message']);      
			      }
			      ?>
			    </span>    
		     </td>
			</tr>
			
			<tr>
				<td class="time-input">Choosen Package:</td>
			 	<td class="form-check-inline choose-input">
			  	
			   		<input type="radio" class="form-check-input" name="package" value="1 month"> 1 month Package
			
				</td>
				<td class="form-check-inline choose-input">
					
					<input type="radio" class="form-check-input" name="package" value="2 month"> 2 month Package
					
				</td>
				<td class="form-check-inline choose-input">
					
					<input type="radio" class="form-check-input" name="package" value="3 month"> 3 month Package
					
				</td>
			</tr>
			<tr>
				<td>Received Amount: </td>
				<td>
					<input type="text" name="received" value="0" class="form-control"/>
				</td>
			</tr>
			<tr>
				<td>Payment Date: </td>
				<td>
					<input type="date"  name="pay-date" class="form-control" required>
				</td>
			</tr>
			<tr>
				<td>Expire Date: </td>
				<td>
					<input type="date"  name="expire-date" class="form-control" required>
				</td>
			</tr>
			<tr><td></td><td><br><input type="submit" name="add_payment" value="Save Data" class="btn btn-info"/></td></tr>
		</table> 
	</div> 
</form>

