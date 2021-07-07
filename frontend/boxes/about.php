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

	$sql = "SELECT * FROM gym_pages";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		$number=2;
		while($row = mysqli_fetch_assoc($result)) { 
			
			if($number%2==0){
				$number++;
	?>
		<div class="about about-left-bg">
			<div class="container">
				<div class="row">
					<div class="about-left col-lg-4 col-sm-12">
						<?php if($row['image']!=''){ ?>
						<img src="<?php echo 'http://localhost/project/admin/images/'.$row['image'];?>">
					<?php }?>
					</div>
					<div class="about-right col-lg-7 col-sm-12">
						<h2><?php echo $row['title'];?></h2>
						<p><?php echo $row['description'];?></p>
						<a  class="about-btn">join now</a>
					</div>
				</div>
			</div>
		</div>
		<?php }
		else{?>
			<div class="about about-right-bg">
			<div class="container">
				<div class="row">			
					<div class="about-right col-lg-7 col-sm-12">
						<h2><?php echo $row['title'];?></h2>
						<p><?php echo $row['description'];?></p>
						<a  class="about-btn">join now</a>
					</div>
					<div class="about-left col-lg-4 col-sm-12">
						<?php if($row['image']!=''){ ?>
						<img src="<?php echo 'http://localhost/project/admin/images/'.$row['image'];?>">
					<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php }}}?>