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

	$sql = "SELECT * FROM gym_equipment";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
	?>
<div class="equipment-container">
	<div class="container">
		<div class="row">
			<h4 class="text-center" id="equipment">Available Equipments</h4>
			<p class="text-center">Here, we make you to make your body look good. click join button to register</p>
			<div class="trainer-box">
				<div class="row">
					<?php while($row = mysqli_fetch_assoc($result)) { 
					if($row['image']!=''){
					?>
					<div class=" box1 col-4 text-center">
						<img src="<?php echo 'http://localhost/project/admin/images/'.$row['image'];?>" alt='trainer'>
						<div class="equipment-description">
						<h3><?php echo $row['equipment_name']; ?></h3>
						<p><?php echo $row['description']; ?></p>
						<p class="quantity">Quantity Available: <?php echo $row['quantity']; ?></p>
						</div>
					</div>
					<?php }}}?>
				</div>
			</div>
		</div>
	</div>
</div>