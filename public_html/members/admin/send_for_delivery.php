<?php

require('php-includes/connect.php');


if(isset($_POST['send'])){

    $receipt = $_POST['receipt'];
    $date_to_arrive= $_POST['date_to_arrive'];
     $tracking = $_POST['tracking'];
      $id = $_POST['id'];

		mysqli_query($con,"update user set is_active='For Delivery', is_sent='1', tracking_num = '$tracking', estimated_date_of_arrival = '$date_to_arrive', receipt_details= '$receipt' where id='$id'");	

					
		
	
	echo '<script>alert("Transaction is being Process.");window.location.assign("pending_application.php");</script>';


    }

  
else{
    $_SESSION['message'] = 'Please fill up the form first';
    header('location:view-payout-request.php');
}