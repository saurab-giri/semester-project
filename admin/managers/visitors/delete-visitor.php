<?php

	$id =$_GET['id'];
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="DELETE FROM gym_visitor WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	print_r($sql);
	if ($results) {
		redirect(SITE_URL.'/admin/index.php?manager=visitor');
		exit;
	}