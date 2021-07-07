<?php 
include('includes.php');
session_start();
/**
* Add Page Action
* */
if (isset($_POST['login_submit'])) {
	$uname=$_POST['username'];
	$pwd=$_POST['password'];
	$remember = isset($_POST['remember']) ? '1' : '0';
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="SELECT * FROM gym_login WHERE username='$uname' AND password='$pwd'";
	$results=mysqli_query($con,$sql);
	if (mysqli_num_rows($results)==1) {
        if($remember==1){
			setcookie("username",$uname,time()+86400);
			setcookie("password",$pwd,time()+86400);
			// second on page time 
			header("location:index.php");
		}
		else{
			setcookie("username"," " ,time() + 3600);
			setcookie("password"," ",time()+3600);
			header("location:index.php");
			}
    }
    else{
		$_SESSION['Error'] = "invalid username or password";
    	header("location: login.php");
    }

}

if (isset($_POST['logout'])) {
	setcookie("username","",time()-86400);
	setcookie("password","",time()-86400);//for delete the cookie //destroy the cookie 
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
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=page');
		exit;
	}

 }

 if(isset($_POST['edit_page'])){
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$filename = file_upload('uploadfile');
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_pages SET title='$title',description='$description',image='$filename' WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	//print_r($results);
	if ($results) {
		//$_SESSION['message'] = 'Page added successfully';
		redirect(SITE_URL.'/admin/index.php?manager=page');
		exit;
	}
}

//session_start();
if(isset($_POST['add_schedule'])){
	$day=$_POST['day'];
	$time1=date('h:i a', strtotime($_POST['time1']));
	$time2=date('h:i a', strtotime($_POST['time2']));
	$time=$time1."-".$time2;
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
	$filename = file_upload('uploadfile');
	$qualification=$_POST['qualification'];
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql = "INSERT INTO gym_trainer (name,address,phone,qualification,image)VALUES ('$name', '$address', '$phone', '$qualification','$filename')";
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
	$filename = file_upload('uploadfile');
	$qualification=$_POST['qualification'];
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_trainer SET name='$name',address='$address',phone='$phone',qualification='$qualification',image='$filename' WHERE id='$id'";
	$results = mysqli_query($con, $sql);
	print_r($results);
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
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$filename = file_upload('uploadfile');
	if(!preg_match('/^[0-9]{10}+$/', $phone)){
		$_SESSION['contact_message'] = "*Invalid Phone format";
	  redirect(SITE_URL.'/admin/index.php?manager=client&action=add-client');
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['email_message'] = "*Invalid email format";
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
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_clients SET name='$name',address='$address',age='$age',gender='$gender',phone='$phone',email='$email',image='$filename' WHERE id='$id'";
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
	 if (!preg_match("/^[a-zA-Z ]*$/",$username && strlen($username)<='3' )) {
	 	$_SESSION['Error']="username must be in letter only and more than 3 letter";
	 	redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
	 }
	else if (strlen($password)<='6') {
		$_SESSION['Error'] = "password should be more than 6 character";
		 redirect(SITE_URL.'/admin/index.php?manager=admin&action=add-admin');
	}
	else{
		$con=mysqli_connect(HOST,USER,PASS,DBNAME);
		$sql="INSERT INTO gym_login(username,password) VALUES ('$username','$password')";
		$results = mysqli_query($con, $sql);
		if ($results) {
			//$_SESSION['message'] = 'Page added successfully';
			redirect(SITE_URL.'/admin/index.php?manager=admin');
			exit;
			}
		}
}

if(isset($_POST['edit_admin'])){
	$id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$newpassword=$_POST['newpassword'];
	
	if (strlen($newpassword)<='6' && $password!=$newpassword) {
		$_SESSION['Error'] = "password should be more than 6 letter";
		redirect(SITE_URL.'/admin/index.php?manager=admin&action=edit-admin&id='.$id);
	}
	elseif($password==$newpassword){
		$_SESSION['Error'] = "password should not be same";
		redirect(SITE_URL.'/admin/index.php?manager=admin&action=edit-admin&id='.$id);
	}
	else{
	$con=mysqli_connect(HOST,USER,PASS,DBNAME);
	$sql="UPDATE gym_login SET username='$username',password='$newpassword' WHERE id='$id'";
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
	$sql="UPDATE gym_equipment SET equipment_name='$name',description='$description',quantity='$quantity',image='$filename' WHERE id='$id'";
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
	$mail= mail($to_email, $subject, $body, $headers);
		if ($mail) {
		$_SESSION['mail_message'] = 'Mail Sent successfully!!';
		redirect(SITE_URL.'/admin/index.php?manager=client');
		exit;
	}
}





