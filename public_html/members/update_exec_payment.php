<?php
	require('php-includes/connect.php');
	include('php-includes/check-login.php');
	$email = $_SESSION['userid'];
	
$get_userid = mysqli_query($con,"select * from user where account='$email'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$get_user = $result_get_userid['email'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
		
		$card_number = mysqli_real_escape_string($con, $_POST["card_number"]);
		$cvv = mysqli_real_escape_string($con, $_POST["cvv"]); 
		$year = mysqli_real_escape_string($con, $_POST["year"]);
		$month = mysqli_real_escape_string($con, $_POST["month"]); 
		$gcash_number = mysqli_real_escape_string($con, $_POST["gcash_number"]);
		$receiver_name = mysqli_real_escape_string($con, $_POST["receiver_name"]); 
		$mobile_number = mysqli_real_escape_string($con, $_POST["mobile_number"]);
		$address = mysqli_real_escape_string($con, $_POST["address"]);
	
		
			$sql = "update payment_method set card_number = '".$card_number."', cvv = '".$cvv."', expiration_year = '".$year."', expiration_month  = '".$month."', gcash_number = '".$gcash_number."', receiver_name = '".$receiver_name."', mobile_number = '".$mobile_number."' , address = '".$address."' where userid = '$get_user'";
	
		$result = mysqli_query($con, $sql);

		if(mysqli_query($con, $sql)) {


			$_SESSION['notif'] = 'success';
			header("location: payment_setting.php");
		} else {
			$_SESSION['notif'] = 'failed';
			header("location: payment_setting.php");
		}		  
	}