
<?php
	require('php-includes/connect.php');
	include('php-includes/check-login.php');
$rowid = $_GET['rowid'];


		
		$sql = "update replacement_request set request_status = 'processed'  where rep_id = '$rowid'";
		
		$result = mysqli_query($con, $sql);

		if(mysqli_query($con, $sql)) {


			$_SESSION['notif'] = 'success';
			header("location: user_replace_request.php");
		} else {
			$_SESSION['notif'] = 'failed';
			header("location: user_replace_request.php");
		}		  
	