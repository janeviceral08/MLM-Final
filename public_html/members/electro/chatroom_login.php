<?php
session_start();
require('../php-includes/connect.php');
$store = mysqli_real_escape_string($con,$_POST['store']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$query = mysqli_query($con,"select * from chatroom where userid='$store' and chat_password='$password'");
if(mysqli_num_rows($query)>0){
	$_SESSION['storename'] = $store;
	$_SESSION['order_id'] = $password;
	$_SESSION['id'] = session_id();
	$_SESSION['login_type'] = "user";
	
	echo '<script>alert("Login Success.");window.location.assign("chatroom.php");</script>';
	
}
else{
	echo '<script>alert("Email id or password is worng.");window.location.assign("index.php");</script>';
}

?>