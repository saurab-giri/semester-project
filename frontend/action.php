
<?php
session_start();
if(isset($_POST['add_form'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$shift = $_POST['shift'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gym-new";
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
	  header("Location: http://localhost/project/frontend/form.php");
	}
	if(!preg_match('/^[0-9]{10}+$/', $contact)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  header("Location: http://localhost/project/frontend/form.php");
	}
	else{
	$conn = new mysqli($servername, $username, $password,$dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO gym_visitor (name, address,age,contact,email,shift)VALUES ('$name', '$address','$age','$contact', '$email','$shift')";
	$results = mysqli_query($conn, $sql);
	print_r($sql);
	if ($results) {
		header("Location: http://localhost/project/frontend/form.php");
		$_SESSION['message'] = 'Form Submitted Successfully';
		exit;
	}
}
 }