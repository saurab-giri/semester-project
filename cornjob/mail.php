<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "gym-new";
  $conn = new mysqli($servername, $username, $password,$dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
	$sql = "SELECT * FROM gym_payment";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
  		while($row = mysqli_fetch_assoc($result)) {
  			$exp_date=$row['expire_date'];
  			$today_date=date('y-m-d');
  			//convert to strtotime
  			$exp=strtotime($exp_date);
  			$today=strtotime($today_date);
  			if($today>$exp && $row['outstanding']>0){
  				$to_email = $row['email'];
  				$subject = "Ramkot Gym House Notification";
  				$body = "Hi ".$row['name'].", Your payment time is expire, please make payment";
  				$headers = "From: ramkotgymhouse@gmail.com";
  				mail($to_email, $subject, $body, $headers);
  			}
  		}
  	}

// $to_email = "saurabgiri793@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi, This is test email send by PHP Script fsfdfdgdfdsf";
// $headers = "From: ramkotgymhouse@gmail.com";
// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }

?> 
