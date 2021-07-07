<?php

define('SITE_URL','http://localhost/project/');
define('HOST','localhost');
define('DBNAME','gym-new');
define('USER','root');
define('PASS','');

function exec_query($query){
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    return $result;
}

function redirect($url){
    if(headers_sent()){
        echo "<script>";
        echo "window.location = '$url';";
        echo "</script>";
        exit;            
    }else{
        session_write_close();
        header('Location:'.$url);
        exit;
    }
    
}

    function display_message(){
	if(isset($_SESSION['message'])){
    	echo $_SESSION['message'];
    	unset($_SESSION['message']);}
}

/**
* FIle upload
* */
function file_upload($field_name){
 if($_FILES[$field_name]['name']!=''){
    $filename = $_FILES[$field_name]['name'];
    $filename_array = explode('.',$filename);
    $ext = end($filename_array);
    $random_num = random_string(10);
    $upload_filename = 'image-'.$random_num.'.'.$ext;
    $source_path = $_FILES[$field_name]['tmp_name'];
    $destination_path = 'images/'.$upload_filename;
    $upload = move_uploaded_file($source_path,$destination_path);
    if($upload){
        $field_name = $upload_filename;
    }else{
        $field_name = '';
    }
    
}else{
    $field_name = '';
}
return $field_name;
}

function random_string($length){
    $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    for($i=1;$i<=$length;$i++){
        $random_string .= $string[rand(0,61)];
    }
    return $random_string;
}