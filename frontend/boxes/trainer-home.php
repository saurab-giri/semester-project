


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

	$sql = "SELECT * FROM gym_trainer limit 3";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
	?>
<div class="trainer-container">
	<div class="container">
		<div class="row">
			<h4 class="text-center" id="trainer">Our Traineers</h4>
			<p class="text-center">Here, we make you to make your body look good. click join button to register</p>
			<div class="trainer-box">
				<div class="row">
					<?php while($row = mysqli_fetch_assoc($result)) { 
					if($row['image']!=''){
					?>
					<div class=" box1 col-lg-4 col-sm-12 text-center">
						<img src="<?php echo 'http://localhost/project/admin/images/'.$row['image'];?>" alt='trainer'>
						<div class="column">
						<h3><?php echo $row['name']; ?></h3>
						<p><?php echo $row['qualification']; ?></p>
						<p><?php echo $row['phone']; ?></p>
						</div>
					</div>
					<?php }}}?>
				</div>
			</div>
		</div>
	</div>
</div>