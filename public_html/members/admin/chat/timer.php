                <?php include('../../db.php');
session_start();
	
if (!isset($_SESSION['chatroomid']) ||(trim ($_SESSION['chatroomid']) == '')) {
    header('../../index.php');
    exit();
}

	$id=$_SESSION['chatroomid'];
	
	$chatq=mysqli_query($con,"select chatroom.*, rooms.*, internet_shop.* from chatroom JOIN rooms ON chatroom.userid=rooms.room_id JOIN internet_shop ON rooms.room_type=internet_shop.id where chatroom.chatroomid='".$_SESSION['chatroomid']."'");
	$chatrow=mysqli_fetch_array($chatq);
	
		$re = mysqli_query($con,"SELECT * FROM checkin WHERE uid ='$id' and hotel_id = 1");
	while($row=mysqli_fetch_assoc($re))
	{
		$SrNo = $row['SrNo'];
		$Cus_name = $row['Cus_name'];
		$address = $row['address'];
		$contact = $row['contact'];
		$email = $row['email'];
		$Type = $row['Type'];
		$Rate = $row['Rate'];
		$Checkin = $row['Checkin'];
		$Checkout = $row['Checkout'];
		$T_Payment = $row['T_Payment'];
		$noDays = $row['noDays'];
		$paid = $row['paid'];
		$change_amount = $row['change_amount'];
		$persons = $row['persons'];
		$discount_name = $row['discount_name'];
		$discount_value = $row['discount_value'];
		$discount_code = $row['discount_code'];
		$discount_total = $row['discount_total'];
		$out_time = $row['out_time'];
	    $subtotal= 	$T_Payment;
	   
	
	}
	$now = date("Y-m-d H:i:s", strtotime("+8 hours"));
$future_date = date("$Checkout $out_time");
$seconds_diff = $now - $future_date;
$time = ($seconds_diff/3600);

$end_date =  "$Checkout $out_time";
date_default_timezone_set('Asia/Calcutta'); 
$now = date('Y-m-d H:i:s');

$diff = strtotime($end_date) - strtotime($now);
$fullDays    = floor($diff/(60*60*24));   
$fullHours   = floor(($diff-($fullDays*60*60*24))/(60*60));   
$fullMinutes = floor(($diff-($fullDays*60*60*24)-($fullHours*60*60))/60);      


?>
				<span style="font-size:22px; margin-left:10px;  margin-right:10px; position:relative; top:13px;"><strong>Remaining time: <?php echo "$fullDays days, $fullHours hours and $fullMinutes minutes."; ?></strong></span>
			
				