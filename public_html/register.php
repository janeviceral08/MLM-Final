<?php
require('members/php-includes/connect.php');


if(isset($_POST['join_user'])){

    
	$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
	$middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
	$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
	$gender = mysqli_real_escape_string($con,$_POST['gender']);
	$birthdate = '0000-00-00';
	
	 $pin= substr(rand(100000,999999), 3);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$side = '0';
	$password = rand(100000,999999);
	$mobile2 = mysqli_real_escape_string($con,$_POST['mobile2']);
		$fb = 'fb';
		$beneficiary = mysqli_real_escape_string($con,$_POST['beneficiary']);
	$beneficiary_contact = mysqli_real_escape_string($con,$_POST['beneficiary_contact']);
	$beneficiary_Address = mysqli_real_escape_string($con,$_POST['beneficiary_Address']);
		$deliver = mysqli_real_escape_string($con,$_POST['deliver']);
			$work_address = mysqli_real_escape_string($con,$_POST['work_address']);
				$region = mysqli_real_escape_string($con,$_POST['region']);
	
	
	
	$under_userid = '$userid';

	$flag = 0;
$str=time();
$date=date("Y-m-d");

 $t= substr($str, -5);


	$query = mysqli_query($con,"insert into online_reg(`last_name`,`middle_name`,`first_name`,`email`,`password`,`mobile`,`address`,`birthday`,`account`,`under_userid`,`side`,`user_level`,`date_entered`,`birthdate`,`gender`,`beneficiary`,`beneficiary_contact`,`beneficiary_address`,`mobile2`,`facebook`,`date_activated`,`delivery_address`,`work_address`,`region`) values('$last_name','$middle_name','$first_name','$email','$password','$mobile','$address', '$birthdate','$pin-$t','userid','$side','level','$date','$birthdate','$gender','$beneficiary','$beneficiary_contact','$beneficiary_Address','$mobile2', '$fb','0000-00-00 00:00:00', '$deliver', '$work_address', '$region')");
			 

		
		
		echo mysqli_error($con);
		
					echo '<script>window.location.replace("form.php");</script>';
	}
	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
