<?php
	require('php-includes/connect.php');
	include('php-includes/check-login.php');
	$email = $_SESSION['userid'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
		
		$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
		$last_name = mysqli_real_escape_string($con, $_POST["last_name"]); 
		$middle_name = mysqli_real_escape_string($con, $_POST["middle_name"]);
		$mobile = mysqli_real_escape_string($con, $_POST["mobile"]); 
		$email = mysqli_real_escape_string($con, $_POST["email"]);
		$password = mysqli_real_escape_string($con, $_POST["password"]); 
		
		if($password == "") {
			$sql = "update user set first_name = '".$first_name."', last_name = '".$last_name."', middle_name = '".$middle_name."', mobile  = '".$mobile."', password = '".$password."' where email = '".$_SESSION['userid']."'";
		} else {
			$sql = "update user set first_name = '".$first_name."', last_name = '".$last_name."', middle_name = '".$middle_name."', mobile  = '".$mobile."', password = '".$password."' where email = '".$_SESSION['userid']."'";
		}
		$result = mysqli_query($con, $sql);

		if(mysqli_query($con, $sql)) {


			$_SESSION['notif'] = 'success';
			header("location: profile.php");
		} else {
			$_SESSION['notif'] = 'failed';
			header("location: profile.php");
		}		  
	}