<?php
	require('php-includes/connect.php');
	include('php-includes/check-login.php');
	$get_user = $_SESSION['userid'];
	
	
$get_userid = mysqli_query($con,"select * from user where account='$get_user'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						 $email= $result_get_userid['email'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
		
		$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
		$last_name = mysqli_real_escape_string($con, $_POST["last_name"]); 
		$middle_name = mysqli_real_escape_string($con, $_POST["middle_name"]);
		$mobile = mysqli_real_escape_string($con, $_POST["mobile"]); 
		$email = mysqli_real_escape_string($con, $_POST["email"]);
		$password = mysqli_real_escape_string($con, $_POST["password"]); 
		$birthday = mysqli_real_escape_string($con, $_POST["birthday"]); 
		$beneficiary = mysqli_real_escape_string($con, $_POST["beneficiary"]); 
		$beneficiary_contact = mysqli_real_escape_string($con, $_POST["beneficiary_contact"]); 
		$beneficiary_address = mysqli_real_escape_string($con, $_POST["beneficiary_address"]); 
		
		if($password == "") {
			$sql = "update user set first_name = '".$first_name."', last_name = '".$last_name."', middle_name = '".$middle_name."', mobile  = '".$mobile."', password = '".$password."', beneficiary = '".$beneficiary."', beneficiary_contact = '".$beneficiary_contact."', beneficiary_address = '".$beneficiary_address."' where email = '$email'";
		} else {
			$sql = "update user set first_name = '".$first_name."', last_name = '".$last_name."', middle_name = '".$middle_name."', mobile  = '".$mobile."', password = '".$password."', birthday = '".$birthday."', beneficiary = '".$beneficiary."', beneficiary_contact = '".$beneficiary_contact."', beneficiary_address = '".$beneficiary_address."' where email = '$email'";
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