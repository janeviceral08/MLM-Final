<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

require('php-includes/connect.php');


if(isset($_POST['proceed'])){

    $userid = $_POST['userid'];
$tr_id = $_POST['tr_id'];
    $tracking_number = $_POST['tracking_number'];
    $upline = $_POST['upline'];
    $downline = $_POST['downline'];
    date_default_timezone_set("asia/manila");
	$date = date("Y-m-d H:i:s");
		$income_data = income($userid);
		$new_day_bal = $income_data['day_bal'] + $downline;
					$new_current_bal = $income_data['current_bal']+ $downline;
					$new_total_bal = $income_data['total_bal']+ $downline;
					
    $query = mysqli_query($con,"select * from user where email='$userid'");
									if(mysqli_num_rows($query)>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
											$id = $row['under_userid'];
												mysqli_query($con,"update income set  repurchase_total = repurchase_total + '$upline', day_bal = day_bal +'$upline', current_bal = current_bal +'$upline', total_bal = total_bal +'$upline'  where userid='$id'");
										}
									}
    

        
         	mysqli_query($con,"update order_history_details set status='Delivering', tracking_number='$tracking_number', date_process='$date' where tr_id='$tr_id'");
         	mysqli_query($con,"update income set day_bal = day_bal +'$downline', current_bal = current_bal +'$downline', total_bal = total_bal +'$downline', repurchase_total = repurchase_total + '$downline' where under_userid='$userid'");	
         	
	
	echo '<script>alert("Sent successfully.");window.location.assign("order.php");</script>';

}

function income($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from income where under_userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];
	
	return $data;
}
