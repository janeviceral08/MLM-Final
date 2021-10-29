<?php
include('../php-includes/check-login.php');
include('../php-includes/connect.php');
$userid = $_SESSION['userid'];

	if(isset($_POST['msg'])){		
	$id=$_POST['id'];
	$chat_msg = mysqli_real_escape_string($con,$_POST['msg']);
   
	$date = date("Y-m-d");
	date_default_timezone_set("asia/manila");
	$time = time();



	
     $query = mysqli_query($con,"insert into message(`message`,`userid`,`date_sent`,`status`,`to_receiver`) values('$chat_msg','$id', '$time','unread','admin')") or die(mysqli_error());
		

	}
	header('location:chatroom.php');
?>