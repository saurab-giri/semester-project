<?php 

if(!isset($_COOKIE["username"])) 

	header("location:login.php"); 

?>
<?php 
include('includes.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo SITE_URL.'admin/style.js'?>"></script>
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<script src='assets/bootstrap/js/bootstrap.min.js'></script>
		<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="top-header">
		<div class="top-header-left col-6">
			<i class="fa fa-phone-square"></i>
			<span>Contact Us:01-4423456</span>
		</div>
		<div class="top-header-right col-6">
			<span><?php echo (date( 'l, F j, Y' ));?></span>
		</div>
	</div>
	<header class="header row">
			<div class="logo col-lg-2 col-2">
				<img src="../images/logo.png" height="100px">
			</div>
			<div class="title col-lg-8 col-10 text-center">
				<h1> Gym Management System</h1>
				<h4>Ramkot Gym House</h4>
			</div>
	</header>
	<div class="nav col-lg-12">
		<nav class="navbar navbar-expand-md ">
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
		    </button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center">
					<li class="home-icon">
  						<a href="http://localhost/project/frontend/"><i class="fa fa-home"></i></a>
		  			</li>
				    <li class="nav-item ">
					    <a class="nav-link " href="<?php echo SITE_URL.'admin/index.php?manager=page&action=list-page';?>" >Pages Manager</a>
					</li>
				    <li class="nav-item ">
				      <a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=schedule&action=list-schedule';?>" >Schedule Manager</a>
				    </li>
				    <li class="nav-item ">
				      <a class="nav-link " href="<?php echo SITE_URL.'admin/index.php?manager=trainer-manager&action=trainer-list';?>">Trainer Manager</a>
				    </li>
				    <li class="nav-item ">
				      <a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=client&action=list-client';?>">Clients Manager</a>
				    </li>
				    <li class="nav-item ">
				    	<a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=payment&action=payment-list';?>">Payment Manager</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=equipment&action=list-equipment';?>">Equipments Manager</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=visitor&action=list-visitor';?>">Website Visitors</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo SITE_URL.'admin/index.php?manager=admin&action=list-admin';?>">Admins Manager</a>
				    </li> 
				    <li class="logout">
				    	<form method="post" action="<?php echo SITE_URL.'admin/action.php';?>" enctype="multipart/form-data">
				    		<button type="submit" name="logout" value="" class="btn btn-info logout-btn">LogOut<i class="fa fa-sign-out-alt"></i></button>
				    	</form>
				    </li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container">
	<?php 
	if(isset($_GET['manager'])){
	    $manager = $_GET['manager'].'.php';
	    include('managers/'.$manager);  
	}else{
	    ?>
	    <h1 class="text-center head dash-welcome">Welcome to admin dashboard!</h1>    
	   <?php 
	}
	     ?>          
	</div>
	<footer>
		<h5>All rights reserved &copy;</h5>
		<p>Fitness Gym Club, Kathmandu</p>
		<p class="footer-bottom">designed by <a href="#">Saurab Giri</a></p>
	</footer>

</body>
</html>