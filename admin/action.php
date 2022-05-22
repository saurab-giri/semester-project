<?php 
include('includes.php');
session_start();
/**
* Add Page Action
* */
if (isset($_POST['login_submit'])) {
	$uname=$_POST['username'];
	$pwd=$_POST['password'];
	//$remember = isset($_POST['remember']) ? '1' : '0';
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="SELECT * FROM gym_login WHERE username='$uname' AND password='$pwd'";
	$results=mysqli_query($con,$sql);
	if (mysqli_num_rows($results)==1) {
        //if($remember==1){
			// setcookie("username",$uname,time()+86400);
			// setcookie("password",$pwd,time()+86400);
			// second on page time 
			$_SESSION["username"] = $uname;
			$_SESSION["password"] = $pwd; 

			header("location:index.php");
		}
		// else{
		// 	setcookie("username"," " ,time() + 3600);
		// 	setcookie("password"," ",time()+3600);
		// 	// $_SESSION["username"] = "";
		// 	// $_SESSION["password"] = ""; 
		// 	header("location:index.php");
		// 	}
  //   }
    else{
		$_SESSION['Error'] = "invalid username or password";
    	header("location: login.php");
    }

}

if (isset($_POST['logout'])) {
	// setcookie("username","",time()-86400);
	// setcookie("password","",time()-86400);//for delete the cookie //destroy the cookie 
	session_unset();
	// destroy the session
	session_destroy();
    redirect(SITE_URL.'/admin/login.php');
}



if(isset($_POST['add_page_submit'])){
	$page_name = $_POST['page_name'];
	$page_desc = $_POST['page_desc'];
	$filename = file_upload('uploadfile');
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_pages (title, description,image)VALUES ('$page_name', '$page_desc','$filename')";
	$results = mysqli_query($con, $sql);
	print_r($results);
	if ($results) {
		$_SESSION['message'] = 'Page added successfully!!';
		redirect(SITE_URL.'/admin/index.php?manager=page');
		exit;
	}

 }

 if(isset($_POST['edit_page_detail'])){
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$filename = file_upload('uploadfile');
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_pages SET title='$title',description='$description',image='$filename' WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	//print_r($results);
	if ($results) {
		$_SESSION['message'] = 'Page edited successfully!!';
		redirect(SITE_URL.'/admin/index.php?manager=page');
		exit;
	}
}

//session_start();
if(isset($_POST['add_schedule'])){
	$day=$_POST['day'];
	$time1=date('h:i a', strtotime($_POST['time1']));
	$time2=date('h:i a', strtotime($_POST['time2']));
	$time=$time1. "-" .$time2;
	//$time=$_POST['time'];
	$session=$_POST['session'];
	$class=$_POST['class'];

	//$error="fill the box";
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	// if ($day=="" & $time=="") {
	// 	 $_SESSION["error"] = $error;
 //    redirect(SITE_URL.'/admin/index.php?manager=schedule&action=add-schedule');
 //    session_unset();
		$sql = "INSERT INTO gym_schedule (day, time,class,session) VALUES ('$day', '$time','$class','$session')";
		$results = mysqli_query($con, $sql);
		//print_r($sql);
		redirect(SITE_URL.'/admin/index.php?manager=schedule');
		exit;
} 

if(isset($_POST['edit_schedule'])){
	$id=$_POST['id'];
	$day=$_POST['day'];
	$time=$_POST['time'];
	$session=$_POST['session'];
	$class=$_POST['class'];
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_schedule SET day='$day',time='$time' ,session='$session',class='$class' WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=schedule');
		exit;
	}
}

if(isset($_POST['add_trainer'])){
	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$filename = file_upload('uploadfile');
	$qualification=$_POST['qualification'];
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=trainer-manager&action=add-trainer');
	}
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_trainer (name,address,phone,email,qualification,image)VALUES ('$name', '$address', '$phone','$email', '$qualification','$filename')";
	print_r($sql);
	$results = mysqli_query($con, $sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=trainer-manager');
		exit;
	}
} 

if(isset($_POST['edit_trainer'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$filename = file_upload('uploadfile');
	$qualification=$_POST['qualification'];
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=trainer-manager&action=edit-trainer');
	}
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	if($filename == ""){
	$sql="UPDATE gym_trainer SET name='$name',address='$address',phone='$phone',email='$email',qualification='$qualification' WHERE id='$id'";
	}
	else{
		$sql="UPDATE gym_trainer SET name='$name',address='$address',phone='$phone',email='$email',qualification='$qualification',image='$filename' WHERE id='$id'";
	}
	$results = mysqli_query($con, $sql);
	//print_r($results);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=trainer-manager');
		exit;
	}
}

if(isset($_POST['add_client'])){
	$name=$_POST['name'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$_SESSION['name'] = $_POST['name'];
	$filename = file_upload('uploadfile');
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=add-client');
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=add-client');
	}
	if ($age <16 || $age>80) {
		$_SESSION['age_message'] = "*Age must be between 16-80";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=add-client');
	}
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_clients (name, address,age,gender, phone, email,image)VALUES ('$name','$address','$age','$gender','$phone','$email','$filename')";
	print_r($sql);
	$results = mysqli_query($con, $sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=client');
		exit;
	}
}

if(isset($_POST['edit_client'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$filename = file_upload('uploadfile');
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=edit-client');
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=edit-client');
	}
	if ($age <16 && $age>80) {
		$_SESSION['age_message'] = "*Age must be between 16-80";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=edit-client');
	}
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	if($filename == ""){
	$sql="UPDATE gym_clients SET name='$name',address='$address',age='$age',gender='$gender',phone='$phone',email='$email' WHERE id='$id'";
	}
	else{
		$sql="UPDATE gym_clients SET name='$name',address='$address',age='$age',gender='$gender',phone='$phone',email='$email',image='$filename' WHERE id='$id'";
	}
	$results = mysqli_query($con, $sql);
	//print_r($results);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=client');
		exit;
	}
}

if (isset($_POST['add_payment'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$package=$_POST['package'];
	$received=$_POST['received'];
	$pay_date=$_POST['pay-date'];
	$expire_date=$_POST['expire-date'];
	$mnth1 =1000;
	$mnth2=1800;
	$mnth3=2700;
	if($package=='1 month'&&$received>$mnth1 ){
		$outstanding=0;
		$advance=$received-$mnth1;
	}
	if($package=='1 month'&&$received<$mnth1 ){
		$outstanding=$mnth1-$received;
		$advance=0;
	}

	if($package=='2 month'&&$received>$mnth2 ){
		$outstanding=0;
		$advance=$received-$mnth2;
	}
	if($package=='2 month'&&$received<$mnth2 ){
		$outstanding=$mnth2-$received;
		$advance=0;
	}
	if($package=='3 month'&&$received>$mnth3){
		$outstanding=0;
		$advance=$received-$mnth3;
	}
	if($package=='3 month'&&$received<$mnth3){
		$outstanding=$mnth3-$received;
		$advance=0;
	}
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=payment&action=add-payment');
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
	  redirect(SITE_URL.'/admin/index.php?manager=payment&action=add-payment');
	}

	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_payment (name, phone,email,package,received,outstanding,advance,pay_date,expire_date)VALUES ('$name','$phone','$email','$package','$received','$outstanding','$advance','$pay_date','$expire_date')";
	$results = mysqli_query($con, $sql);
	if ($results) {
		redirect(SITE_URL.'/admin/index.php?manager=payment');
		//$_SESSION['message'] = 'Page added successfully';
		exit;
	}
}


if(isset($_POST['edit_payment'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$package=$_POST['package'];
	$received=$_POST['received'];
	$pay_date=$_POST['pay-date'];
	$expire_date=$_POST['expire-date'];
	$mnth1 =1000;
	$mnth2=1800;
	$mnth3=2700;
	if($package=='1 month'&&$received>$mnth1 ){
		$outstanding=0;
		$advance=$received-$mnth1;
	}
	if($package=='1 month'&&$received<$mnth1 ){
		$outstanding=$mnth1-$received;
		$advance=0;
	}

	if($package=='2 month'&&$received>$mnth2 ){
		$outstanding=0;
		$advance=$received-$mnth2;
	}
	if($package=='2 month'&&$received<$mnth2 ){
		$outstanding=$mnth2-$received;
		$advance=0;
	}
	if($package=='3 month'&&$received>$mnth3){
		$outstanding=0;
		$advance=$received-$mnth3;
	}
	if($package=='3 month'&&$received<$mnth3){
		$outstanding=$mnth3-$received;
		$advance=0;
	}
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	 	redirect(SITE_URL.'/admin/index.php?manager=payment&action=edit-payment');
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
	  redirect(SITE_URL.'/admin/index.php?manager=payment&action=edit-payment');
	}
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_payment SET name='$name',phone='$phone',email='$email',package='$package',received='$received',outstanding='$outstanding',advance='$advance',pay_date='$pay_date',expire_date='$expire_date' WHERE id='$id'";
	//print_r($sql);
	$results = mysqli_query($con, $sql);
	if ($results) {
		redirect(SITE_URL.'/admin/index.php?manager=payment');
		exit;
	}
}

if (isset($_POST['add_admin'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$confirm_password=$_POST['confirm_password'];
	$number = preg_match('@[0-9]@', $password);
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);
	 if (!preg_match("/^[a-zA-Z ]*$/",$username && strlen($username)<='3' )) {
	 	$_SESSION['UserError']="*username must be in letter only and more than 3 letter";
	 	redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
	 }
	if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
		$_SESSION['PassError'] = "*Password must be at least 8 characters in length and must contain at least one number, one upper case ";
		 redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
	}
	if ($password != $confirm_password) {
		$_SESSION['ConPassError'] = "*password should be same";
		redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
	}
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "SELECT * FROM gym_login WHERE username='$username'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)>0){
	    $row = mysqli_fetch_assoc($result); 
	    while($row) { 
		    if($row['username'] == $username || $row['email']==$email){  
		    	$_SESSION['UsernameError'] = "*Username or Email already exists.";
				redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
			}
		}
	}else
	$sql="INSERT INTO gym_login(username,password,email) VALUES ('$username','$password','$email')";
	$results = mysqli_query($con, $sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=admin');
		exit;
		}
	}


if(isset($_POST['edit_admin'])){
	$id=$_POST['id'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$newpassword=$_POST['newpassword'];
	$number = preg_match('@[0-9]@', $newpassword);
	$uppercase = preg_match('@[A-Z]@', $newpassword);
	$lowercase = preg_match('@[a-z]@', $newpassword);
	$specialChars = preg_match('@[^\w]@', $newpassword);
	
	if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
		$_SESSION['PassError'] = "*Password must be at least 8 characters in length and must contain at least one number, one upper case ";
		redirect(SITE_URL.'/admin/index.php?manager=admin&action=edit-admin&id='.$id);
	}
	elseif($password==$newpassword){
		$_SESSION['Error'] = "password should not be same";
		redirect(SITE_URL.'/admin/index.php?manager=admin&action=edit-admin&id='.$id);
	}
	else{
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_login SET username='$username',email='$email',password='$newpassword' WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=admin');
		exit;
		}
	}
}

if(isset($_POST['add_equipment'])){
	$name = $_POST['equipment_name'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$filename = file_upload('uploadfile');
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_equipment (equipment_name, description,quantity,image) VALUES('$name', '$description','$quantity','$filename')";
	$results = mysqli_query($con, $sql);
	print_r($sql);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=equipment');
		exit;
	}

 }


if(isset($_POST['edit_equipment'])){
	$id=$_POST['id'];
	$name = $_POST['equipment_name'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$filename = file_upload('uploadfile');
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	if($filename==''){
	$sql="UPDATE gym_equipment SET equipment_name='$name',description='$description',quantity='$quantity' WHERE id='$id'";
	}
	else{
		$sql="UPDATE gym_equipment SET equipment_name='$name',description='$description',quantity='$quantity',image='$filename' WHERE id='$id'";
	}
	$results = mysqli_query($con, $sql);
	print_r($results);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=equipment');
		exit;
	}
}

if(isset($_POST['send_mail'])){
	
	$name = $_POST['name'];
	$to_email = $_POST['email'];
	$subject = "Ramkot Gym House Notification";
	$body = $_POST['message'];
	$headers = "From: ramkotgymhouse@gmail.com";
	print_r($name);
	//print_r($body);
	$mail= mail($to_email, $subject, $body, $headers);
		if ($mail) {
			print_r($body);
		$_SESSION['mail_message'] = 'Mail Sent successfully!!';
		redirect(SITE_URL.'/admin/index.php?manager=client');
		exit;
	}
	else{
		echo"Internet Problem!!";
	}
}


if(isset($_POST['verify'])){
	$to_email = $_POST['email'];
	$subject = "Ramkot Gym House Notification";
	$headers = "From: ramkotgymhouse@gmail.com";
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "SELECT * FROM gym_login WHERE email='$to_email'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)>0){
	    $row = mysqli_fetch_assoc($result); 
	    while($row) { 
		    if($row['email'] == $to_email){
		    	
		    	$body = "Your username is ".$row['username']." and Your password is ".$row['password'].".";
		    	$mail= mail($to_email, $subject, $body, $headers);
		    	if($mail){
		    		$_SESSION['mail_message_success'] = ' Please check your email ,We send your information to '.$to_email;
		    		header("location:verify.php");
		    		exit;
		    	}
		    	else{
		    		echo "Internet Problem!!";
		    	}
		    }
		}
	} 
	 else{
		    	$_SESSION['mail_message'] = '*Email not match';
		    	header("location:verify.php");
		    	exit;
		    } 

}


