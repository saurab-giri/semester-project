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
				
			  <tr>
			    <th>Days</th>
			    <?php 
			    $times = array('05:00 am-06:00 am','06:00 am-07:00 am','07:00 am-08:00 am','08:00 am-09:00 am');
				foreach($times as $time){
			    	//$times[] = $row['time'];
			    	?>
			    <th><?php echo $time;?></th>
				<?php }?>
			  
			  </tr>
			  <?php 
			  $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
			  foreach($days as $day){
			  ?>
			  <tr>
			    <td><?php echo $day; ?></td>
			    <?php foreach($times as $time){
			    	?>
			    	<td><?php
					$sql = "SELECT * FROM gym_schedule where class ='Morning Shift' and day='$day' and time='$time'";
					$result = $conn->query($sql);
					if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) { 
			    	if($row['time'] == $time){  
			    	echo $row['session'];
			    	}
			    	}
			    	}else{
			    		echo '-';
			    	}
			    	?></td>
				<?php }?>
			  </tr>
				<?php }?>
			</table>
		</div>
		<div class="evening row">
			<div class="evening-group col-8">
				<h5>Evening Group Classes</h5>
				<table class="table-bordered schedule-table" style="width:100%">
				
			  <tr>
			    <th>Days</th>
			    <?php 
			    $times = array('05:00 pm-06:00 pm','06:00 pm-07:00 pm','07:00 pm-08:00 pm');
				foreach($times as $time){
			    	//$times[] = $row['time'];
			    	?>
			    <th><?php echo $time;?></th>
				<?php }?>
			  
			  </tr>
			  <?php 
			  $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
			  foreach($days as $day){
			  ?>
			  <tr>
			    <td><?php echo $day; ?></td>
			    <?php foreach($times as $time){
			    	?>
			    	<td><?php
					$sql = "SELECT * FROM gym_schedule where class ='Evening Shift' and day='$day' and time='$time'";
					$result = $conn->query($sql);
					if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) { 
			    	if($row['time'] == $time){  
			    	echo $row['session'];
			    	}
			    	}
			    	}else{
			    		echo '-';
			    	}
			    	?></td>
				<?php }?>
			  </tr>
				<?php }?>
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