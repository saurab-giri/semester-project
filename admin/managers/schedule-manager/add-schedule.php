


<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Add New Schedule</h3>
    <table align="center">
      <tr><td>Day</td><td><select class="time-input" name="day">
            <option value="Sunday">Sunday</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>

          </select></td></tr>
      <tr><td>Time</td><td><input type="time" name="time1" placeholder="Time" class="time-input" required> -  
		  <input type="time" name="time2"  placeholder="Time" required></td></tr>
        </tr> 
        <tr><td>Session</td><td><input type="text" name="session" placeholder="Session" class="form-control" required></td></tr>
        <tr><td>Shift</td>
        	<td>
        	<select class="time-input" name="class">
    			  <option value="Morning Shift">Morning Shift</option>
    			  <option value="Evening Shift">Evening Shift</option>
    			  <option value="Extra Shift">Extra Shift</option>
    			</select>
			</td>
		</tr>
      <tr class="edit-btn"><td ><br><input type="submit" name="add_schedule" value="Add Schedule" class="btn btn-info"/></td></tr>
    </table>  
  </div>

</form>

