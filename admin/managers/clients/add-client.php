
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class=" form-div form-group bg-dark text-white">
    <h3 class="text-center head">Add New Client</h3>
      <table align="center">
       <tr><td>Name:</td><td><input type="text" name="name"  class="form-control" required /></td></tr>
        <tr><td>Address:</td><td><input type="text" name="address" class="form-control" required /></td></tr>
        <tr><td>Age:</td><td><input type="number" name="age" class="form-control" required /></td>
                <td class="msg"><?php
              if(isset($_SESSION["age_message"])){
                  echo $_SESSION['age_message'];
                  unset($_SESSION["age_message"]);
              }
             ?> 
          </td></tr>
        <tr><td>Phone:</td><td><input type="number" name="phone" class="form-control" required /></td>
        <td class="msg"><?php
              if(isset($_SESSION["contact_message"])){
                  echo $_SESSION['contact_message'];
                  unset($_SESSION["contact_message"]);
              }
             ?> 
          </td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
        <tr>
  				<td class="time-input">Gender:</td>
  			 	<td class="form-check-inline">
  			  		<label class="form-check-label">
  			   			<input type="radio" class="form-check-input" name="gender" value="male"> Male
  			 		</label>
  					</td>
  				<td class="form-check-inline ">
  						<label class="form-check-label">
  						<input type="radio" class="form-check-input" name="gender" value="female"> Female
  					</label> 
  				</td>
  			</tr>
        <tr><td>Email:</td><td><input type="email" name="email" class="form-control"  required /></td>
          <td class="msg email-msg error">         
          <span>
            <?php if( isset($_SESSION['email_message']) ){
              echo $_SESSION['email_message'];
              unset($_SESSION['email_message']);      
            }
            ?>
          </span>    
         </td></tr>
        <tr>
          <td class="label">Image: </td>
          <td><input type="file" name="uploadfile" class="form-control"/></td>
        </tr> 
        <tr><td></td><td><br><input type="submit" name="add_client" value="Add Client" onClick="history.back()" class="btn btn-info"/></td></tr>
      </table>  
      </div>
</form>


