<?php
	require('php-includes/connect.php');
	include('php-includes/check-login.php');
	$email = $_SESSION['userid'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
		
		$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
		$lastname = mysqli_real_escape_string($con, $_POST["lastname"]); 
		$middlename = mysqli_real_escape_string($con, $_POST["middlename"]);

		$password = mysqli_real_escape_string($con, $_POST["password"]); 
		
		if($password == "") {
			$sql = "update admin set firstname = '".$firstname."', lastname = '".$lastname."', middlename = '".$middlename."', password = '".$password."' where userid = '".$_SESSION['userid']."'";
		} else {
			$sql = "update admin set firstname = '".$firstname."', lastname = '".$lastname."', middlename = '".$middlename."', password = '".$password."' where userid = '".$_SESSION['userid']."'";
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