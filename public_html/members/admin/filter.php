<?php
	//connection
include('php-includes/check-login.php');
require('php-includes/connect.php');

	$start = date('Y-m-d', strtotime($_POST['date_start']));
	$end = date('Y-m-d', strtotime($_POST['date_end']));
	
	$output = array('error' => false, 'data' => '');

	$sql = "SELECT * FROM pin_request WHERE date BETWEEN '$start' AND '$end'";
	$query = $con->query($sql);

	if($query->num_rows > 0){
		while($row = $query->fetch_assoc()){
			$output['data'] .= "
				<tr>
					<td>".$row['email']."</td>
					<td>".$row['amount']."</td>
					<td>".date('M d, Y', strtotime($row['date']))."</td>
				</tr>
			";
		}
	}
	else{
		$output['error'] = true;
	}

	echo json_encode($output);
?>