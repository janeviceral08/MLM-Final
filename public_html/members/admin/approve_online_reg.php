<?php

require('php-includes/connect.php');


if(isset($_POST['send'])){
$email_under= $_POST['email'];
     $side = strtoupper($_POST['side']);
    $receipt = $_POST['receipt'];
    $date_to_arrive= $_POST['date_to_arrive'];
     $tracking = $_POST['tracking'];
      $id = $_POST['id'];


	$under_userid = $email_under;

	$flag = 0;
$str=time();


 $t= substr($str, -5);
 $level = getUserLevel($under_userid);
 $get_userid = mysqli_query($con,"select * from online_reg where id='$id'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
	
	$last_name =$result_get_userid['last_name'];
	$middle_name =$result_get_userid['middle_name'];
	$first_name =$result_get_userid['first_name'];
	$email =$result_get_userid['email'];
	$password =$result_get_userid['password'];
	$mobile =$result_get_userid['mobile'];
	$address =$result_get_userid['address'];
	$birthday =$result_get_userid['birthday'];
	$account =$result_get_userid['account'];
	$date_entered =$result_get_userid['date_entered'];
	$birthdate =$result_get_userid['birthdate'];
	$gender =$result_get_userid['gender'];
	$beneficiary =$result_get_userid['beneficiary'];
	$beneficiary_contact =$result_get_userid['beneficiary_contact'];
	$beneficiary_address =$result_get_userid['beneficiary_address'];
	$mobile2 =$result_get_userid['mobile2'];
	$delivery_address =$result_get_userid['delivery_address'];
	$work_address =$result_get_userid['work_address'];
	$region =$result_get_userid['region'];
 
 
if($email!='' && $side!='' && $date_to_arrive!=''&& $tracking!=''){
	
			//Pin is ok
			if(!email_check($under_userid)){
				//Email is ok
				if(!email_check($under_userid)){
					//Under userid is ok
					if(side_check($under_userid,$side)){
						//Side check
						$flag=1;
						
						
						
					}
					else{
	
				echo '<script>alert("Sorry! The Side you selected is NOT AVAILABLE");window.location.assign("online-reg.php");</script>';
					}
				}
				else{
					//check under userid
			echo '<script>alert("Sorry! Invalid Under User ID");window.location.assign("online-reg.php");</script>';
				}
			}
			else{
				//check email
					echo '<script>alert("Sorry! Invalid Under User ID");window.location.assign("online-reg.php");</script>';
				
			}
	
	}
	else{
		//check all fields are fill
			echo '<script>alert("Please Fill All the Fields!");window.location.assign("online-reg.php");</script>';
	
	}
	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){
		$date=date("Y-m-d");
		//Insert into User profile
		$query = mysqli_query($con,"insert into user(`last_name`,`middle_name`,`first_name`,`email`,`password`,`mobile`,`address`,`birthday`,`account`,`under_userid`,`side`,`user_level`,`date_entered`,`birthdate`,`gender`,`beneficiary`,`beneficiary_contact`,`beneficiary_address`,`mobile2`,`facebook`,`date_activated`,`delivery_address`,`work_address`,`is_active`,`tracking_num`,`estimated_date_of_arrival`,`receipt_details`,`is_sent`,`region`) values('$last_name','$middle_name','$first_name','$email','$password','$mobile','$address', '$birthdate','$account','$under_userid','$side','$level','$date_entered','$birthdate','$gender','$beneficiary','$beneficiary_contact','$beneficiary_address','$mobile2', '$fb','0000-00-00 00:00:00', '$delivery_address', '$work_address','For Delivery','$tracking','$date_to_arrive','$receipt','1', '$region')");
			 
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
		
		$query = mysqli_query($con,"update online_reg set is_active='yes' where email='$email'");
		echo mysqli_error($con);
		
					echo '<script>window.location.replace("online-reg.php");</script>';
	}


					
		
	
	echo '<script>alert("Transaction is being Process.");window.location.assign("online-reg.php");</script>';


    }

  
else{
    $_SESSION['message'] = 'Please fill up the form first';
    header('location:view-payout-request.php');
}
function pin_check($pin){
	global $con,$get_user;
	
	$query =mysqli_query($con,"select * from pin_list where pin='$pin' and userid='$get_user' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($email){
	global $con;
	
	$query =mysqli_query($con,"select * from user where email='$email'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}
function side_check($email,$side){
	global $con;
	
	$query =mysqli_query($con,"select * from tree where userid='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result[$side];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
function bunos($email){
	global $con;
	$bunos = array();
	$query = mysqli_query($con,"select * from bunos where userid='$email'");
	$result = mysqli_fetch_array($query);
	$bunos['bunos_count'] = $result['bunos_count'];

	
	return $bunos;
}
function getUnderId($email){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$email'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($email){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$email'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
}
function getUserLevel($email){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$email'");
	$result = mysqli_fetch_array($query);
	return $result['user_level'] + 1; 
}