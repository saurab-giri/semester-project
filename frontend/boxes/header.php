<!DOCTYPE html>
<html>
<head>
	<title>Ramkot Gym House</title>
	<link rel = "icon" href = "../images/logo.png" 
        type = "image/x-icon">
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<script src='assets/bootstrap/js/bootstrap.min.js'></script>
		<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
		<script type="text/javascript" src="./main.js"></script>
</head>
<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="top-header-left col-6">
				<i class="fa fa-phone-square"></i>
				<span>Contact Us:01-4423456</span>
			</div>
			<div class="top-header-right col-6">
				<span><?php echo (date( 'l, F j, Y' ));?></span>
			</div>
		</div>
	</div>
</div>
<div class="nav-header">
	<div class="container">
		<div class="row">
			<div class="nav1 col-lg-3 col-sm-2">
				<a href="index.php">
					<span><i class="fa fa-dumbbell"></i></span>
					<h5>Ramkot Gym House</h5>
				</a>
				
			</div>		
			<div class="nav2 col-lg-7 col-sm-10 col-6">
				<nav class="navbar navbar-expand-md ">
		    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
				    </button>
		    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item <?php if ($current_page=="home") {echo "active"; }?>">
								<a href="index.php"  class="nav-link" aria-current="page">Home</a>
							</li>
							<li class="nav-item <?php if ($current_page=="schedule") {echo "active"; }?>">
								<a href="schedule.php" class="nav-link">Schedule</a>
							</li>
							<li class="nav-item <?php if ($current_page=="traineer") {echo "active"; }?>">
								<a href="trainer.php" class="nav-link">Traineers</a>
							</li>
							<li class="nav-item <?php if ($current_page=="packages") {echo "active"; }?>">
								<a href="packages.php" class="nav-link">Packages</a>
							</li>
							<li class="nav-item">
								<a href="#contact" class="nav-link">Contact Us</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
				<div class="nav3 col-lg-2 col-6 ">
					<a href="./form.php" class="nav-btn">join now</a>
				</div>
		</div>
	</div>
</div>