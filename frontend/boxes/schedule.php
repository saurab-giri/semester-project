<?php 
  	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gym-new";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM gym_schedule";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
	?>
<div class="schedule-box">
	<div class="container">
		<div class="schedule">
			<h3>Schedules</h3>
		</div>
		<h5>Morning Classes</h5>
		<div class="morning-group table-responsive-sm">
			<table class="table-bordered schedule-table" style="width:100%">
				<?php while($row = mysqli_fetch_assoc($result)) { 
					//print_r($row); ?>
			  <tr>
			    <th>Days</th>
			    <th><?php echo $row['time']?></th>
			    <th>7:30-8:30</th>
			    <th>8:30-9:30</th>
			    <th>9:30-10:30</th>
			  
			  </tr>
			  <tr>
			    <td><?php echo $row['day']; ?></td>
			    <td><?php echo $row['session'];?></td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr>
			  
			<?php }}?>
			</table>
		</div>
		<div class="evening row">
			<div class="evening-group col-8">
				<h5>Evening Group Classes</h5>
				<table class="table-bordered schedule-table" style="width:100%">
				  <tr>
				    <th>Days</th>
				    <th>6:30-7:30</th>
				    <th>7:30-8:30</th>
				    <th>8:30-9:30</th>
				  </tr>
				  <tr>
				    <td>Sunday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				  <tr>
				    <td>Monday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				  <tr>
				   <td>Tuesday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				  <tr>
				    <td>Wednesday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				  <tr>
				    <td>Thursday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				  <tr>
				    <td>Friday</td>
				    <td>Yoga</td>
				    <td>Zumba</td>
				    <td>Piloxing</td>
				  </tr>
				</table>
			</div>
			<div class="evening-class col-4">
				<h5>Evening Extra Classes</h5>
				<table class="table-bordered schedule-table" style="width:100%">
				  <tr>
				    <th>Days</th>
				    <th>6:30-7:30</th>
				  </tr>
				  <tr>
				    <td>Sunday</td>
				    <td>Boxing</td>
				  </tr>
				  <tr>
				    <td>Monday</td>
				    <td>Grappling</td>
				  </tr>
				  <tr>
				   <td>Tuesday</td>
				    <td>Boxing</td>
				  </tr>
				  <tr>
				    <td>Wednesday</td>
				    <td>Grappling</td>
				  </tr>
				  <tr>
				    <td>Thursday</td>
				    <td>Boxing</td>
				  </tr>
				  <tr>
				    <td>Friday</td>
				    <td>Grappling</td>
				  </tr>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- <tr>
			    <td>Monday</td>
			    <td>Yoga</td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr>
			  <tr>
			   <td>Tuesday</td>
			    <td>Yoga</td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr>
			  <tr>
			    <td>Wednesday</td>
			    <td>Yoga</td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr>
			  <tr>
			    <td>Thursday</td>
			    <td>Yoga</td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr>
			  <tr>
			    <td>Friday</td>
			    <td>Yoga</td>
			    <td>Zumba</td>
			    <td>Piloxing</td>
			    <td>Aerobics</td>
			  </tr> -->