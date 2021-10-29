<?php
include 'DBConfig.php';
 
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 


// Creating SQL command to fetch all records from Table.
$sql = "SELECT downline.id as ids,downline.first_name as down_first_name, downline.last_name as down_last_name, downline.middle_name as down_middle_name, downline.mobile as down_mob, downline.mobile2 as down_mob2, downline.tracking_num as tracking_num, downline.estimated_date_of_arrival as estimated_date_of_arrival, downline.receipt_details as receipt_details ,upline.email as up_email ,upline.first_name as up_first_name ,upline.last_name as up_last_name ,upline.middle_name as up_middle_name ,upline.mobile as up_mob, upline.mobile2 as up_mob2, downline.is_sent as is_sent FROM `user` as downline INNER JOIN user as upline ON downline.under_userid = upline.email where downline.is_sent = '1' ORDER BY ids";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>